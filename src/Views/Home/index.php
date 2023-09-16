<?php include_once __DIR__ . '/../Commons/base_header.php'; ?>

<h2>Home</h2>

<p>
    Welcome to this application. The site is currently under construction. Feel free to email us is you have any questions.
</p>

<form action="/contact" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <textarea name="message" placeholder="Message" required cols="80" rows="10"></textarea>
    <button type="submit">Send</button>
</form>

<?php if (!empty($messages)) : ?>
    <ul>
        <?php foreach ($messages as $message) : ?>
            <li><?= htmlspecialchars($message, ENT_QUOTES) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php include_once __DIR__ . '/../Commons/base_footer.php'; ?>
