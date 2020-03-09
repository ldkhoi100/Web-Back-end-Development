<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dictionary</title>
</head>
<body>
    <h1>Product Discount Calculator</h1>
    <form action="/dictionary" method="POST">
        @csrf
        <p>
            Nhập từ cần tra: <input type="text" name="textDictionary" placeholder="text">
        </p>
        <p>
            <button type="submit">Dịch</button>
        </p>
    </form>
    @isset($result)
    {{ $result }}
    @endisset
</body>
</html>
