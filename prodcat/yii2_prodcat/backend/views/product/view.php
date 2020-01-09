<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'type',
            'brand',
            'model',
            'status',
            'quantity',
            'price',
            'description:ntext',
            'image',
            'created_date',
        ],
    ]) ?>
    
    <div>
        <img src="C:\OSPanel\domains\prodcat\public_html\uploads\images\MSIthin15.jpg" alt="Изображения нет" style="width:100px">
    </div>
    <img src="C:\OSPanel\domains\prodcat\public_html\uploads\images\MSIthin15.jpg" alt="" style="width:100px; heigth:100px">
</div>
