<h2>List Club deleted</h2>

<table class="table table-hover" id="employee_data">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name Club</th>
            <th>Stadium</th>
            <th>Coach Name</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clubs as $key => $club) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $club->id ?></td>
            <td><?php echo $club->name ?></td>
            <td><?php echo $club->stadium ?></td>
            <td><?php echo $club->coach ?></td>
            <td> <a href="view_club.php?page=backupfile&id=<?php echo $club->id; ?>" class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_club.php?page=deleteForever&id=<?php echo $club->id; ?>"
                    class="btn btn-danger btn-sm">Delete Forever</a>
            </td>
            <?php endforeach; ?>
    </tbody>
</table>