<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SchoolQuestionOption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="school-question-option-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'school_question_id')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correct_answer')->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'marks')->textInput() ?>

    <?= $form->field($model, 'deleted')->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
