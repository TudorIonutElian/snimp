<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TipuriProgramLucru;

/**
 * TipuriProgramLucruSearch represents the model behind the search form of `common\models\TipuriProgramLucru`.
 */
class TipuriProgramLucruSearch extends TipuriProgramLucru
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tpl_is_active'], 'integer'],
            [['tpl_ora_start', 'tpl_ora_sfarsit'], 'safe'],
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
        $query = TipuriProgramLucru::find();

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
            'tpl_is_active' => $this->tpl_is_active,
        ]);

        $query->andFilterWhere(['like', 'tpl_ora_start', $this->tpl_ora_start])
            ->andFilterWhere(['like', 'tpl_ora_sfarsit', $this->tpl_ora_sfarsit]);

        return $dataProvider;
    }
}
