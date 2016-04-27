<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\QuestionSetQuestion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="question-set-question-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'question_set_id')->textInput() ?>

    <?= $form->field($model, 'question_id')->textInput() ?>

    <?= $form->field($model, 'marks')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
