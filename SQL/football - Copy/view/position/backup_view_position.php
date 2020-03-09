<?php if (admin()) : ?>

<h2>List Position deleted</h2>

<table class="table table-hover" id="employee_data">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name Position</th>
            <th>Option</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($cups as $key => $cup) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $cup->id ?></td>
            <td><?php echo $cup->name ?></td>
            <td> <a href="view_position.php?page=backupfile&id=<?php echo $cup->id; ?>"
                    class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_position.php?page=deleteForever&id=<?php echo $cup->id; ?>"
                    class="btn btn-danger btn-sm">Delete Forever</a>
            </td>
            <?php endforeach; ?>
    </tbody>
</table>
<!-- Jquery search -->
<script src="/public/js/search.js"></script>

<!-- else, display notfound page -->
<?php else : ?>
<h1 style="color:red; text-align:center;">Not found</h1>
<?php endif; ?>