<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Kandidat]].
 *
 * @see Kandidat
 */
class KandidatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Kandidat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Kandidat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
