<?php
    use yii\helpers\Html;
?>


<div class="col-lg-12" style="border: 1px solid red; border-radius: 10px; margin:10px;">

    <div style="height:100px;">
        <h2><?=$product->model?></h2>
    </div>

      <img src="http://admin.prodcat.com/index.php/product/get-image?file_name=<?=$product->image?>" alt="" style="width:400px;">
   
    <div style="height:250px;">
        <p><?=$product->description ?></p>
    </div>

    <div style="height:50px;">
        <h2><?=substr($product->price, 0, strpos($product->price, '.'))?>тг</h2>
    </div>

    <p><a class="btn btn-default" href="http://admin.prodcat.com/index.php/product/update?id=<?=$item->id?>">Добавить в корзину&raquo;</a></p>
</div>
