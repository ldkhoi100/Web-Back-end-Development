<?php if (admin()) : ?>

<h1 style='color:red;'>Do you want delete id team nation <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?>
    and id cup <?= isset($clubleague->idleague) ? $clubleague->idleague : ''; ?>?
</h1> <br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This national-cup will be delete!
</div>

<h3><u>ID national</u>: <?= isset($clubleague->idclub) ? $clubleague->idclub : ''; ?> <br>
    <u>ID cup</u>: <?= isset($clubleague->idleague) ? $clubleague->idleague : ''; ?>
</h3> <br>

<form action="view_nationalcup.php?page=delete" method="post">
    <input type="hidden" name="id1" value="<?php echo $clubleague->id1; ?>" />
    <input type="hidden" name="id2" value="<?php echo $clubleague->id2; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_nationalcup.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>