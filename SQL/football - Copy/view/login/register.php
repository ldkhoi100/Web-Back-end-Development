<?php
require_once "../../model/core/DBConnection.php";
include '../../controller/login/register.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/public/css/login.css">
</head>

<body>
    <div class="header">
        <h2>Register</h2>
    </div>
    <form method="post" action="register.php">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="confirm_password" class="form-control"
                value="<?php echo $confirm_password; ?>">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <div class="input-group">
            <!-- <button type="submit" class="btn" name="register_btn">Register</button> -->
            <button type="submit" class="btn">Submit</button>
            <button type="reset" class="btn">Reset</button>
        </div>
        <p>
            Already a member? <a href="login.php">Sign in</a>
        </p>
    </form>

</body>

</html>