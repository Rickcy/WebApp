
<?
use frontend\widgets\Login;
use frontend\widgets\SubscribeWidget;
?>
<?
if(Yii::$app->user->isGuest) {
    echo Login::widget();
}
?>
<div class="footer">

    <div class="container">



        <div class="row">
            <div class="col-lg-3 col-sm-3">
                <h4>Information</h4>
                <ul class="row">
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="about.html" >About</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="agents.html" >Agents</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="blog.html" >Blog</a></li>
                    <li class="col-lg-12 col-sm-12 col-xs-3"><a href="contact.html" >Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Newsletter</h4>
                <p>Get notified about the latest properties in our marketplace.</p>

                <? echo SubscribeWidget::widget() ?>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Follow us</h4>
                <a href="#"><img src="/images/facebook.png"  alt="facebook"></a>
                <a href="#"><img src="/images/twitter.png"  alt="twitter"></a>
                <a href="#"><img src="/images/linkedin.png"  alt="linkedin"></a>
                <a href="#"><img src="/images/instagram.png"  alt="instagram"></a>
            </div>

            <div class="col-lg-3 col-sm-3">
                <h4>Contact us</h4>
                
                    <span class="glyphicon glyphicon-map-marker"></span> Barnaul, Russia <br>
                    <span class="glyphicon glyphicon-envelope"></span> kuden.and.ko@gmail.com<br>

            </div>
        </div>
        <p class="copyright">Copyright 2016. All rights reserved.	</p>


    </div></div>