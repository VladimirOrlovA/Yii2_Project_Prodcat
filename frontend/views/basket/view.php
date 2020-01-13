<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

use frontend\models\Basket;

use yii\grid\GridView;

//use frontend\models\Basket;

/* @var $this yii\web\View */
/* @var $model frontend\models\Basket */

//$this->title = $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Baskets', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
//\yii\web\YiiAsset::register($this);
?>
<div >

<?php 
    //var_dump($model);
    echo '<br>';
    
//    foreach($model as $item){
//        echo $item->product->brand;
//        echo DetailView::widget([
//        'model' => $item,
//        'attributes' => [
//            'id',
//            'product.type',
//            'product.brand',
//            'product.model',
//            'product.status',
//            'product.quantity',
//            'product.price',
//            'product.description:ntext',
//            'product.image',
//            'product.created_date',
//        ],
//            ]);
//    }
?>

 <?php   
    $userId = Yii::$app->user->id;
    $dataProvider = new ActiveDataProvider([
    'query' => Basket::find()
            ->leftJoin('product', 'product.id = basket.product_id')
            ->where(['basket.user_id' => $userId]),
//            ->all(),
//    'pagination' => [
//        'pageSize' => 2,
//    ],
]);

echo GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'product.type',
            'product.brand',
            'product.model',
            'product.status',
            'product.quantity',
            'product.price',
            'product.description:ntext',
            'product.image',
            'product.created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
