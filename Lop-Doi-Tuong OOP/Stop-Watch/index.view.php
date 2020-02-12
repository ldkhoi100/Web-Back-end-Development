<?php include './index.php';
?>
<h3>Array</h3>
<table>
    <tr>
        <?= showArray($array) ?>
    </tr>
</table>
<h3>Sort Array min to max</h3>
<table>
    <tr>
        <?= showArray($arraySorted) ?>
    </tr>
</table>
<?php
// check how long is...
echo '<br>';
echo 'Elapsed time: ' . StopWatch::elapsed() . ' seconds';
?>