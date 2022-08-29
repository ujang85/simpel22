<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rumpun".
 *
 * @property int $id
 * @property string $nama_rumpun
 */
class Rumpun extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rumpun';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_rumpun'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_rumpun' => 'Nama Rumpun',
        ];
    }

    /**
     * {@inheritdoc}
     * @return RumpunQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RumpunQuery(get_called_class());
    }
}
