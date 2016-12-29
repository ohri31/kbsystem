<?php
    require_once('models/article.php');

    require_once('controllers/MainController.php');
    require_once('controllers/ArticleController.php');
?>
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>VRocketLibrary - Knowledge base system</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="css/cssgridframework.css">
    <link rel="stylesheet" href="css/main.css">

</head>

<body class="landing-bg">
    <div class="menu">
        <div class="cont">
            <div class="row">
                <div class="col norm-4 np">
                    <ul>
                        <a href="javascript:loadPartial('partials/landing/index.html')">
                            <img src="img/logo-w.png" style="height:36px;margin-top:12px;" />
                        </a>
                        <li id="smore" class="show-more"> <a href="javascript:toggle_menu('hidden-menu')">&#9776;</a> </li>

                        <div id="hidden-menu" class="items move-right collapse">
                            <?php require_once('partials/menu.php'); ?>
                            <div class="clearfix"></div>
                        </div>

                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Partials load container -->
    <div id="partials-container">
    <?php require_once('partials/user/article.php'); ?>
    </div>

    <section class="footer">
        <div class="cont">
            <div class="row">
                <div class="col norm-3 tab-4 mob-4">
                    <a href="javascript:loadPartial('partials/landing/pricing.html')">Pricing</a>
                    <a href="javascript:loadPartial('partials/landing/liftoff.html')">Login</a>
                    <a href="javascript:loadPartial('partials/user/create.html')">Create</a>
                    <a href="javascript:loadPartial('partials/user/article.html')">Random article</a>
                </div>
                <div class="col norm-1 tab-4 mob-4">
                    <img src="img/logo-b.png" class="move-right" style="height:36px;margin-top:22px;" />
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </section>



    <script src="js/main.js"></script>
    <script src="js/slider.js"></script>
    <script src="js/validation.js"></script>
    <script src="js/spa.js"></script>
</body>

</html>