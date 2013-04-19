<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $this->pageTitle ?></title>
    <meta name="viewport" content="width=device-width">
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/q.js"></script>
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo Yii::app()->baseUrl ?>/css/style.css" type="text/css" />
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a href="<?php echo Yii::app()->homeUrl ?>" class="brand">home</a>
            <div class="nav-collapse collapse" id="main-menu">
                <ul class="nav" id="main-menu-left">
                    <!--<li><a onclick="pageTracker._link(this.href); return false;" href="http://news.bootswatch.com">Questions</a></li>
                    <li><a>Tags</a></li>
                    <li><a>Users</a></li>
                    <li><a>Unanswerd</a></li>-->
                </ul>
                <ul class="nav pull-right" id="main-menu-right">
                    <li>
                        <!--<a href="<?php /*echo Yii::app()->createUrl('user/login') */?>">Sign In</a>-->
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 55px">
    <div class="row show-grid">

            <?php echo $content ?>
    </div>
</div>
<div class="modal-footer">
    <!-- Start of StatCounter Code for Default Guide -->
    <script type="text/javascript">
        var sc_project=8883611;
        var sc_invisible=0;
        var sc_security="b38cd1fb";
        var scJsHost = (("https:" == document.location.protocol) ?
            "https://secure." : "http://www.");
        document.write("<sc"+"ript type='text/javascript' src='" + scJsHost+
            "statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <noscript><div class="statcounter"><a title="free hit counter"
                                          href="http://statcounter.com/free-hit-counter/" target="_blank"><img
                    class="statcounter" src="http://c.statcounter.com/8883611/0/b38cd1fb/0/"
                    alt="free hit counter"></a></div></noscript>
    <!-- End of StatCounter Code for Default Guide -->
</div>
</body>
</html>