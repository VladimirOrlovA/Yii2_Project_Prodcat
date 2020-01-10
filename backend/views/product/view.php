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
        <img src="C:\OSPanel\domains\Yii2_Project_Prodcat\uploads\images\products\Prod_Image_ID_1.jpg" alt="Изображения нет" style="height: 400px; width: 400px">
        <? echo \yii\helpers\Url::to(['prodcat/product/get-image', 'file_name' => $model->image]) ?>
    </div>

<?php echo "Информация о текущем пользователе - ".Yii::$app->user->id ?>
</div>
