<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<div class="">
    <div id="wrapper">
        <div id="login" class="animate form">
            <section class="login_content">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'options' => ['class' => 'form-horizontal'],
                    'fieldConfig' => [
                        'template' => "<div>{input}\n{error}</div>",
                    ],
                ]); ?>
                    <div>
                        <?php echo $form->field($model, 'email')->textInput(['autofocus' => true, 'class' => "form-control", 'placeholder' => "Your Email"]); ?>
                    </div>
                    <div>
                        <?= $form->field($model, 'password')->passwordInput(['class' => "form-control", 'placeholder' => "Password"]) ?>
                    </div>
                    <div>
                        <?= Html::submitButton('Sign In', ['class' => 'btn btn-primary submit', 'name' => 'login-button']) ?>
                    </div>
                    <div class="clearfix"></div>
                <?php ActiveForm::end(); ?>
                <!-- form -->
            </section>
            <!-- content -->
        </div>
    </div>
</div>