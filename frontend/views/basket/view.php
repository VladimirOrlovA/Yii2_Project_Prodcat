<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

use frontend\models\Basket;

use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Basket */
?>
<div >

 <?php   
    $userId = Yii::$app->user->id;
    $dataProvider = new ActiveDataProvider([
    'query' => Basket::find()
            ->leftJoin('product', 'product.id = basket.product_id')
            ->where(['basket.user_id' => $userId]),
    'pagination' => [
        'pageSize' => 5,
    ],
]);

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'product.type',
            'product.brand',
            'product.model',
            //'product.status',
            //'product.quantity',
            'product.price',
            'quantity',
            //'product.description:ntext',
            //'product.image',
            //'product.created_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
