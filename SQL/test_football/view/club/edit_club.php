<h2>Update Club</h2>
<form method="post" action="view_club.php?page=edit">
    <input type="hidden" name="id_club" value="<?php echo $club->id; ?>" />
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name_club" value="<?php echo $club->name; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Stadium</label>
        <textarea name="stadium" class="form-control"><?php echo $club->stadium; ?></textarea>
    </div>
    <div class="form-group">
        <label>Name Coach</label>
        <textarea name="coach_name" class="form-control"><?php echo $club->coach; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_club.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>