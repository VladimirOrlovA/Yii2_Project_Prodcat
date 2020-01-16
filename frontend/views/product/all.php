<?php

?>

<div class="body-content">

    <div class="row">

        <?php // echo count($product); ?>
        <?php foreach ($product as $item) : ?>
        <div class="col-lg-5" style="border: 1px solid gray; border-radius: 10px; margin:10px;">

            <div style="height:35px;">
                <h2><?=$item->model?></h2>
            </div>
            
            <div style="height:300px;">
            <img src="http://admin.prodcat.com/index.php/product/get-image?file_name=<?=$item->image?>" alt="" style="width:300px;">
            </div>
            
            <div style="height:150px;">
                <p><?=substr($item->description, 0, 200)?></p>
            </div>

            <div style="height:50px;">
                <h2><?=substr($item->price, 0, strpos($item->price, '.'))?>тг</h2>
            </div>

            <p><a class="btn btn-default" href="http://prodcat.com/index.php/product/one?id=<?=$item->id?>">Подробнее...&raquo;</a></p>
            
            
            <p><a class="btn btn-default" href="http://prodcat.com/index.php/product/one?id=<?=$item->id?>">Добавить в корзину&raquo;</a></p>
            
        </div>
        <?php endforeach; ?>

    </div>
</div>
