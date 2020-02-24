<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Cup</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>ID Cup</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_cup" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>Name Cup</label>
                    <input type="text" class="form-control" name="name_cup" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="text" class="form-control" name="image" placeholder="">
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
    <strong>Success</strong>, cup " . $cup->name . " is created
    </div>";
}
?>