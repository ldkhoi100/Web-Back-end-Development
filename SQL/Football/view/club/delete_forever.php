<?php
if (isset($message)) {
    echo "<p class='alert-info'>$message</p>";
}
?>
<h1 style='color:red;'>Do you want delete <?= isset($club->name) ? $club->name : ''; ?> forever??</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This club will be delete and you could not be restored!
</div>

<h3><u>ID club</u>: <?= isset($club->id) ? $club->id : ''; ?> <br>
    <u>Name club</u>: <?= isset($club->name) ? $club->name : ''; ?>
</h3> <br>

<form action="view_club.php?page=deleteForever" method="post">
    <input type="hidden" name="id" value="<?php echo $club->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_club.php?page=backup_clup" style="margin-left: 5px;">Cancel</a>
    </div>
</form>