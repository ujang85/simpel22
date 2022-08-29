<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Skor;

/**
 * This is the model class for table "skor".
 *
 * @property int $id
 * @property string $nama
 * @property string $nip
 * @property string $jabatan
 * @property string $rumpun
 * @property int $id_pegawai
 * @property string $total_op
 * @property string $total_ko
 * @property string $total_ik
 * @property string $total_kj
 * @property string $subtotal
 */
class SkorSearch extends Skor
{
    /**
     * {@inheritdoc}
     */

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai'], 'integer'],
            [['total_op', 'total_ko', 'total_ik', 'total_kj', 'subtotal'], 'number'],
            [['nama'], 'string', 'max' => 100],
            [['nip', 'rumpun'], 'string', 'max' => 50],
            [['jabatan'], 'string', 'max' => 150],
        ];
    }
public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Skor::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'nama' => $this->nama,
            'nip' => $this->nip,
            'jabatan' => $this->jabatan,
            'total_op' => $this->total_op,
            'total_ko' => $this->total_ko,
            'total_ik' => $this->total_ik,
            'total_kj' => $this->total_kj,
            'subtotal' => $this->subtotal,
        ]);
        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'rumpun', $this->rumpun]);

        return $dataProvider;
    }
}