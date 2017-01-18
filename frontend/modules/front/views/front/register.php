
<?php
/* @var $model frontend\models\SignupForm */
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Registration';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row register">
    <div class="col-lg-6 col-lg-offset-3 col-sm-6 col-sm-offset-3 col-xs-12 ">


        <?
        $form = ActiveForm::begin();
        ?>


        <?= $form->field($model,'username'); ?>
        <?= $form->field($model,'email'); ?>
        <?= $form->field($model,'password')->passwordInput(); ?>
        <?= $form->field($model,'repassword')->passwordInput(); ?>




        <?= $form->field($model,'verifyCode')->widget(Captcha::className(),[
            'template'=>'<div class="row">
                            <div class="col-xs-3">
                            {image}
                            </div>
                            <div class="col-xs-6">
                             {input}
                            </div>
                        </div>',
            'captchaAction'=>Url::to(['/front/front/captcha'])
        ]); ?>

        <?=Html::submitButton('Register',['class'=>'btn btn-success']);?>


        <?
        ActiveForm::end();
        ?>


    </div>

</div>