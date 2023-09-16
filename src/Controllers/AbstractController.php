<?php

namespace Secureaks\VulnerableComponents\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractController
{

    protected Request $request;

    public function __construct()
    {
        $this->request = Request::createFromGlobals();
    }

    protected function render(string $view, array $params = []): string
    {
        $view = preg_replace('/[^a-zA-Z\/]/', '', $view);
        extract($params);
        require_once __DIR__ . '/../Views/' . $view . '.php';
        return ob_get_clean();
    }

    protected function error(string $message, int $code = 404): Response
    {
        $response = new Response($this->render('Error/index', [
            'message' => $message
        ]), $code);
        return $response->send();
    }

    protected function addMessage(string $message): void
    {
        $_SESSION['message'][] = $message;
    }

    protected function getMessages(): array
    {
        $messages = $_SESSION['message'] ?? [];
        unset($_SESSION['message']);
        return $messages;
    }
}