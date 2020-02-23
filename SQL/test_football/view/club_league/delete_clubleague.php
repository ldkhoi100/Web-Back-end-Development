<h1 style='color:red;'>Do you want delete club-league <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?>?
</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This club-league will be delete!
</div>

<h3><u>ID club</u>: <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?> <br>
    <u>ID league</u>: <?= isset($clubleague->idleague) ? $clubleague->idleague : ''; ?>
</h3> <br>

<form action="view_clubleague.php?page=delete" method="post">
    <input type="hidden" name="id1" value="<?php echo $clubleague->id1; ?>" />
    <input type="hidden" name="id2" value="<?php echo $clubleague->id2; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_clubleague.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>