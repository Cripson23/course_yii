<?php

namespace frontend\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 * @property Category $parentCategory
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['title'], 'required'],
            [['title', 'description', 'keywords'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'targetClass' => Product::class, 'targetAttribute' => ['id'],
                'when' => function($model) {
                    return $model->parent_id != 0;
                }
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Наименование',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
        ];
    }

    public function getParentCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }
}
