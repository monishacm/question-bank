<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Subject;

/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = 'Add/Edit School';
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Add/Edit Subject Information</h2>
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

                <?php $list = ArrayHelper::map(Subject::find()->all(), 'id', 'title'); ?>
				<?php echo $form->field($model, 'subject_id')->dropDownList($list, array('empty'=>'(Select a Subject)')); ?>

				<?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
				
				<?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

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
