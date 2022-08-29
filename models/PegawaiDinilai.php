<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pegawai_dinilai".
 *
 * @property int $id
 * @property string $nama
 * @property string $nip
 * @property string $jabatan
 * @property string $rumpun
 */
class PegawaiDinilai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai_dinilai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
        //    [['rumpun'], 'integer'],
            [['nama','rumpun'], 'string', 'max' => 100],
            [['nip'], 'string', 'max' => 50],
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
        ];
    }

    public function beforeDelete()
{
	$sql1="SELECT id from pegawai_dinilai";
	$idpegawai=Yii::$app->db->createCommand($sql1)->queryScalar();
    if (!parent::beforeDelete()) {
        return false;
    }

    // ...custom code here...
    return true;
}


    /**
     * {@inheritdoc}
     * @return PegawaiDinilaiQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PegawaiDinilaiQuery(get_called_class());
    }
}
