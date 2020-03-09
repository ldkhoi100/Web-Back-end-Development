<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want back up league <?= isset($league->name) ? $league->name : ''; ?>?</h1> <br>

<div class="alert alert-warning">
    <strong>Warning!</strong> This league will be back up now
</div>

<h3><u>ID league</u>: <?= isset($league->id) ? $league->id : ''; ?> <br>
    <u>Name league</u>: <?= isset($league->name) ? $league->name : ''; ?>
</h3> <br>

<form action="view_league.php?page=backupfile" method="post">
    <input type="hidden" name="id" value="<?php echo $league->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Back up" class="btn btn-danger" />
        <a class="btn btn-info" href="view_league.php?page=backup_league" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>