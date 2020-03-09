<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete id player <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?> and id
    position <?= isset($clubleague->idleague) ? $clubleague->idleague : ''; ?>?
</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This player-position will be delete!
</div>

<h3><u>ID player</u>: <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?> <br>
    <u>ID position</u>: <?= isset($clubleague->idleague) ? $clubleague->idleague : ''; ?>
</h3> <br>

<form action="view_playerposition.php?page=delete" method="post">
    <input type="hidden" name="id1" value="<?php echo $clubleague->id1; ?>" />
    <input type="hidden" name="id2" value="<?php echo $clubleague->id2; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_playerposition.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>