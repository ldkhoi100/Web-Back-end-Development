<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Discount Calculator</title>
    <!-- Tính chiết khấu cho sản phẩm khi mua hàng online -->
</head>
<body>
    <div>
    <form action="display_discount.php" method='POST'>
    <h2 style='color:blue; text-align:center'>Product Discount Calculator</h2>
    <table align="center">
    <!-- Mô tả của sản phẩm -->
    <tr><td>Product Description:</td><td><input type="text" placeholder='Name Product' name='nameProduct'></td></tr>
    <!-- Giá niêm yết của sản phẩm -->
    <tr><td>List Price:</td><td><input type="text" placeholder='USD' name='price'> USD</td></tr>
    <!-- Tỷ lệ chiết khấu phần trăm -->
    <tr><td>Discount Percent:</td><td><input type="text" placeholder='Percent %' name='percent'> %</td></tr>
    <tr><td><input type="submit" value="Calculate Discount"></td></tr>
    </table>
    </form>
    </div>
</body>
</html>