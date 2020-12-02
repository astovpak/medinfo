<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "grls".
 *
 * @property int $id
 * @property string|null $torg_name
 * @property string|null $mnn
 * @property string|null $form
 * @property string|null $manufacture
 * @property string|null $country
 */
class Grls extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'grls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['torg_name', 'mnn', 'form', 'manufacture'], 'string', 'max' => 255],
            [['country'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'torg_name' => 'Torg Name',
            'mnn' => 'Mnn',
            'form' => 'Form',
            'manufacture' => 'Manufacture',
            'country' => 'Country',
        ];
    }
}
