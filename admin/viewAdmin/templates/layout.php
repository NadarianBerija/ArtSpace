<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="public/css/bootstrap.css" rel="stylesheet">
    <link href="public/css/mystyle.css" rel="stylesheet">
    <link href="public/css/front-awesome.min.css" rel="stylesheet">
    <script src="public/js/jquery.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="public/js/ajaxupload.3.5.js"></script>
</head>
<body>
    <div class="container">

        <?php
        if (isset($_SESSION["userId"]) && isset($_SESSION["sessionId"]))
        {
        ?>

        <div class="header clearfix">
            <nav class="navbar navbar-default">
                <div class="container-fluid">

                    <?php
                    echo '<ul class="nav nav-pills pull-right">
                    <li role="button">'.$_SESSION["name"].
                    '<a href="logout" style="display: inline;"><span>Log out </span><i class="fa fa-sign-out"></i>
                    </a></li></ul>';

                    if (isset($_SESSION["status"]) && $_SESSION["status"]=="admin") {
                        echo '<h4><a href="../" target=_blank>Web site Arts portal</a>';
                        echo ' <span>&#187</span> <a href="./">Start admin </a>';
                        echo ' <span>&#187</span> <a href="categoryAdmin">Arts categories </a>';
                        echo ' <span>&#187</span> <a href="artsAdmin">Arts List</a>';
                        echo ' </h4>';
                    }else{
                        echo '<h4>You have no rights!</h4>';
                    }
                    ?>

                </div>
            </nav>
        </div>

        <?php
        }
        ?> 

        <div id="content" style="padding-top: 20px;">
            <?php echo $content; ?>
        </div>
        <footer class="footer">
            <p>&copy; 2025 Admin dashboard <i class="fa fa-child"></i></p>
        </footer>
    </div>
</body>
</html>