<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SchoolQuestionOption */

$this->title = 'Create School Question Option';
$this->params['breadcrumbs'][] = ['label' => 'School Question Options', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="school-question-option-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
