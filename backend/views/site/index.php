<?php

/* @var $this yii\web\View */

$this->title = 'Backend';

var_dump(Yii::getAlias('@images'));

?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Интернет магазин</h1>

        <p class="lead">Страница администратора</p>

        <p><a class="btn btn-lg btn-success" href="http://admin.prodcat.com/index.php/product/create">Добавить товар</a></p>
    </div>

    <div class="body-content">

        <div class="row">
           
           <?php foreach($product as $item): ?>
           <div class="col-lg-3">
                <h2><?=$item->model?></h2>

                <p><?=$item->description?></p>

                <p><a class="btn btn-default" href="http://admin.prodcat.com/index.php/product/update?id=<?=$item->id?>">Обновить товар &raquo;</a></p>
            </div>
           <?php endforeach; ?>
            
    </div>
</div>
