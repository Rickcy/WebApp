
<?php
/* @var $model frontend\models\SignupForm */
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
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






        <?=Html::submitButton('Register',['class'=>'btn btn-success']);?>


        <?
        ActiveForm::end();
        ?>


    </div>

</div>