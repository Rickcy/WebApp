<?
use frontend\component\Common;
use yii\helpers\Html;
$this->title = 'All Advert';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="properties-listing spacer" >

    <div class="row">


        <div class="col-lg-9 col-sm-8">
            <div class="row">

                <?
                foreach($advert as $row):
                    $url = Common::getUrlAdvert($row);
                    ?>
                    <!-- properties -->
                    <div class="col-lg-4 col-sm-6">
                        <div class="properties">
                            <div class="image-holder"><img src="<?=Common::getImageAdvert($row)[0] ?>"  class="img-responsive" alt="properties">
                                <div class="status <?=($row['sold']) ? 'sold' : 'new' ?>"><?=Common::getType($row) ?></div>
                            </div>
                            <h4><a href="<?=$url ?>" ><?=Common::getTitleAdvert($row) ?></a></h4>
                            <p class="price">Price: $<?=$row['price'] ?></p>
                            <div class="listing-detail"><span data-toggle="tooltip" data-placement="bottom" data-original-title="Bed Room"><?=$row['bedroom'] ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Living Room"><?=$row['livingroom'] ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Parking"><?=$row['parking'] ?></span> <span data-toggle="tooltip" data-placement="bottom" data-original-title="Kitchen"><?=$row['kitchen'] ?></span> </div>
                            <a class="btn btn-primary" href="<?=$url ?>" >View Details</a>
                        </div>
                    </div>

                    <?
                endforeach;
                ?>
                <!-- properties -->


                <div class="clearfix"></div>
                <!-- properties -->
                <div class="center">
                    <? echo \yii\widgets\LinkPager::widget([
                        'pagination' => $pages
                    ]) ?>
                </div>

            </div>
        </div>
    </div>
</div>