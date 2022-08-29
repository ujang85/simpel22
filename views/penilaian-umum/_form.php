<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use buttflattery\formwizard\FormWizard;
use yii\helpers\ArrayHelper;
use app\models\PegawaiDinilai;
/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="penilaian-form">

    
<?php
   echo FormWizard::widget([ 
    'steps' => [
        [
            'model' => $model,
            'title' => 'Orientasi Pelayanan',
            'description' => 'Indikator Penilaian Orientasi Pelayanan',
            'formInfoText' => 'Isikan Data Indikator Penilaian Orientasi Pelayanan ',
            'fieldConfig' => [ 
                'only' => ['id_pegawai', 'op_1', 'op_2','op_3','op_4','op_5','op_6','op_7'],
                'id_pegawai' => [
                        'options' => [
                            'type' => 'dropdown',
                            'itemsList' => ArrayHelper::map(PegawaiDinilai::findBySql('SELECT * FROM pegawai_dinilai WHERE rumpun="UMUM" ')->all(),'id','nama'),
                           // 'prompt' => 'Silakan Pilih Nama Pegawai',
                        ]    //map(Pegawai::findBySql('SELECT * FROM pegawai WHERE status=2')->all(),'id','nama_pegawai'),
                    ],

            ]
        ],
       [
            'model' => $model,
            'title' => 'Komitmen',
            'description' => 'Indikator Penilaian Komitmen',
            'formInfoText' => 'Isikan Data Indikator Penilaian Orientasi Pelayanan',
            'fieldConfig' => [
                'only' => ['ko_1', 'ko_2','ko_3','ko_4','ko_5','ko_6','ko_7'], 
            ]
        ],
         [
            'model' => $model,
            'title' => 'Inisiatif Kerja',
            'description' => 'Indikator Penilaian Inisiatif Kerja',
            'formInfoText' => 'Isikan Data Indikator Penilaian Inisiatif Kerja',
            'fieldConfig' => [
                'only' => ['ik_1', 'ik_2','ik_3'], 
            ]
        ],
       [
            'model' => $model,
            'title' => 'Kerjasama',
            'description' => 'Indikator Penilaian Kerjasama',
            'formInfoText' => 'Isikan Data Indikator Penilaian Kerjasama',
            'fieldConfig' => [
                'only' => ['kj_1', 'kj_2','kj_3','kj_4','kj_5'], 
            ]
        ],
     
    ]
]);
?>  
</div>  