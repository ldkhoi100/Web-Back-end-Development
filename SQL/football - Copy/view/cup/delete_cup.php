<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete cup <?= isset($cup->name) ? $cup->name : ''; ?>?</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This cup will be delete, but you can back up at <a
        href="view_cup.php?page=backup_cup">Here</a>
</div>

<h3><u>ID cup</u>: <?= isset($cup->id) ? $cup->id : ''; ?> <br>
    <u>Name cup</u>: <?= isset($cup->name) ? $cup->name : ''; ?>
</h3> <br>

<form action="view_cup.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $cup->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_cup.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>