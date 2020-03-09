<?php if (admin()) : ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New National team</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID National Team</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_nation" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>Name National Team</label>
                    <input type="text" class="form-control" name="name_nation" placeholder=""
                        value="<?= isset($error) ? $national_team->name : "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Continent</label>
                    <input type="text" class="form-control" name="continent"
                        value="<?= isset($error) ? $national_team->continent : "" ?>" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Ranking</label>
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="ranking" value="<?= isset($error) ? $national_team->ranking : "" ?>"
                        placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Coach name</label>
                    <input type="text" class="form-control" name="coach_name"
                        value="<?= isset($error) ? $national_team->coach : "" ?>" placeholder="" required>
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
    <strong>Success</strong>, national team " . $national_team->name . " is created
    </div>";
    }
    if (isset($error)) {
        echo "<div class='alert alert-danger'><strong>Fail</strong>, national team Id <strong>" . $national_team->id . "</strong> is already exist!</div>";
    }
    ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>