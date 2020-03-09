<?php if (admin()) : ?>

<h2>List National Team deleted</h2>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>Name National Team</th>
            <th>Continent</th>
            <th>Ranking</th>
            <th>Coach Name</th>
            <th>Image</th>
            <th>Option</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($national_teams as $key => $national_team) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $national_team->id ?></td>
            <td><?php echo $national_team->name ?></td>
            <td><?php echo $national_team->continent ?></td>
            <td><?php echo $national_team->ranking ?></td>
            <td><?php echo $national_team->coach ?></td>
            <td><img class="zoom" src="<?= 'data:image;base64,' . base64_encode($national_team->image) ?> " width="60px"
                    height="60px"> </td>
            </td>
            <td> <a href="view_national_team.php?page=backupfile&id=<?php echo $national_team->id; ?>"
                    class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_national_team.php?page=deleteForever&id=<?php echo $national_team->id; ?>"
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