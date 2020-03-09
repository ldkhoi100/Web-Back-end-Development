<?php include '../../model/db/connect.php'; ?>
<?php
function admin()
{
    $boolen = true;
    $sql = "SELECT * FROM users";
    $result = $GLOBALS["connect"]->query($sql);
    foreach ($result as $row) {
        if (($row['flag'] == true) && ($row['username'] == $_SESSION['username'])) {
            $boolen = true;
            break;
        } else {
            $boolen = false;
        }
    }
    return $boolen;
}

function boss()
{
    return $_SESSION['username'] == 'admin';
}
?>