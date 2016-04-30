<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = 'Add/Edit User';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= ($model->isNewRecord ? "Add User" : "Edit User")?></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <?php $form = ActiveForm::begin(array('options' => array(
                    'class' => "form-horizontal form-label-left",
                ), 'fieldConfig' => array(
                    'template' => '<div class="form-group">{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}{error}</div></div>',
                    'labelOptions' => array('class' => "control-label col-md-3 col-sm-3 col-xs-12")
                ))); ?>

                <?= $form->field($model, 'email')->textInput() ?>
                <?php if($model->isNewRecord) {?>
                <?= $form->field($model, 'password')->passwordInput() ?>
                <?php if(!$model->school_id) {?>
                <?= $form->field($model, 'roll')->dropDownList(['admin' => "Admin", 'reviewer' => "Reviewer"]) ?>
                <?php }?>
                <?php }?>
                <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'phone_no')->textInput(['maxlength' => true]) ?>

                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
