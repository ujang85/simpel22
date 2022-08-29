<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[PegawaiDinilai]].
 *
 * @see PegawaiDinilai
 */
class PegawaiDinilaiQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return PegawaiDinilai[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return PegawaiDinilai|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
