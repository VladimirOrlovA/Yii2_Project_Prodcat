<?php

?>


<div class="col-lg-12" style="border: 1px solid red; border-radius: 10px; margin:10px;">

    <div style="height:100px;">
        <h2><?=$product->model?></h2>
    </div>

    <div style="height:150px;">
        <p><?=$product->description ?></p>
    </div>

    <div style="height:50px;">
        <h2><?=substr($product->price, 0, strpos($product->price, '.'))?>тг</h2>
    </div>
    
    <div style="width:200px; height:200px;">
        <img src="C:\OSPanel\domains\prodcat\public_html\uploads\images\MSIthin15.jpg" alt="" width="200" height="200">
    </div>
    
    <p><a class="btn btn-default" href="http://admin.prodcat.com/index.php/product/update?id=<?=$item->id?>">Добавить в корзину&raquo;</a></p>
</div>
