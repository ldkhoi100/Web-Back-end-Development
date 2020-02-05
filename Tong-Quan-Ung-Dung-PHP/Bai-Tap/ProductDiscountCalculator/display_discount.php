<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #a {
            text-align: center;
            margin: auto;
        }
        h1{
            text-align: center;
            color:red;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nameProduct = $_POST['nameProduct'];
        $price = $_POST['price'];
        $percent = $_POST['percent'];
        if ($nameProduct == null || $price == null || $percent == null || !is_numeric($price) || !is_numeric($percent)) {
    ?>
            <h1>Error</h1>
            <div>
                <form action="display_discount.php" method='POST'>
                    <h2 style='color:blue; text-align:center'>Product Discount Calculator</h2>
                    <table align="center">
                        <!-- Mô tả của sản phẩm -->
                        <tr>
                            <td>Product Description:</td>
                            <td><input type="text" placeholder='Name Product' name='nameProduct'></td>
                        </tr>
                        <!-- Giá niêm yết của sản phẩm -->
                        <tr>
                            <td>List Price:</td>
                            <td><input type="text" placeholder='USD' name='price'> USD</td>
                        </tr>
                        <!-- Tỷ lệ chiết khấu phần trăm -->
                        <tr>
                            <td>Discount Percent:</td>
                            <td><input type="text" placeholder='Percent %' name='percent'> %</td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="Calculate Discount"></td>
                        </tr>
                    </table>
                </form>
            </div>
    <?php
        } else {
            echo '<div id="a">';
            echo '<h2 style="color: blue;">Product Discount Calculator</h2>';
            echo 'Name Product: ' . $nameProduct . '<br>';
            echo 'Price: ' . $price . '$<br>';
            echo 'Discount Percent: ' . $percent . '%<br>';
            echo 'Discount Amount: ' . $price * ($percent / 100) . '$<br>';
            echo 'Discount Price: ' . ($price - ($price * ($percent / 100))) . '$';
            echo '</div>';
        }
    }
    ?>
</body>

</html>