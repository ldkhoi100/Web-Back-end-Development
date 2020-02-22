    <h2>List Club</h2>
    <a href="view_club.php?page=add"><button type="button" class="btn btn-success">Add new club</button></a>
    <a href="view_club.php?page=backup_club" class="btn btn-info" style="float: right">Back Up</a>
    <br><br>

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
                <td> <a href="view_club.php?page=delete&id=<?php echo $club->id; ?>"
                        class="btn btn-warning btn-sm">Delete</a></td>
                <td> <a href="view_club.php?page=edit&id=<?php echo $club->id; ?>"
                        class="btn btn-primary btn-sm">Update</a></td>
                <?php endforeach; ?>
        </tbody>
    </table>