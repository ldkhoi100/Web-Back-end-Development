<h2>List cup deleted</h2>

<table class="table table-hover" id="employee_data">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name Cup</th>
            <th>Image</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($cups as $key => $cup) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $cup->id ?></td>
            <td><?php echo $cup->name ?></td>
            <td><?php echo $cup->image ?></td>
            <td> <a href="view_cup.php?page=backupfile&id=<?php echo $cup->id; ?>" class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_cup.php?page=deleteForever&id=<?php echo $cup->id; ?>"
                    class="btn btn-danger btn-sm">Delete Forever</a>
            </td>
            <?php endforeach; ?>
    </tbody>
</table>