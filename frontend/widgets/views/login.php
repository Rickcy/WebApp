<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
?>
<div id="loginpop" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="row">
                <div class="col-sm-6 login">
                    <h4>Login</h4>


                    <?


                    $form = ActiveForm::begin([
                        'enableAjaxValidation' => true,
                        'validationUrl' => Url::to(['/validate/index']),
                    ]);
                    ?>

                    <?=$form->field($model,'username') ?>
                    <?=$form->field($model,'password')->passwordInput() ?>
                    <?=$form->field($model,'rememberMe')->checkbox() ?>

                    <?=\yii\helpers\Html::submitButton('Login',['class' => 'btn btn-success']) ?>


                    <?
                    ActiveForm::end();
                    ?>

                </div>
                <div class="col-sm-6">
                    <h4>New User Sign Up</h4>
                    <p>Join today and get updated with all the properties deal happening around.</p>
                    <button type="submit" class="btn btn-info"  onclick="window.location.href='<?=\yii\helpers\Url::to('front/front/register/') ?>'">Join Now</button>
                </div>

            </div>
        </div>
    </div>
</div>