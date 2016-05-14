<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Subject;
use app\models\Chapter;
use app\models\Question;


/* @var $this yii\web\View */
/* @var $model app\models\School */

$this->title = 'Add/Edit Question';
?>

<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Add/Edit Question</h2>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
			<!-- Smart Wizard -->
				<div id="wizard_add_question" class="form_wizard wizard_horizontal">
					<ul class="wizard_steps">
						<li>
							<a href="#step-1">
								<span class="step_no">1</span>
								<span class="step_descr">
									Step 1<br />
									<small>Description</small>
								</span>
							</a>
						</li>
						<li>
							<a href="#step-2">
								<span class="step_no">2</span>
								<span class="step_descr">
									Step 2<br />
									<small>Options</small>
								</span>
							</a>
						</li>
						<li>
							<a href="#step-3">
								<span class="step_no">3</span>
								<span class="step_descr">
									Step 3<br />
									<small>Preview</small>
								</span>
							</a>
						</li>
					</ul>
					<?php
					$form = ActiveForm::begin(array('options' => array(
						'class' => "form-horizontal form-label-left",
						'enableClientValidation' => true,
					), 'fieldConfig' => array(
						'template' => '<div class="form-group">{label}<div class="col-md-8 col-sm-8 col-xs-12">{input}{error}</div><div class="clearfix"></div></div>',
						'labelOptions' => array('class' => "control-label col-md-3 col-sm-3 col-xs-12")
					)));
					?>
					<div id="step-1">
						<?php $list = ArrayHelper::map(Chapter::find()->all(), 'id', 'title'); ?>
						<?php echo $form->field($model, 'chapter_id')->dropDownList($list, array('class' => "select2_group form-control", 'id' => "question-chapter_id")); ?>
						<?php echo $form->field($model, 'qtype')->dropDownList(['objective' => 'Objective', 'subjective' => 'Subjective'], ['style' => "width: 40%;", 'id' => "question-qtype"]) ?>
						<?php echo $form->field($model, 'description')->textarea(['rows' => 6, 'id' => "question-description"]) ?>
						<?php echo $form->field($model, 'marks')->textInput(['style' => "width: 40%;", 'id' => "question-marks"]) ?>
						<?php echo $form->field($model, 'status')->dropDownList(['active' => 'Active', 'inactive' => 'Inactive'], ['style' => "width: 40%;"]) ?>
					</div>
					<div id="step-2">
						<table class="table table-striped responsive-utilities jambo_table bulk_action">
							<thead>
							<tr class="headings">
								<th class="column-title" style="display: table-cell;"></th>
								<th class="column-title" style="display: table-cell;">Description </th>
								<th class="column-title hide-objective" style="display: table-cell;">Marks</th>
								<th class="column-title hide-subjective" style="display: table-cell;">Correct </th>
							</tr>
							</thead>
							<tbody>
							<?php $i = 0; foreach($model->options as $option) {?>
								<tr>
									<td class="option-answer" style="width: 10%;"><b>Option <?= $i+1; ?></b></td>
									<td style="width: 70%;">
										<?php echo $form->field($option, '['.$i.']id', ['template' => '{input}'])->hiddenInput(); ?>
										<?php echo $form->field($option, '['.$i.']description', [
											'template' => '{input}{error}'
										])->textInput(['maxlength' => true, 'id' => "questionoption-". $i ."-description"]) ?>
									</td>
									<td class="hide-objective" style="width: 10%;"><?php echo $form->field($option, '['.$i.']marks', [
											'template' => '{input}{error}'
										])->textInput(['id' => "questionoption-".$i."-marks"]) ?></td>
									<td class="hide-subjective" style="width: 10%;"><?php echo $form->field($option, '['.$i.']correct_answer', [
											'template' => '{input}{error}'
										])->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '', 'id' => "questionoption-".$i."-correct_answer"]) ?></td>
								</tr>
							<?php $i ++; }?>
							<?php while($i < 4) {?>
								<tr>
									<td class="option-answer" style="width: 10%;"><b>Option <?= $i+1; ?></b></td>
									<td style="width: 70%;"><?php echo $form->field($questionOption, '['.$i.']description', [
											'template' => '{input}{error}'
										])->textInput(['maxlength' => true, 'id' => "questionoption-". $i ."-description"]) ?></td>
									<td class="hide-objective" style="width: 10%;"><?php echo $form->field($questionOption, '['.$i.']marks', [
											'template' => '{input}{error}'
										])->textInput(['id' => "questionoption-".$i."-marks"]) ?></td>
									<td class="hide-subjective" style="width: 10%;"><?php echo $form->field($questionOption, '['.$i.']correct_answer', [
											'template' => '{input}{error}'
										])->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '', 'id' => "questionoption-".$i."-correct_answer"]) ?></td>
								</tr>
							<?php $i ++; }?>
							</tbody>
						</table>
					</div>
					<div id="step-3">
						<div class="col-md-2 col-sm-2 col-xs-12">&nbsp;</div>
						<div class="col-md-9 col-sm-9 col-xs-12" id="question-preview"></div>
					</div>
					<?php ActiveForm::end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>