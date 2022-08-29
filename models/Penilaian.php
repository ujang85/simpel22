<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian".
 *
 * @property int $id
 * @property int $id_pegawai
 * @property int $id_penilai
 * @property int $op_1
 * @property int $op_2
 * @property int $op_3
 * @property int $op_4
 * @property int $op_5
 * @property int $op_6
 * @property int $op_7
 * @property int $ko_1
 * @property int $ko_2
 * @property int $ko_3
 * @property int $ko_4
 * @property int $ko_5
 * @property int $ko_6
 * @property int $ko_7
 * @property int $ik_1
 * @property int $ik_2
 * @property int $ik_3
 * @property int $kj_1
 * @property int $kj_2
 * @property int $kj_3
 * @property int $kj_4
 * @property int $kj_5
 * @property string $tgl_input
 * @property string $group
 * @property int $total_op
 * @property int $total_ko
 * @property int $total_ik
 * @property int $total_kj
 */
class Penilaian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'penilaian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pegawai', 'id_penilai', 'op_1', 'op_2', 'op_3', 'op_4', 'op_5', 'op_6', 'op_7', 'ko_1', 'ko_2', 'ko_3', 'ko_4', 'ko_5', 'ko_6', 'ko_7', 'ik_1', 'ik_2', 'ik_3', 'kj_1', 'kj_2', 'kj_3', 'kj_4', 'kj_5', 'total_op', 'total_ko', 'total_ik', 'total_kj', 'subtotal'], 'integer'],
            [['id_pegawai', 'id_penilai', 'op_1', 'op_2', 'op_3', 'op_4', 'op_5', 'op_6', 'op_7', 'ko_1', 'ko_2', 'ko_3', 'ko_4', 'ko_5', 'ko_6', 'ko_7', 'ik_1', 'ik_2', 'ik_3', 'kj_1', 'kj_2', 'kj_3', 'kj_4', 'kj_5','total_op', 'total_ko', 'total_ik', 'total_kj', 'subtotal'], 'required','message' =>'harus diisi boss..!'],
            [['tgl_input'], 'safe'],
            [['group2'], 'string', 'max' => 50],
        ];
        //,'id_penilai', 'total_op', 'total_ko', 'total_ik', 'total_kj'
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pegawai' => 'Nama Pegawai',
            'id_penilai' => 'Tim Penilai',
            'op_1' => 'Pemahaman tugas pokok dan penjabarannya',
            'op_2' => 'kecepatan dan ketelitian dalam penyelesaian pekerjaan',
            'op_3' => 'penyelesaian permasalahan dalam melaksanakan tugas',
            'op_4' => 'pelayanan terhadap pihak lain sesuai bidang tugasnya',
            'op_5' => 'keinginan untuk meningkatkan kemampuan/ kemauan untuk belajar',
            'op_6' => 'kesesuaian hasil pekerjaan dengan perintah atasan',
            'op_7' => 'penyusunan laporan secara tepat, cepat dan lengkap',
            'ko_1' => 'ketaatan terhadap peraturan perundang-undangan dan tidak menyalahgunakan wewenang',
            'ko_2' => 'ketaatan terhadap tugas kedinasan',
            'ko_3' => 'penggunaan sarana dan prasarana kantor untuk kepentingan dinas',
            'ko_4' => 'ketaatan dalam berpakaian dinas',
            'ko_5' => 'kesopanan dan kerapian dalam berpakaian',
            'ko_6' => 'kesopanan dalam berperilaku dan bertutur kata',
            'ko_7' => 'tingkat kebenaran laporan pelaksanaan tugas',
            'ik_1' => 'inisiatif dalam melaksanakan tugas',
            'ik_2' => 'penyampaian saran yang bermanfaat',
            'ik_3' => 'inovasi yang mendukung tugas instansi',
            'kj_1' => 'kesediaan bekerja sama dengan orang lain',
            'kj_2' => 'kesediaan membantu memecahkan masalah tugas teman sejawat',
            'kj_3' => 'tingkat toleransi terhadap perbedaan pendapat',
            'kj_4' => 'konsistensi terhadap hasil kesepakatan',
            'kj_5' => 'kesediaan menerima kritik dari orang lain',
            'tgl_input' => 'Tgl Input',
            'group2' => 'Rumpun',
            'total_op' => 'Total Orientasi Pelayanan',
            'total_ko' => 'Total Komitmen',
            'total_ik' => 'Total Inisiatif Kerja',
            'total_kj' => 'Total Kerjasama',
            'subtotal' => 'SubTotal',
        ];
    }
    public function getTglsekarang()
    {
        $sql1 = "SELECT DATE_FORMAT(now(), '%Y-%m-%d') as tglsekarang";
        $tglsekarang=Yii::$app->db->createCommand($sql1)->queryScalar(); 
        return $tglsekarang;
    }
    public function getPenilai()
    {
        return $this->hasOne(User::className(), ['id' => 'id_penilai']);
    }
    public function getPegawai()
    {
        return $this->hasOne(PegawaiDinilai::className(), ['id' => 'id_pegawai']);
    }
    /**
     * {@inheritdoc}
     * @return PenilaianQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PenilaianQuery(get_called_class());
    }
}
