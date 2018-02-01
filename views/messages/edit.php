<?php

/**
 * @var string $name
 * @var array $messages
 */

?>
<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Messages list</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<main role="main" class="container">
    <h1>Messages list</h1>
    <?php
    echo "<pre>";
    print_r($messages);
    echo "</pre>";
    ?>
    <form action="<?= toUrl('messages/push') ?>" method="post">
        <input type="text" style="display: none" name="id" value="<?= $messages['id'] ?>">
        <input type="text" name="author" placeholder="Enter your name" class="form-control" value="<?= $messages['author']?>">
        <textarea name="message" placeholder="Enter your message" class="form-control mt-2"><?= $messages['message']?></textarea>

        <button type="submit" class="btn btn-success mt-2">Edit</button>
    </form>


</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; <?= date('Y')?> PHP Academy</span>
    </div>
</footer>
</body>
</html>