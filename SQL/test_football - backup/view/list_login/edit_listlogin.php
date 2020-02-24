<h2>Update League</h2>
<form method="post" action="view_league.php?page=edit">
    <input type="hidden" name="id_league" value="<?php echo $league->id; ?>" />
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name_league" value="<?php echo $league->name; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_league.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>