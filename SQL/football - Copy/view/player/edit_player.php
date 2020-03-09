<?php if (admin()) : ?>

<?php include '../../model/db/connect.php'; ?>

<h2>Update Player</h2>
<form method="post" action="view_player.php?page=edit" enctype="multipart/form-data">
    <input type="hidden" name="id_player" value="<?php echo $player->id; ?>" />
    <div class="form-group">
        <label>First Name</label>
        <input type="text" name="first_name" value="<?php echo $player->firstname; ?>" class="form-control" />
    </div>
    <div class="form-group">
        <label>Last Name</label>
        <textarea name="last_name" class="form-control"><?php echo $player->lastname; ?></textarea>
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
            class="form-control" name="age" value="<?php echo $player->age; ?>" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Height</label>
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
            class="form-control" name="height" value="<?php echo $player->height; ?>" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Weight</label>
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
            class="form-control" name="weight" value="<?php echo $player->weight; ?>" placeholder="" required>
    </div>
    <div class="form-group">
        <label>Clothers Number</label>
        <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
            class="form-control" name="clothers_number" value="<?php echo $player->clothersnumber; ?>" placeholder=""
            required>
    </div>
    <div class="form-group">
        <label>ID Club</label>
        <select class="form-control" name="id_club">
            <?php
                $sql = "SELECT * FROM club";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_club'] === $player->idclub) {
                        echo "<option value=" . $row['id_club'] . " selected>" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_club'] . ">" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>

    <div class="form-group">
        <label>ID National team</label>
        <select class="form-control" name="id_nation">
            <?php
                $sql = "SELECT * FROM national_team";
                $result = $connect->query($sql);
                foreach ($result as $row) {
                    if ($row['id_nation'] === $player->idnation) {
                        echo "<option value=" . $row['id_nation'] . " selected>" . $row['id_nation'] . " - " . $row['name_nation'] . "</option>";
                    } else {
                        echo "<option value=" . $row['id_nation'] . ">" . $row['id_nation'] . " - " . $row['name_nation'] . "</option>";
                    }
                }
                ?>
        </select>
    </div>

    <div class="form-group">
        <label>Image</label>
        <div>
            <input type="file" name="image" id="image">
            <img src="<?= 'data:image;base64,' . base64_encode($player->image) ?> " width="60px" height="60px">
            </td>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Update" class="btn btn-primary" />
        <a href="view_player.php" class="btn btn-secondary">Cancel</a>
    </div>
</form>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>