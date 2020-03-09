<h2>List Login</h2>

<table class="table table-hover">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>Username</th>
            <th>Password</th>
            <th>Creat at</th>
            <th>Access</th>
            <th colspan="3" style="text-align: center;">Option</th>
        </tr>
    </thead>
    <tbody id="myTable">
        <?php foreach ($listlogins as $key => $listlogin) : ?>
        <tr>
            <td><?php echo ++$key ?></td>
            <td><?php echo $listlogin->username ?></td>
            <td>*****</td>
            <td><?php echo $listlogin->creatat ?></td>
            <td><?php echo $listlogin->flag ?></td>
            <td> <a href="view_list.php?page=grant&id=<?php echo $listlogin->id; ?>"
                    class="btn btn-warning btn-sm">Grant access</a></td>
            <td> <a href="view_list.php?page=revoke&id=<?php echo $listlogin->id; ?>"
                    class="btn btn-primary btn-sm">Revoke access</a></td>
            <td> <a href="view_list.php?page=delete&id=<?php echo $listlogin->id; ?>"
                    class="btn btn-danger btn-sm">Delete</a></td>
            <?php endforeach; ?>
    </tbody>
</table>
<!-- Jquery search -->
<script src="/public/js/search.js"></script>