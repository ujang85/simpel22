<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $id
 * @property string $nama
 * @property string $nip
 * @property string $jabatan
 * @property string $rumpun
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'string', 'max' => 100],
            [['status','nip', 'rumpun'], 'string', 'max' => 50],
            [['jabatan'], 'string', 'max' => 150],
            [['active'], 'integer'],
            [['status','nama', 'nip', 'jabatan', 'rumpun'], 'required',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'nip' => 'Nip',
            'jabatan' => 'Jabatan',
            'rumpun' => 'Rumpun',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PegawaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PegawaiQuery(get_called_class());
    }
}
