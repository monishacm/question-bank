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
			<div id="wizard" class="form_wizard wizard_horizontal">
				<ul class="wizard_steps">
					<li>
						<a href="#step-1">
							<span class="step_no">1</span>
							<span class="step_descr">
								Step 1<br />
								<small>Add Question</small>
							</span>
						</a>
					</li>
					<li>
						<a href="#step-2">
							<span class="step_no">2</span>
							<span class="step_descr">
								Step 2<br />
								<small>Add Question Option</small>
							</span>
						</a>
					</li>
					<li>
						<a href="#step-3">
							<span class="step_no">3</span>
							<span class="step_descr">
								Step 3<br />
								<small>Preview Question</small>
							</span>
						</a>
					</li>
					<li>
						<a href="#step-4">
							<span class="step_no">4</span>
							<span class="step_descr">
								Step 4<br />
								<small>Done</small>
							</span>
						</a>
					</li>
				</ul>
                      
				<div id="step-1">
					<?php 
						$form = ActiveForm::begin(array('options' => array(
							'class' => "form-horizontal form-label-left",
						), 'fieldConfig' => array(
							'template' => '<div class="form-group">{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}{error}</div></div>',
							'labelOptions' => array('class' => "control-label col-md-3 col-sm-3 col-xs-12")
						))); 
					?>
					
					<?php $list = ArrayHelper::map(Chapter::find()->all(), 'id', 'title'); ?>
					<?php echo $form->field($model, 'chapter_id')->dropDownList($list, array('empty'=>'(Select a Chapter)')); ?>
					
                    <?php echo $form->field($model, 'added_by')->textInput() ?>
					
					<?php echo $form->field($model, 'description')->textarea(['rows' => 3]) ?>
					
					<?php echo $form->field($model, 'qtype')->dropDownList([ 'subjective' => 'Subjective', 'objective' => 'Objective', ], ['prompt' => '']) ?>
					
					<?php echo $form->field($model, 'marks')->textInput() ?>

					<?php echo $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

					<?php ActiveForm::end(); ?>
				</div>
				
				<div id="step-2">
					<?php 
						$form = ActiveForm::begin(array('options' => array(
							'class' => "form-horizontal form-label-left",
						), 'fieldConfig' => array(
							'template' => '<div class="form-group">{label}<div class="col-md-6 col-sm-6 col-xs-12">{input}{error}</div></div>',
							'labelOptions' => array('class' => "control-label col-md-3 col-sm-3 col-xs-12")
						))); 
					?>
					
					<?php $list = ArrayHelper::map(Question::find()->all(), 'id', 'description'); ?>
					<?php echo $form->field($questionOption, 'question_id')->dropDownList($list, array('empty'=>'(Select a Question)')); ?>

					<?php echo $form->field($questionOption, 'description')->textInput(['maxlength' => true]) ?>

					<?php echo $form->field($questionOption, 'correct_answer')->dropDownList([ 'y' => 'Y', 'n' => 'N', ], ['prompt' => '']) ?>

					<?php echo $form->field($questionOption, 'marks')->textInput() ?>
						
                    <?php ActiveForm::end(); ?>
                        
				</div>
				
				
                      <div id="step-3">
                        <h2 class="StepTitle">Step 3 Content</h2>
                        <p>
                          sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore
                          eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                          in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                      </div>
                      <div id="step-4">
                        <h2 class="StepTitle">Step 4 Content</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                          Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                          in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p>
                          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                          in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                      </div>

                    </div>
                    <!-- End SmartWizard Content -->

                  </div>
                </div>
              </div>
            </div>
   
