<?php if (admin()) : ?>

<h2>List Player Deleted</h2>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Age</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Clothers</th>
            <th>Name club</th>
            <th>Name nation</th>
            <th>Image</th>
            <th colspan="2" style="text-align: center">Option</th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($players as $key => $player) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $player->id ?></td>
            <td><?php echo $player->firstname ?></td>
            <td><?php echo $player->lastname ?></td>
            <td><?php echo $player->age ?></td>
            <td><?php echo $player->height ?></td>
            <td><?php echo $player->weight ?></td>
            <td><?php echo $player->clothersnumber ?></td>
            <td><?php echo $player->nameclub ?></td>
            <td><?php echo $player->namenation ?></td>
            <td><img class="zoom" src="<?= 'data:image;base64,' . base64_encode($player->image) ?> " width="60px"
                    height="60px">
            </td>
            </td>
            <td> <a href="view_player.php?page=backupfile&id=<?php echo $player->id; ?>"
                    class="btn btn-warning btn-sm">Back
                    Up File</a></td>
            <td> <a href="view_player.php?page=deleteForever&id=<?php echo $player->id; ?>"
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