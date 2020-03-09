<?php if (admin()) : ?>

<?php include '../../model/db/connect.php' ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Relationship Beetween Club And League</h1>
        </div>
        <div class="col-12">
            <form method="post">

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

                <div class="form-group">
                    <label>ID League</label>
                    <select class="form-control" name="id_league">
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
                    <button type="submit" class="btn btn-primary">Add New</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>
<?php
    if (isset($message)) {
        echo "<div class='alert alert-success'>
    <strong>Success</strong>, club " . $clubleague->idclub . " and league " . $clubleague->idleague . " is created
    </div>";
    }
    ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>