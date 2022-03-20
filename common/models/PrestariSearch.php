<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Prestari;

/**
 * PrestariSearch represents the model behind the search form of `common\models\Prestari`.
 */
class PrestariSearch extends Prestari
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institutie_id_p', 'serviciu_id_p', 'denumire_p', 'stare_p'], 'integer'],
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
        $query = Prestari::find();

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
            'institutie_id_p' => $this->institutie_id_p,
            'serviciu_id_p' => $this->serviciu_id_p,
            'denumire_p' => $this->denumire_p,
            'stare_p' => $this->stare_p,
        ]);

        return $dataProvider;
    }
}
