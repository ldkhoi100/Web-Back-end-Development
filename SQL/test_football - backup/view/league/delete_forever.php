<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>
<h1 style='color:red;'>Do you want delete <?= isset($league->name) ? $league->name : ''; ?> forever??</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This league will be delete and you could not be restored!
</div>

<h3><u>ID league</u>: <?= isset($league->id) ? $league->id : ''; ?> <br>
    <u>Name league</u>: <?= isset($league->name) ? $league->name : ''; ?>
</h3> <br>

<form action="view_league.php?page=deleteForever" method="post">
    <input type="hidden" name="id" value="<?php echo $league->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_league.php?page=backup_league" style="margin-left: 5px;">Cancel</a>
    </div>
</form>