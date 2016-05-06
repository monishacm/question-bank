<?php

/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\AppAsset;
use app\assets\AppIeAsset;

AppAsset::register($this);
AppIeAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Teacher's Aide | <?php echo $this->title; ?></title>
    <?php $this->head(); ?>
</head>
<body class="nav-md">
    <?php $this->beginBody() ?>
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo Yii::$app->urlManager->createUrl("admin/ta-questions"); ?>" class="site_title"><i class="fa fa-paw"></i> <span>Teacher's Aide!</span></a>
                    </div>
                    <div class="clearfix"></div>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
								<li>
                                    <a><i class="fa fa-question-circle"></i> Questions <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/ta-questions"); ?>">TA Questions</a></li>
<!--                                        <li><a href="--><?php //echo Yii::$app->urlManager->createUrl("admin/school-questions"); ?><!--">School's Questions</a></li>-->
                                    </ul>
                                </li>
                                <li>
                                    <a><i class="fa fa-gears"></i> Configuration <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/schools"); ?>">Schools</a></li>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/users"); ?>">Users</a></li>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/classes"); ?>">Classes</a></li>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/subjects"); ?>">Subjects</a></li>
                                        <li><a href="<?php echo Yii::$app->urlManager->createUrl("admin/chapters"); ?>">Chapters</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="images/user.png" alt="">Monish Chakrabortty
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <!-- page content -->
            <div class="right_col" role="main">
                <?php echo $content; ?>
                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Questions - Copyright © 2016
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
            <!-- /page content -->
        </div>
    </div>
    <div id="custom_notifications" class="custom-notifications dsp_none">
        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
        </ul>
        <div class="clearfix"></div>
        <div id="notif-group" class="tabbed_notifications"></div>
    </div>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
