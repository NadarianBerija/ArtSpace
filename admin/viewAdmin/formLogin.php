<?php
if (isset($_SESSION['userId'])) {
    header('Location: login');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form action="login" method="POST" class="form-singin">
            <h3 class="form-singin-heading">Enter your details</h3>
            <input type="text" name="email" class="form-control" placeholder="Email" autofocus>
            <input type="password" name="password" class="form-control" placeholder="Пароль">
            <button class="btn btn-lg btn-primary btn-block" type="submint" name="btnLogin">Login</button>

            <p style="padding-top:10px;">
                <?php
                if (isset($_SESSION['errorString'])) {
                    echo $_SESSION['errorString'];
                    unset($_SESSION['errorString']);
                }
                ?>
            </p>
            <p style="padding-top: 10px;"><a href="../">Web site</a></p>
        </form>
    </div>
</body>
</html>