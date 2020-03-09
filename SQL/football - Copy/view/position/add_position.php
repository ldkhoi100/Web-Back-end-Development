<?php if (admin()) : ?>

<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Position</h1>
        </div>
        <div class="col-12">
            <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>ID Position</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_position" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>Name Position</label>
                    <input type="text" class="form-control" name="name_position" placeholder="" required>
                </div>

                <button type="submit" class="btn btn-primary" name="insert" id="insert">Add New</button>
                <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancle</button>
            </form>
        </div>
    </div>
</div>
<br>
<?php
    if (isset($message)) {
        echo "<div class='alert alert-success'><strong>Success</strong>, position <strong>" . $cup->name . "</strong> is created
    </div>";
    }

    if (isset($error)) {
        echo "<div class='alert alert-danger'><strong>Fail</strong>, position Id <strong>" . $cup->id . "</strong> is already exist!</div>";
    }
    ?>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>