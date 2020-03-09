<?php if (admin()) : ?>

<?php include '../../model/db/connect.php' ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Relationship Beetween National And Cup</h1>
        </div>
        <div class="col-12">
            <form method="post">

                <div class="form-group">
                    <label>ID Nation</label>
                    <select class="form-control" name="id_club">
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
                    <label>ID Cup</label>
                    <select class="form-control" name="id_league">
                        <?php
                            $sql = "SELECT * FROM cup";
                            $result = $connect->query($sql);
                            foreach ($result as $row) {
                                echo "<option value=" . $row['id_cup'] . ">" . $row['id_cup'] . " - " . $row['name_cup'] . "</option>";
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
    } ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>