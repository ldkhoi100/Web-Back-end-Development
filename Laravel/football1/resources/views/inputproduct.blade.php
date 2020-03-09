<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <title>Product Discount Calculator</title>
</head>

<body>
    <h1>Product Discount Calculator</h1>
    <form action="/inputproducts" method="POST">
        @csrf
        <p>
            Product Description:
            <input type="text" name="productDescription" placeholder="description product" />
        </p>
        <p>
            List Price:
            <input type="text" name="price" placeholder="List price" />
        </p>
        <p>
            Discount Percent:
            <input type="text" name="discountPercent" placeholder="percent" />
        </p>
        <p>
            <button type="submit">Calculator</button>
        </p>
    </form>
</body>

</html>