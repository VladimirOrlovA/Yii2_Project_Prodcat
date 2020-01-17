<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%basket}}`.
 */
class m200102_125600_create_basket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%basket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull()->comment('ИН зарегистрированного пользователя'),
            'product_id' => $this->integer()->notNull()->comment('ИН товара из каталога'),
            'quantity' => $this->integer()->notNull()->comment('Кол-во товара'),
            'created_date' => $this->timestamp()->comment('Дата создания'),
        ]);
        
        $this->createIndex('basket-user_id-index', 'basket', 'user_id');
        $this->createIndex('basket-product_id-index', 'basket', 'product_id');
        
        $this->addForeignKey('basket-user_id-index', 'basket', 'user_id', 'user', 'id', 'RESTRICT', 'RESTRICT');

        $this->addForeignKey('basket-product_id-index', 'basket', 'product_id', 'product', 'id', 'CASCADE', 'CASCADE');
    }
    
    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%basket}}');
    }
}
