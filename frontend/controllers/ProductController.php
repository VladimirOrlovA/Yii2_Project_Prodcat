<?php
namespace frontend\controllers;

use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\web\Controller;
use common\models\LoginForm;

use backend\models\Product;


class ProductController extends Controller
{
   
    public function actionAll()
    {
        $product = Product::find()->andWhere(['status'=>1])->all();
        //$product = Product::find()->all();
        return $this->render('all', ['product' => $product]);
    }
    
    public function actionOne($id)
    {
        $product = Product::find()->andWhere(['id'=>$id])->one();
        //$product = Product::find()->all();
        return $this->render('one', ['product' => $product]);
    }
}
