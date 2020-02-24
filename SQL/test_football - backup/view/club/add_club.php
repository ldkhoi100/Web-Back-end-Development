<div class="col-12 col-md-12">
    <div class="row">
        <div class="col-12">
            <h1>Add New Club</h1>
        </div>
        <div class="col-12">
            <form method="post">
                <div class="form-group">
                    <label>ID Club</label>
                    <!-- Max length number is 11 -->
                    <input type="number" pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==11) return false;"
                        class="form-control" name="id_club" placeholder="Number, Max-length: 11" required>
                </div>
                <div class="form-group">
                    <label>Name Club</label>
                    <input type="text" class="form-control" name="name_club" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Stadium</label>
                    <input type="text" class="form-control" name="stadium" placeholder="" required>
                </div>
                <div class="form-group">
                    <label>Coach Name</label>
                    <input type="text" class="form-control" name="coach_name" placeholder="" required>
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
?>