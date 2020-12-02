<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string|null $mnn
 * @property string|null $torg_name
 * @property string|null $manufacrure
 * @property string|null $form
 * @property int|null $price
 * @property int|null $apteka_id
 *
 * @property Apteki $apteka
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price', 'apteka_id'], 'integer'],
            [['mnn', 'torg_name', 'manufacture', 'form'], 'string', 'max' => 255],
            [['apteka_id'], 'exist', 'skipOnError' => true, 'targetClass' => Apteki::className(), 'targetAttribute' => ['apteka_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mnn' => 'Mnn',
            'torg_name' => 'Torg Name',
            'manufacture' => 'Manufacture',
            'form' => 'Form',
            'price' => 'Price',
            'apteka_id' => 'Apteka ID',
        ];
    }

    /**
     * Gets query for [[Apteka]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApteka()
    {
        return $this->hasOne(Apteki::className(), ['id' => 'apteka_id']);
    }
}
