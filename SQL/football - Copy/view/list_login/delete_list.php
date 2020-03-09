<?php if (boss()) : ?>

<h1 style='color:red;'>Do you want delete username <?= isset($listlogin->username) ? $listlogin->username : ''; ?>?</h1>
<br>

<div class="alert alert-danger">
    <strong>Danger!</strong> This username will be delete forever!</a>
</div>

<h3><u>ID username</u>: <?= isset($listlogin->id) ? $listlogin->id : ''; ?> <br>
    <u>Username</u>: <?= isset($listlogin->username) ? $listlogin->username : ''; ?>
</h3> <br>

<form action="view_list.php?page=delete" method="post">
    <input type="hidden" name="id" value="<?php echo $listlogin->id; ?>" />
    <div class="form-group">
        <input type="submit" value="Delete" class="btn btn-danger" />
        <a class="btn btn-info" href="view_list.php" style="margin-left: 5px;">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>