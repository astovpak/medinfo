<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "apteki".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $site
 *
 * @property Catalog[] $catalogs
 */
class Apteki extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apteki';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'string', 'max' => 255],
            [['phone', 'email', 'site'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone' => 'Phone',
            'email' => 'Email',
            'site' => 'Site',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::className(), ['apteka_id' => 'id']);
    }
}
