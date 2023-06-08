<?php

namespace frontend\modules\admin\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property string $created_at
 * @property string $updated_at
 * @property int $qty
 * @property float $total
 * @property int $status
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property Product[] $orderProducts
 * @property string|null $note
 */
class Order extends \yii\db\ActiveRecord
{
    const STATUS_PROCESSED = 1;
    const STATUS_NOT_PROCESSED = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // если вместо метки времени UNIX используется datetime:
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['qty', 'name', 'email', 'phone', 'address'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['qty', 'status'], 'integer'],
            [['total'], 'number'],
            [['note'], 'string'],
            [['name', 'email', 'phone', 'address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Создано',
            'updated_at' => 'Обновлено',
            'qty' => 'Количество',
            'total' => 'Сумма',
            'status' => 'Статус',
            'name' => 'Имя клиента',
            'email' => 'Email',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'note' => 'Примечание',
        ];
    }

    /**
     * Gets statuses list.
     * @return array
     */
    public static function getListStatuses($asHtml = false)
    {
        return [
            self::STATUS_PROCESSED => $asHtml ? ('<span class="text-green">' . Yii::t('app', 'Завершен') . '</span>')
                : Yii::t('app', 'Завершен'),
            self::STATUS_NOT_PROCESSED => $asHtml ? ('<span class="text-red">' . Yii::t('app', 'Новый') . '</span>')
                : Yii::t('app', 'Новый'),
        ];
    }

    /**
     * Gets query for [[OrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        //return $this->hasMany(Product::class, ['id' => 'product_id'])->viaTable('order_product', ['order_id' => 'id']);
        return $this->hasMany(OrderProduct::class, ['order_id' => 'id']);
    }
}
