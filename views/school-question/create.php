<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolQuestion */

$this->title = 'Create School Question';
$this->params['breadcrumbs'][] = ['label' => 'School Questions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-question-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
