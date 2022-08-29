<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kandidat".
 *
 * @property int $id
 * @property int $user_pemilih
 * @property string $nip_kpkl
 * @property string $nip_medis
 * @property string $nip_perawat
 * @property string $nip_umum
 * @property string $tgl
 */
class Kandidat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kandidat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_pemilih'], 'integer'],
            [['tgl'], 'safe'],
            [['nip_kpkl', 'nip_medis', 'nip_perawat', 'nip_umum'], 'string', 'max' => 100],
            [['nip_kpkl', 'nip_medis', 'nip_perawat', 'nip_umum'], 'required'],
            ['user_pemilih', 'unique', 'targetClass' => '\app\models\Kandidat', 'message' => 'Nama ini sudah memilih'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_pemilih' => 'User Pemilih',
            'nip_kpkl' => 'Nama Balon KPKL',
            'nip_medis' => 'Nama Balon Dokter/Medis',
            'nip_perawat' => 'Nama Balon Perawat',
            'nip_umum' => 'Nama Balon Umum',
            'tgl' => 'Tgl',
        ];
    }

    public function getTglsekarang()
    {
        $sql1 = "SELECT DATE_FORMAT(now(), '%Y-%m-%d') as tglsekarang";
        $tglsekarang=Yii::$app->db->createCommand($sql1)->queryScalar(); 
        return $tglsekarang;
    }
    public function getPegawaiMedis()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip_medis']);
    }
    public function getPegawaiKPKL()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip_kpkl']);
    }
    public function getPegawaiPerawat()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip_perawat']);
    }
    public function getPegawaiUmum()
    {
        return $this->hasOne(Pegawai::className(), ['nip' => 'nip_umum']);
    }
    /**
     * {@inheritdoc}
     * @return KandidatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new KandidatQuery(get_called_class());
    }
}
