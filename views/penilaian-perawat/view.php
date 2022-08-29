<?php

use yii\widgets\DetailView;
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Penilaian */
?>
<div class="penilaian-view">
 
 <br>
    <p>
        <?= Html::a('<i class="glyphicon glyphicon-plus">  Kembali</i>', ['index'],
                    ['title'=> 'Data Nilai','class'=>'btn btn-default']) ?>
    </p>
</br>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_pegawai',
            'id_penilai',
            'op_1',
            'op_2',
            'op_3',
            'op_4',
            'op_5',
            'op_6',
            'op_7',
            'ko_1',
            'ko_2',
            'ko_3',
            'ko_4',
            'ko_5',
            'ko_6',
            'ko_7',
            'ik_1',
            'ik_2',
            'ik_3',
            'kj_1',
            'kj_2',
            'kj_3',
            'kj_4',
            'kj_5',
            'tgl_input',
            'group',
            'total_op',
            'total_ko',
            'total_ik',
            'total_kj',
        ],
    ]) ?>

</div>
