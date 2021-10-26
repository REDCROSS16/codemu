
<div style="display: flex; justify-content: center;align-items: center">
    <form method="post" action=""><br>
        <label for="title" style="text-align: center">Title</label>
        <input name="title" class="form-control" style="width: 500px" placeholder="type title" value="<?= $title?>"><br>
        <label for="URL" style="text-align: center">URL</label>
        <input name="url" class="form-control" style="width: 500px" placeholder="type url" value="<?= $url;?>" <br>
        <label for="text" style="text-align: center">Text</label>
        <textarea name="text" class="form-control" style="width: 500px"><?= trim($text) ?> </textarea><br>
        <input type="submit" name="submit" class="btn btn-primary">
    </form>
</div>