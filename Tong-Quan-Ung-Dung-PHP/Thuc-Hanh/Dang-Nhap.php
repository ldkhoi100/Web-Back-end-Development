<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        .login {
            height:180px; width:230px;
            margin:0;
            padding:10px;
            border:1px #CCC solid;
        }
        .login input {
            padding:5px; margin:5px
        }
        </style>  
</head>
<body>
    <form action="" method="GET">
        <div class="login"> 
            <h2>Login</h2>
            <input type="text" name="username" placeholder="username">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="submit">
        </div>
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "GET") {
            $username = $_GET["username"];
            $password = $_GET["password"];
            if($username=="admin" && $password=="admin"){
                echo "<h2>Xin chào <span style='color:red'>" .$username. "</span></h2>";
            }
            else{
                echo "Wrong Pass";
            }
        }
    ?>
</body>
</html>