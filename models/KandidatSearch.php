<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kandidat;

/**
 * KandidatSearch represents the model behind the search form of `app\models\Kandidat`.
 */
class KandidatSearch extends Kandidat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_pemilih'], 'integer'],
            [['nip_kpkl', 'nip_medis', 'nip_perawat', 'nip_umum', 'tgl'], 'safe'],
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
        $query = Kandidat::find();

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
            'user_pemilih' => $this->user_pemilih,
            'tgl' => $this->tgl,
        ]);

        $query->andFilterWhere(['like', 'nip_kpkl', $this->nip_kpkl])
            ->andFilterWhere(['like', 'nip_medis', $this->nip_medis])
            ->andFilterWhere(['like', 'nip_perawat', $this->nip_perawat])
            ->andFilterWhere(['like', 'nip_umum', $this->nip_umum]);

        return $dataProvider;
    }
}
