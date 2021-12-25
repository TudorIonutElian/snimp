<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Domiciliu;

/**
 * DomiciliuSearch represents the model behind the search form of `common\models\Domiciliu`.
 */
class DomiciliuSearch extends Domiciliu
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'domiciliu_user', 'domiciliu_regiune', 'domiciliu_judet', 'domiciliu_localitate', 'domiciliu_is_resedinta', 'domiciliu_status'], 'integer'],
            [['domiciliu_data_adaugarii'], 'safe'],
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
        $query = Domiciliu::find();

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
            'domiciliu_user' => $this->domiciliu_user,
            'domiciliu_regiune' => $this->domiciliu_regiune,
            'domiciliu_judet' => $this->domiciliu_judet,
            'domiciliu_localitate' => $this->domiciliu_localitate,
            'domiciliu_is_resedinta' => $this->domiciliu_is_resedinta,
            'domiciliu_status' => $this->domiciliu_status,
            'domiciliu_data_adaugarii' => $this->domiciliu_data_adaugarii,
        ]);

        return $dataProvider;
    }
}
