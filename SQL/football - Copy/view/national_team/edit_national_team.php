<?php if (admin()) : ?>

<h2>Update Nation Team</h2>
<form method="post" action="view_national_team.php?page=edit" enctype="multipart/form-data">
    <input type="hidden" name="id_nation" value="<?php echo $national_team->id; ?>" />
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name_nation" value="<?php echo $national_team->name; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Continent</label>
        <textarea name="continent" class="form-control"><?php echo $national_team->continent; ?></textarea>
    </div>
    <div class="form-group">
        <label>Ranking</label>
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
            class="form-control" name="ranking" value="<?php echo $national_team->ranking; ?>" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Name Coach</label>
        <textarea name="coach_name" class="form-control"><?php echo $national_team->coach; ?></textarea>
    </div>
    <div class="form-group">
        <label>Image</label>
        <div>
            <input type="file" name="image" id="image">
            <img src="<?= 'data:image;base64,' . base64_encode($national_team->image) ?> " width="60px" height="60px">
            </td>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_national_team.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>