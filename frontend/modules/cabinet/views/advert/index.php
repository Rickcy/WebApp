<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\AdvertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Adverts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="advert-index">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Advert', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'price',
            'address',
            
            'bedroom',
             'livingroom',
             'parking',
             'kitchen',
            // 'general_image',
            // 'description:ntext',
            // 'location',
            // 'hot',
            // 'sold',
            // 'type',
            // 'recomend',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
