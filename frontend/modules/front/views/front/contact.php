<?
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row contact">
    <div class="col-lg-6 col-sm-6 ">
        <?
        $form=ActiveForm::begin()
        ?>

        <?= $form->field($model,'name'); ?>
        <?= $form->field($model,'email'); ?>
        <?= $form->field($model,'subject'); ?>
        <?= $form->field($model,'body')->textarea(['rows'=>6]); ?>
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
        <?=Html::submitButton('Send Message',['class'=>'btn btn-success']);?>



        <?
            ActiveForm::end();
        ?>

    </div>

</div>