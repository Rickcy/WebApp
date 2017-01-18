<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Advert */

$this->title = 'Create Advert';
$this->params['breadcrumbs'][] = ['label' => 'Adverts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-create">

   

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
