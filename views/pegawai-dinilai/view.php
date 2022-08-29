<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PegawaiDinilai */
?>
<div class="pegawai-dinilai-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'nip',
            'jabatan',
            'rumpun',
        ],
    ]) ?>

</div>
