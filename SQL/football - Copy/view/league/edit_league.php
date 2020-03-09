<?php if (admin()) : ?>

<h2>Update League</h2>
<form method="post" action="view_league.php?page=edit" enctype="multipart/form-data">
    <input type="hidden" name="id_league" value="<?php echo $league->id; ?>" />
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name_league" value="<?php echo $league->name; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Image</label>
        <div>
            <input type="file" name="image" id="image">
            <img src="<?= 'data:image;base64,' . base64_encode($league->image) ?> " width="60px" height="60px">
            </td>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_league.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>