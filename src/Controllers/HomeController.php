<?php

namespace Secureaks\VulnerableComponents\Controllers;

use Secureaks\VulnerableComponents\Services\Contact;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{

    public function index(): Response
    {
        $response = new Response(
            $this->render('Home/index',[
                'messages' => $this->getMessages(),
            ])
        );

        return $response->send();
    }

    public function contact(): Response
    {
        $name = $this->request->get('name');
        $email = $this->request->get('email');
        $message = $this->request->get('message');

        if (empty($name) || empty($email) || empty($message)) {
            $this->addMessage('All fields are required');
            $response = new RedirectResponse('/');
            return $response->send();
        }

        $contact = new Contact();
        $this->addMessage($contact->send($name, $email, $message) ? 'Message sent' : 'Error sending message');

        $response = new RedirectResponse('/');
        return $response->send();
    }

    public function error404(): Response
    {
        return $this->error('404 - Page not found');
    }

}