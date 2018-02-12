<?php

/**
 * @var string $content
 * @var string $file
 * @var string $back
 */

?>
<h3><?= $file ?></h3>
<p><a href="<?= $back ?>">Go back</a></p>
<?= var_dump($file) ?>
<form action="<?= toUrl('/files/changeFile?path=' . urlencode($file)) ?>" method="post">
    <input type="hidden" name="file" value="<?= $file ?>">
    <textarea name="text" style="width: 85%;resize: both; overflow: auto"><?= $content ?></textarea>
    <button type="submit" class="btn btn-success"> Изменить </button>
</form>
