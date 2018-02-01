<?php

function actionList()
{
    $storage = config('storagePath');
    $files = array_filter(scandir($storage), function ($item) {
        return !in_array($item, ['.', '..', '.gitignore']);
    });
    $messages = [];
    foreach ($files as $file) {
        $data = unserialize(file_get_contents("{$storage}/{$file}"));
        $messages[] = array_merge(['id' => $file], $data);
    }
    usort($messages, function ($a, $b){
        return strnatcasecmp($b['id'], $a['id']);
    });
    render('/messages/list', ['messages' => $messages]);
}

function actionCreate()
{
    $path = config('storagePath');
    $file = $path . '/' . getUniqueFileName($path, 'txt');

    $messageString = serialize($_POST);
    file_put_contents($file, $messageString);

    redirect(toUrl('/messages/list'));
}

function actionEdit()
{
    $storage = config('storagePath');

    $data = unserialize(file_get_contents("{$storage}/{$_POST['id']}"));

    $message = array_merge(['id' => $_POST['id']], $data);

    render('/messages/edit', ['messages' => $message]);
}

function actionPush()
{
    $path = config('storagePath');
    $file = $path . '/' . $_POST['id'];
    $messageString = serialize($_POST);
    file_put_contents($file, $messageString);

    redirect(toUrl('/messages/list'));

}

function actionDelete()
{
    $path = config('storagePath');
    $file = $path . '/' . $_POST['id'];
    unlink($file);

    redirect(toUrl('/messages/list'));
}
