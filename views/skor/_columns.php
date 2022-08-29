<?php
use yii\helpers\Url;

return [
   [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
        'header' => 'NO',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nama',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'nip',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'rumpun',
    ],
    
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'total_op',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'total_ko',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'total_ik',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'total_kj',
     ],
     [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'subtotal',
     ],
   

];   