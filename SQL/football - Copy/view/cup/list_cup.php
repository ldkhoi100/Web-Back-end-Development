<h2>List Cup</h2>

<!-- If admin, you can edit file -->
<?php if (admin()) : ?>

<a href="view_cup.php?page=add"><button type="button" class="btn btn-success">Add new cup</button></a>
<a href="view_cup.php?page=backup_cup" class="btn btn-info" style="float: right">Back Up</a> <br><br>

<?php endif; ?>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name cup</th>
            <th>Image</th>

            <!-- If admin, you can edit file -->
            <?php if (admin()) : ?>

            <th colspan="2">Option</th>

            <?php endif; ?>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($cups as $key => $cup) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $cup->id ?></td>
            <td><?php echo $cup->name ?></td>
            <td><img class="zoom" src="<?= 'data:image;base64,' . base64_encode($cup->image) ?> " width="60px"
                    height="65px"> </td>
            </td>

            <!-- If admin, you can edit file -->
            <?php if (admin()) : ?>

            <td> <a href="view_cup.php?page=delete&id=<?php echo $cup->id; ?>" class="btn btn-warning btn-sm">Delete</a>
            </td>
            <td> <a href="view_cup.php?page=edit&id=<?php echo $cup->id; ?>" class="btn btn-primary btn-sm">Update</a>
            </td>

            <?php endif; ?>

            <?php endforeach; ?>
    </tbody>
</table>
<!-- Jquery search -->
<script src="/public/js/search.js"></script>