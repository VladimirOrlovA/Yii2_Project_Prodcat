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

    <p><a class="btn btn-default" href="http://admin.prodcat.com/index.php/product/update?id=<?=$item->id?>">Добавить в корзину&raquo;</a></p>

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
        
    <?= $form->field($model, 'user_id')->textInput(['maxlength' => true, 'value' => $product->id]) ?>
    
    <?= $form->field($model, 'product_id')->textInput(['maxlength' => true, 'value' => '$product->id']) ?>
    
    <?= Html::submitButton('Добавить в корзину&raquo', ['class' => 'btn btn-success']) ?>
    <br><br>
    <?php ActiveForm::end(); ?>

</div>
