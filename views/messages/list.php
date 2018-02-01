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

    <form action="<?= toUrl('messages/create') ?>" method="post">
        <input type="text" name="author" placeholder="Enter your name" class="form-control">
        <textarea name="message" placeholder="Enter your message" class="form-control mt-2"></textarea>

        <button type="submit" class="btn btn-success mt-2">Save</button>
    </form>

    <table>
        <?php
        foreach ($messages as $message) : ?>
        <tr>
            <form action="<?= toUrl('messages/edit') ?>" method="post">
                <td><?= $message['author'] ?></td>
                <td style="padding-left: 40px"><?= $message['message'] ?></td>
                <td> <input type="text" style="display: none" name="id" value="<?= "{$message['id']}" ?>"></td>
                <td style="padding-left: 40px"> <button type="submit" class="btn btn-success" >Edit</button></td>
                <td style="padding-left: 40px"> <button formaction="<?= toUrl('messages/delete') ?>"  class="btn btn-danger" >Delete</button></td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>

</main>

<footer class="footer">
    <div class="container">
        <span class="text-muted">&copy; <?= date('Y')?> PHP Academy</span>
    </div>
</footer>
</body>
</html>