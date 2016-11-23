<?php


use yii\bootstrap\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\FrontAssets;


FrontAssets::register($this) ?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <?= Html::csrfMetaTags() ?>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>


<? if(Yii::$app->session->hasFlash('success')):?>
  <? $success = Yii::$app->session->getFlash('success') ?>
    <?=Alert::widget([
      'options' =>[
      'class'=>'alert-success'],
    'body'=>$success
  ])?>
<?endif?>


<?=$this->render("//common/head")?>


<?=$content ?>

<?=$this->render("//common/footer") ?>




<!-- Modal -->

<!-- /.modal -->


<?php $this->endBody() ?>
</body>
</html>



<?php $this->endPage() ?>