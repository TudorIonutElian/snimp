<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Institutie;

/**
 * InstitutieSearch represents the model behind the search form of `common\models\Institutie`.
 */
class InstitutieSearch extends Institutie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'institutie_structura', 'institutie_localitate_id', 'institutie_status'], 'integer'],
            [['institutie_denumire', 'institutie_data_creare'], 'safe'],
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
        $query = Institutie::find();
        $query->where(['institutie_minister_id' => \Yii::$app->user->identity->minister_id]);

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
            'institutie_structura' => $this->institutie_structura,
            'institutie_localitate_id' => $this->institutie_localitate_id,
            'institutie_data_creare' => $this->institutie_data_creare,
            'institutie_status' => $this->institutie_status,
        ]);

        $query->andFilterWhere(['like', 'institutie_denumire', $this->institutie_denumire]);

        return $dataProvider;
    }
}
