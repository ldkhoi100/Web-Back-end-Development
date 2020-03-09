<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete club <?= isset($club->name) ? $club->name : ''; ?> forever??</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This club will be delete and you could not be restored!
</div>

<h3><u>ID club</u>: <?= isset($club->id) ? $club->id : ''; ?> <br>
    <u>Name club</u>: <?= isset($club->name) ? $club->name : ''; ?>
</h3> <br>
<form action="view_club.php?page=deleteForever" method="post">
    <input type="hidden" name="id" value="<?= $club->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_club.php?page=backup_club" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>