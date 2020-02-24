<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>
<h1 style='color:red;'>Do you want delete <?= isset($cup->name) ? $cup->name : ''; ?> forever??</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This cup will be delete and you could not be restored!
</div>

<h3><u>ID cup</u>: <?= isset($cup->id) ? $cup->id : ''; ?> <br>
    <u>Name cup</u>: <?= isset($cup->name) ? $cup->name : ''; ?>
</h3> <br>

<form action="view_cup.php?page=deleteForever" method="post">
    <input type="hidden" name="id" value="<?php echo $cup->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_cup.php?page=backup_cup" style="margin-left: 5px;">Cancel</a>
    </div>
</form>