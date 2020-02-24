<h2>Update Cup</h2>
<form method="post" action="view_cup.php?page=edit">
    <input type="hidden" name="id_cup" value="<?php echo $cup->id; ?>" />
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name_cup" value="<?php echo $cup->name; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="text" name="image" value="<?php echo $cup->image; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_cup.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>