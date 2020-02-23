<?php include 'connect_clubleague.php' ?>

<h2>Update Club Relationship Beetween Club And League</h2>
<form method="post" action="view_clubleague.php?page=edit">
    <div class="form-group">
        <label>ID Club</label>
        <select class="form-control" name="id1">
            <?php
            $sql = "SELECT * FROM club";
            $result = $connect->query($sql);
            foreach ($result as $row) {
                echo "<option value=" . $row['id_club'] . ">" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label>ID League</label>
        <select class="form-control" name="id2">
            <?php
            $sql = "SELECT * FROM league";
            $result = $connect->query($sql);
            foreach ($result as $row) {
                echo "<option value=" . $row['id_league'] . ">" . $row['id_league'] . " - " . $row['name_league'] . "</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_clubleague.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>