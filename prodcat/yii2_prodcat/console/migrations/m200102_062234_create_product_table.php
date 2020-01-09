<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m200102_062234_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'type' => $this->string(200)->notNull(),
            'brand' => $this->string(100)->defaultValue('Noname')->comment('Название производителя'),
            'model' => $this->string(25)->notNull()->comment('Модель товара'),
            'status'=> $this->smallInteger()->defaultValue(1)->comment('Неактивный/Активный товар'),
            'quantity' => $this->integer()->notNull()->comment('Кол-во товара на складе'),
            'price' => $this->money()->notNull()->comment('Розничная цена'),
            'description'=> $this->text()->comment('Описание/Хар-ка товара'),
            'image' => $this->string(10)->comment('Имя файла с изображением товара'),
            'created_date' => $this->timestamp()->comment('Дата создания'),
        ]); 
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
