<?php if (admin()) : ?>

<?php include '../../model/db/connect.php'; ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Player</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID Player</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_player" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="first_name"
                        value="<?= isset($error) ? $player->firstname : "" ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name"
                        value="<?= isset($error) ? $player->lastname : "" ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="age" placeholder="" value="<?= isset($error) ? $player->age : "" ?>"
                        required>
                </div>
                <div class="form-group">
                    <label>Height</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="height" placeholder=""
                        value="<?= isset($error) ? $player->height : "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Weight</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="weight" value="<?= isset($error) ? $player->weight : "" ?>"
                        placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Clothers number</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="clothers_number"
                        value="<?= isset($error) ? $player->clothersnumber : "" ?>" placeholder="" required>
                </div>

                <!-- Select id club -->
                <div class="form-group">
                    <label>ID Club</label>
                    <select class="form-control" name="id_club">
                        <?php
                            $sql = "SELECT * FROM club";
                            $result = $connect->query($sql);
                            foreach ($result as $row) {
                                echo "<option value=" . $row['id_club'] . ">" . $row['id_club'] . " - " . $row['name_club'] . "</option>";
                            }
                            ?>
                    </select>
                </div>

                <!-- Select id nation team -->
                <div class="form-group">
                    <label>ID National team</label>
                    <select class="form-control" name="id_nation">
                        <?php
                            $sql = "SELECT * FROM national_team";
                            $result = $connect->query($sql);
                            foreach ($result as $row) {
                                echo "<option value=" . $row['id_nation'] . ">" . $row['id_nation'] . " - " . $row['name_nation'] . "</option>";
                            }
                            ?>
                    </select>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" class="form-control" name="image" id="image" placeholder="">
                </div>
                <button type="submit" class="btn btn-primary">Add New</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
            </form>
        </div>
    </div>
</div>
<br>
<?php
    if (isset($message)) {
        echo "<div class='alert alert-success'>
    <strong>Success</strong>, player " . $player->firstname . " " . $player->lastname . " is created
    </div>";
    }
    if (isset($error)) {
        echo "<div class='alert alert-danger'><strong>Fail</strong>, player Id <strong>" . $player->id . "</strong> is already exist!</div>";
    }
    ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>