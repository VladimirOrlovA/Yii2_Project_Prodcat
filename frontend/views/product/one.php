<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;
?>


<div class="col-lg-12" style="border: 1px solid red; border-radius: 10px; margin:10px;">

    <div style="height:100px;">
        <h2><?=$product->model?></h2>
    </div>

    <img src="http://admin.prodcat.com/index.php/product/get-image?file_name=<?=$product->image?>" alt="" style="width:400px;">
    <p><?=$product->description ?></p>

    <div style="height:50px;">
        <h2><?=substr($product->price, 0, strpos($product->price, '.'))?>тг</h2>
    </div>
    
    <?php $userId = Yii::$app->user->id; ?>
    <p><a class="btn btn-default" href="/basket/add?userId=<?=$userId?>&$productId=<?=$product->id?>">Добавить в корзину&raquo;</a></p>
    
    <?php  
        echo Yii::$app->user->id.' '.$product->id;
    ?>
</div>
