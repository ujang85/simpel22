<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Penilaian]].
 *
 * @see Penilaian
 */
class PenilaianQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Penilaian[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Penilaian|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
