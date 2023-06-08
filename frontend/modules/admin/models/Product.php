<?php

namespace frontend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property string $content
 * @property float $price
 * @property float $old_price
 * @property string|null $description
 * @property string|null $keywords
 * @property string $img
 * @property int $is_offer
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
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
            [['category_id', 'title', 'content'], 'required'],
            [['category_id', 'is_offer'], 'integer'],
            [['content'], 'string'],
            [['price', 'old_price'], 'number'],
            [['title', 'description', 'keywords', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'title' => 'Наименование',
            'content' => 'Описание',
            'price' => 'Стоимость',
            'old_price' => 'Стоимость (без скидки)',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
            'img' => 'Изображение',
            'is_offer' => 'Is Offer',
        ];
    }
}
