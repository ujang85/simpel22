<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User2 */
?>
<div class="user2-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
           
            'username',
           
          //  'dataakses.akses',
           // 'dataunit.nama_unit',
        ],
    ]) ?>

</div>
