<?php

/* @var $this yii\web\View */

$this->title = 'Frontend';
?>
<div class="site-index">

    <?php 
    
    // получить 'id' текущего пользователя
    //echo Yii::$app->user->id; 
    // получить 'username' текущего пользователя
    //echo yii::$app->user->identity->username;
    
    $userId = Yii::$app->user->id;
    $username = yii::$app->user->identity->username;
    $login = 'show';
    $logout = 'hidden';
    ?>

    <div class="jumbotron <?php echo $class = $userId ? $logout : $login; ?>">
        <h1>Интернет магазин</h1>

        <p class="lead">Цены ниже конкурентов на 20%, на всю технику полная гарантия 2 года! <br> Только для своих!</p>

        <p><a class="btn btn-lg btn-success" href="http://prodcat.com/index.php/site/signup">Стать своим!!!</a>
            <br><br><a class="btn btn-lg btn-success" href="http://prodcat.com/index.php/site/login">Да свой я!..., короче наш :) , открывай давай!!!</a></p>
    </div>

    <?php if(!Yii::$app->user->isGuest): ?>
    <div>
        <?= "I am login"?>
    </div>
    <?php endif; ?>
    <div class="jumbotron <?php echo $class = $userId ? $login : $logout; ?>">
        <h1><?=$username?>, привет!</h1>

        <p class="lead"></p>

        <p><a class="btn btn-lg btn-success" href="http://prodcat.com/index.php/basket/index">Посмотреть закрома :)</a></p>
    </div>

    <div class="body-content">
        <div class="row">

            <?php // echo count($product); ?>
            <?php foreach($product as $item): ?>
            <div class="col-lg-3" style="border: 1px solid lime; border-radius: 10px; margin:10px;">

                <div style="height:100px;">
                    <h2><?=$item->model?></h2>
                </div>
                
                <div style="width:200px; height:200px">
                    <img src="http://admin.prodcat.com/index.php/product/get-image?file_name=<?=$item->image?>" alt="" style="width:200px">
                </div>

                <div style="height:150px;">
                    <p><?=substr($item->description, 0, 200)?></p>
                </div>

                <div style="height:70px;">
                    <h2><?=substr($item->price, 0, strpos($item->price, '.'))?>тг</h2>
                </div>

                <p><a class="btn btn-default" href="http://prodcat.com/index.php/product/one?id=<?=$item->id?>">Подробнее...&raquo;</a></p>
                <p><a class="btn btn-default" href="http://prodcat.com/index.php/product/one?id=<?=$item->id?>">Добавить в корзину&raquo;</a></p>
            </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>
