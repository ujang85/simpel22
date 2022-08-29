<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Penilaian;

/**
 * PenilaianSearch represents the model behind the search form of `app\models\Penilaian`.
 */
class PenilaianSearch extends Penilaian
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_pegawai', 'id_penilai', 'op_1', 'op_2', 'op_3', 'op_4', 'op_5', 'op_6', 'op_7', 'ko_1', 'ko_2', 'ko_3', 'ko_4', 'ko_5', 'ko_6', 'ko_7', 'ik_1', 'ik_2', 'ik_3', 'kj_1', 'kj_2', 'kj_3', 'kj_4', 'kj_5', 'total_op', 'total_ko', 'total_ik', 'total_kj'], 'integer'],
            [['tgl_input', 'group2'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
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
        $query = Penilaian::find();

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
            'id_pegawai' => $this->id_pegawai,
            'id_penilai' => $this->id_penilai,
            'op_1' => $this->op_1,
            'op_2' => $this->op_2,
            'op_3' => $this->op_3,
            'op_4' => $this->op_4,
            'op_5' => $this->op_5,
            'op_6' => $this->op_6,
            'op_7' => $this->op_7,
            'ko_1' => $this->ko_1,
            'ko_2' => $this->ko_2,
            'ko_3' => $this->ko_3,
            'ko_4' => $this->ko_4,
            'ko_5' => $this->ko_5,
            'ko_6' => $this->ko_6,
            'ko_7' => $this->ko_7,
            'ik_1' => $this->ik_1,
            'ik_2' => $this->ik_2,
            'ik_3' => $this->ik_3,
            'kj_1' => $this->kj_1,
            'kj_2' => $this->kj_2,
            'kj_3' => $this->kj_3,
            'kj_4' => $this->kj_4,
            'kj_5' => $this->kj_5,
            'tgl_input' => $this->tgl_input,
            'total_op' => $this->total_op,
            'total_ko' => $this->total_ko,
            'total_ik' => $this->total_ik,
            'total_kj' => $this->total_kj,
        ]);

        $query->andFilterWhere(['like', 'group2', $this->group2]);

        return $dataProvider;
    }
}
