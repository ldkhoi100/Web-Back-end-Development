<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete league <?= isset($league->name) ? $league->name : ''; ?>?</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This league will be delete, but you can back up at <a
        href="view_league.php?page=backup_league">Here</a>
</div>

<h3><u>ID league</u>: <?= isset($league->id) ? $league->id : ''; ?> <br>
    <u>Name league</u>: <?= isset($league->name) ? $league->name : ''; ?>
</h3> <br>

<form action="view_league.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $league->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_league.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>