<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete position <?= isset($player->name) ? $player->name : ''; ?>
    forever??</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This national team will be delete and you could not be restored!
</div>

<h3><u>ID player</u>: <?= isset($player->id) ? $player->id : ''; ?> <br>
    <u>Name player</u>: <?= isset($player->firstname) ? $player->firstname : ''; ?>
    <?= isset($player->lastname) ? $player->lastname : ''; ?>
</h3> <br>

<form action="view_player.php?page=deleteForever" method="post">
    <input type="hidden" name="id" value="<?php echo $player->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_player.php?page=backup_player" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>