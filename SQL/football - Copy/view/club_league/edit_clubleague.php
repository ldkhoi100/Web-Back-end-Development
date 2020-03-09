<?php if (admin()) : ?>

<?php include '../../model/db/connect.php' ?>

<h2>Update Club Relationship Beetween Club And League</h2>
<form method="post" action="view_clubleague.php?page=edit">
    <input type="hidden" name="id_club" value="<?php echo $clubleague->idclub; ?>" />
    <input type="hidden" name="id_league" value="<?php echo $clubleague->idleague; ?>" />
    <div class="form-group">
        <label>ID Club</label>
        <select class="form-control" name="idclub">
            <?php
                $sql = "SELECT * FROM club";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_club'] === $clubleague->idclub) {
                        echo "<option value=" . $row['id_club'] . " selected>" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_club'] . ">" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <label>ID League</label>
        <select class="form-control" name="idleague">
            <?php
                $sql = "SELECT * FROM league";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_league'] === $clubleague->idleague) {
                        echo "<option value=" . $row['id_league'] . " selected>" . $row['id_league'] . " - " . $row['name_league'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_league'] . ">" . $row['id_league'] . " - " . $row['name_league'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_clubleague.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>