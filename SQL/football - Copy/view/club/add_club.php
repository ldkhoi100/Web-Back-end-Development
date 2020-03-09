<?php if (admin()) : ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Club</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID Club</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_club" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>Name Club</label>
                    <input type="text" class="form-control" name="name_club" placeholder=""
                        value="<?= isset($error) ? $club->name : "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Stadium</label>
                    <input type="text" class="form-control" name="stadium" placeholder=""
                        value="<?= isset($error) ? $club->stadium : "" ?>" required>
                </div>
                <div class="form-group">
                    <label>Coach Name</label>
                    <input type="text" class="form-control" name="coach_name"
                        value="<?= isset($error) ? $club->coach : "" ?>" placeholder="" required>
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
    <strong>Success</strong>, club " . $club->name . " is created
    </div>";
    }
    if (isset($error)) {
        echo "<div class='alert alert-danger'><strong>Fail</strong>, club Id <strong>" . $club->id . "</strong> is already exist!</div>";
    }
    ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>