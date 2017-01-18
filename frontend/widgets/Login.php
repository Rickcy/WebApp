<?

namespace frontend\widgets;

use common\models\LoginForm;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Widget;
use yii\helpers\Url;
use yii\web\Response;

class Login extends Widget{

    public function run(){

        $model = new LoginForm();

        if($model->load(Yii::$app->request->post()) && $model->login()){
            Yii::$app->controller->redirect(Url::to(''));
        }

        return $this->render("login",['model' => $model]);
    }



}