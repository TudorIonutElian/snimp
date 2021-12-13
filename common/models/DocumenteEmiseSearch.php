<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DocumenteEmise;

/**
 * DocumenteEmiseSearch represents the model behind the search form of `common\models\DocumenteEmise`.
 */
class DocumenteEmiseSearch extends DocumenteEmise
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'document_tip', 'document_user_id', 'document_preluat', 'document_retras', 'document_status'], 'integer'],
            [['document_data_emitere', 'document_data_expirare'], 'safe'],
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
        $query = DocumenteEmise::find();

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
            'document_tip' => $this->document_tip,
            'document_user_id' => $this->document_user_id,
            'document_data_emitere' => $this->document_data_emitere,
            'document_data_expirare' => $this->document_data_expirare,
            'document_preluat' => $this->document_preluat,
            'document_retras' => $this->document_retras,
            'document_status' => $this->document_status,
        ]);

        return $dataProvider;
    }
}
