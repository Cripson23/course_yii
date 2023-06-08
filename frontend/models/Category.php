<?php

namespace frontend\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
* @property int $id
* @property int parent_id
* @property string title
 * @property string keywords
 * @property string description
 *
 * @property Category $parent
 */

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function getBreadCrumbData(): array
    {
        $result = [];
        $parent = $this;
        while ($parent) {
            $result[] = ['id' => $parent->id, 'title' => $parent->title];
            $parent = $parent->parent;
        }
        return array_reverse($result);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }
}