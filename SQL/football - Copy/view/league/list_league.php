<h2>List league</h2>

<!-- If admin, you can edit file -->
<?php if (admin()) : ?>

<a href="view_league.php?page=add"><button type="button" class="btn btn-success">Add new league</button></a>
<a href="view_league.php?page=backup_league" class="btn btn-info" style="float: right">Back Up</a> <br><br>

<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name League</th>
            <th>Image</th>
            <!-- If admin, you can edit file -->
            <?php if (admin()) : ?>

            <th colspan="2">Option</th>

            <?php endif; ?>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($leagues as $key => $league) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $league->id ?></td>
            <td><?php echo $league->name ?></td>
            <td><img class="zoom" src="<?= 'data:image;base64,' . base64_encode($league->image) ?> " width="80px"
                    height="70px">
            </td>
            </td>

            <!-- If admin, you can edit file -->
            <?php if (admin()) : ?>

            <td> <a href="view_league.php?page=delete&id=<?php echo $league->id; ?>"
                    class="btn btn-warning btn-sm">Delete</a></td>
            <td> <a href="view_league.php?page=edit&id=<?php echo $league->id; ?>"
                    class="btn btn-primary btn-sm">Update</a></td>

            <?php endif; ?>
            <?php endforeach; ?>
    </tbody>
</table>
<!-- Jquery search -->
<script src="/public/js/search.js"></script>