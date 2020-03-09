<h1>Do you want to delete this post?</h1>

<h3><?php echo $post->title; ?></h3>

<form action="index-post.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $post->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-default" href="index-post.php">Cancel</a>
    </div>
</form>