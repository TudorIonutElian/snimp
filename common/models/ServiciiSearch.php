<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Servicii;

/**
 * ServiciiSearch represents the model behind the search form of `common\models\Servicii`.
 */
class ServiciiSearch extends Servicii
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'serviciu_denumire_s', 'serviciu_active_s'], 'integer'],
            [['serviciu_active_since_s', 'serviciu_until_s'], 'safe'],
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
        $query = Servicii::find();

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
            'serviciu_denumire_s' => $this->serviciu_denumire_s,
            'serviciu_active_s' => $this->serviciu_active_s,
            'serviciu_active_since_s' => $this->serviciu_active_since_s,
            'serviciu_until_s' => $this->serviciu_until_s,
        ]);

        return $dataProvider;
    }
}
