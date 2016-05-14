<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
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

    <title>Teacher's Aide: Login</title>
    <?php $this->head(); ?>
</head>
<body style="background:#F7F7F7;">
    <?php $this->beginBody() ?>
    <?php echo $content; ?>
    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>