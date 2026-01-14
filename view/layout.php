<!DOCTYPE html>
<html lang="en">
<head>
    <title>ArtSpace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif">
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <nav class="one">
        <ul class="topmenu">
            <li><a href="#"><?= __('categories') ?><i class="fa fa-angle-down"></i></a>
                <ul class="submenu">
                    <?php
                        Controller::AllCategory();
                    ?>
                </ul>
            </li>
            <li><a href="testError"><?= __('info') ?></a></li>
            <li><a href="./"><?= __('home_page') ?></a></li>
            <li><a href="registerForm"><?= __('registration') ?></a></li>
            <li><a href="<?= langLink('eng') ?>">ENG</a> | <a href="<?= langLink('est') ?>">EST</a></li>
        </ul>
    </nav>

    <section>
        <div class="divBox">
            <?php
            if(isset($content)) {
                echo $content;
            }
            else{
                echo '<h1>Content is gone!</h1>';
            }
            ?>
        </div>
    </section>
    <hr>
    <p style="display: block; text-align:center">2026 &copy</p>
    
</body>
</html>