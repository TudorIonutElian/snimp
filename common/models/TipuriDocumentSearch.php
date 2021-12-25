<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\TipuriDocument;

/**
 * TipuriDocumentSearch represents the model behind the search form of `common\models\TipuriDocument`.
 */
class TipuriDocumentSearch extends TipuriDocument
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'tip_document_active'], 'integer'],
            [['tip_document_denumire', 'tip_document_adaugare', 'tip_document_radiere'], 'safe'],
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
        $query = TipuriDocument::find();

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
            'tip_document_adaugare' => $this->tip_document_adaugare,
            'tip_document_radiere' => $this->tip_document_radiere,
            'tip_document_active' => $this->tip_document_active,
        ]);

        $query->andFilterWhere(['like', 'tip_document_denumire', $this->tip_document_denumire]);

        return $dataProvider;
    }
}
