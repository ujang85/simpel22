<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pegawai */
?>
<div class="pegawai-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'nip',
            'jabatan',
            'rumpun',
            [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'status',
                'value' => function ($model) {
                    $data=$model->status;
                    if(is_null($data)||($data)==0)
                        {
                          //  return "Data kosong"; 
                          return $data;    
                        }else
                        {
                            return "Data kosong";                           
                        }
            }, 
            
        ], 

        [
        'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'active',
                'value' => function ($model) {
                    $data=$model->active;
                    if($data==1)
                        {
                            return "ACTIVE";    
                        }else
                        {
                            return "NON ACTIVE";                           
                        }
            }, 
            
     ],

        ],
    ]) ?>

</div>
