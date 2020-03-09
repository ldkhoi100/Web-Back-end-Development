<?php if (admin()) : ?>

<?php include '../../model/db/connect.php' ?>

<h2>Update Club Relationship Beetween National And Cup</h2>
<form method="post" action="view_nationalcup.php?page=edit">
    <input type="hidden" name="id_club" value="<?php echo $clubleague->idclub; ?>" />
    <input type="hidden" name="id_league" value="<?php echo $clubleague->idleague; ?>" />

    <div class="form-group">
        <label>ID National</label>
        <select class="form-control" name="idclub">
            <?php
                $sql = "SELECT * FROM national_team";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_nation'] === $clubleague->idclub) {
                        echo "<option value=" . $row['id_nation'] . " selected>" . $row['id_nation'] . " - " . $row['name_nation'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_nation'] . ">" . $row['id_nation'] . " - " . $row['name_nation'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <label>ID Cup</label>
        <select class="form-control" name="idleague">
            <?php
                $sql = "SELECT * FROM cup";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_cup'] === $clubleague->idleague) {
                        echo "<option value=" . $row['id_cup'] . " selected>" . $row['id_cup'] . " - " . $row['name_cup'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_cup'] . ">" . $row['id_cup'] . " - " . $row['name_cup'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_nationalcup.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>