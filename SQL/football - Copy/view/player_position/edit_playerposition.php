<?php if (admin()) : ?>

<?php include '../../model/db/connect.php' ?>

<h2>Update Club Relationship Beetween Player And Position</h2>
<form method="post" action="view_playerposition.php?page=edit">
    <input type="hidden" name="id_club" value="<?php echo $clubleague->idclub; ?>" />
    <input type="hidden" name="id_league" value="<?php echo $clubleague->idleague; ?>" />

    <div class="form-group">
        <label>ID National</label>
        <select class="form-control" name="idclub">
            <?php
                $sql = "SELECT * FROM player";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_player'] === $clubleague->idclub) {
                        echo "<option value=" . $row['id_player'] . " selected>" . $row['id_player'] . " - " . $row['first_name'] . " " . $row['last_name'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_player'] . ">" . $row['id_player'] . " - " . $row['first_name'] . " " . $row['last_name'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <label>ID Cup</label>
        <select class="form-control" name="idleague">
            <?php
                $sql = "SELECT * FROM position";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_position'] === $clubleague->idleague) {
                        echo "<option value=" . $row['id_position'] . " selected>" . $row['id_position'] . " - " . $row['name_position'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_position'] . ">" . $row['id_position'] . " - " . $row['name_position'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_playerposition.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>