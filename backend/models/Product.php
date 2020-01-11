<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $type
 * @property string|null $brand Название производителя
 * @property string $model Модель товара
 * @property int|null $status Неактивный/Активный товар
 * @property int $quantity Кол-во товара на складе
 * @property float $price Розничная цена
 * @property string|null $description Описание/Хар-ка товара
 * @property string|null $image Имя файла с изображением товара
 * @property string|null $created_date Дата создания
 *
 * @property Basket[] $baskets
 */
class Product extends \yii\db\ActiveRecord
{
    public $imageFile;
    
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'model', 'quantity', 'price'], 'required'],
            [['status', 'quantity'], 'integer'],
            [['status'], 'integer', 'max' => 1, 'min' => 0],
            [['quantity'], 'integer', 'max' => 999, 'min' => 0],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created_date'], 'safe'],
            [['type'], 'string', 'max' => 200],
            [['brand'], 'string', 'max' => 100],
            [['model'], 'string', 'max' => 25],
            [['image'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'brand' => 'Brand',
            'model' => 'Model',
            'status' => 'Status',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'description' => 'Description',
            'image' => 'Image',
            'created_date' => 'Created Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::className(), ['product_id' => 'id']);
    }
}
