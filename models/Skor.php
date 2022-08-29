<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "skor".
 *
 * @property int $id
 * @property string $nama
 * @property string $nip
 * @property string $jabatan
 * @property string $rumpun
 * @property int $id_pegawai
 * @property string $total_op
 * @property string $total_ko
 * @property string $total_ik
 * @property string $total_kj
 * @property string $subtotal
 */
class Skor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'skor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai'], 'integer'],
            [['total_op', 'total_ko', 'total_ik', 'total_kj', 'subtotal'], 'number'],
            [['nama'], 'string', 'max' => 100],
            [['nip', 'rumpun'], 'string', 'max' => 50],
            [['jabatan'], 'string', 'max' => 150],
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
            'id_pegawai' => 'Id Pegawai',
            'total_op' => 'Orientasi Pelayanan',
            'total_ko' => 'Komitmen',
            'total_ik' => 'Inisiatif Kerja',
            'total_kj' => 'Kerjasama',
            'subtotal' => 'Subtotal',
        ];
    }

    /**
     * {@inheritdoc}
     * @return SkorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SkorQuery(get_called_class());
    }
}
