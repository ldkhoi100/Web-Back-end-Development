<?php if (admin()) : ?>

<h2>List Cup deleted</h2>

<table class="table table-hover" id="employee_data">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name Cup</th>
            <th>Image</th>
            <th colspan="2">Option</th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($cups as $key => $cup) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $cup->id ?></td>
            <td><?php echo $cup->name ?></td>
            <td><img class="zoom" src="<?= 'data:image;base64,' . base64_encode($cup->image) ?> " width="60px"
                    height="60px"></td>
            <td> <a href="view_cup.php?page=backupfile&id=<?php echo $cup->id; ?>" class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_cup.php?page=deleteForever&id=<?php echo $cup->id; ?>"
                    class="btn btn-danger btn-sm">Delete Forever</a></td>
            <?php endforeach; ?>
    </tbody>
</table>
<!-- Jquery search -->
<script src="/public/js/search.js"></script>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>