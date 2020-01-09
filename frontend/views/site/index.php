<?php

/* @var $this yii\web\View */

$this->title = 'Frontend';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Интернет магазин</h1>

        <p class="lead">Цены ниже конкурентов на 20%, на всю технику полная гарантия 2 года! <br> Только для своих!</p>

        <p><a class="btn btn-lg btn-success" href="http://prodcat.com/index.php/site/signup">Стать своим!!!</a></p>
    </div>

    <div class="body-content">
        
        <div class="row">
           
           <?php // echo count($product); ?>
           <?php foreach($product as $item): ?>
           <div class="col-lg-3" style="border: 1px solid lime; border-radius: 10px; margin:10px;">
                
                <div style="height:100px;">
                <h2><?=$item->model?></h2>
                </div>
                
                <div style="height:150px;">
                <p><?=substr($item->description, 0, 200)?></p>
                </div>
                
                <div>
                <img src="..\..\backend\web\uploads\images\<?=$item->image?>" alt="Изображения нет <?=$item->image?>" style="width:200px">
                </div>
                
                <div style="height:50px;">
                <h2><?=substr($item->price, 0, strpos($item->price, '.'))?>тг</h2>
                </div>
                
                <p><a class="btn btn-default" href="http://admin.prodcat.com/index.php/product/update?id=<?=$item->id?>">Подробнее...&raquo;</a></p>
            </div>
           <?php endforeach; ?>
            
        </div>
    </div>
</div>
