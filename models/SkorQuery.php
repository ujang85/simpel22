<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Skor]].
 *
 * @see Skor
 */
class SkorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Skor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Skor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
