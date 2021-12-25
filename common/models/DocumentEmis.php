<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "document_emis".
 *
 * @property int $id
 * @property int $document_tip
 * @property int $document_user_id
 * @property string|null $document_daca_emitere
 * @property string|null $document_data_expirare
 * @property int|null $document_preluat
 * @property int|null $document_retras
 * @property int|null $document_status
 *
 * @property TipuriDocument $documentTip
 */
class DocumentEmis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'document_emis';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_tip', 'document_user_id'], 'required'],
            [['document_tip', 'document_user_id', 'document_preluat', 'document_retras', 'document_status'], 'integer'],
            [['document_daca_emitere', 'document_data_expirare'], 'safe'],
            [['document_tip'], 'exist', 'skipOnError' => true, 'targetClass' => TipuriDocument::className(), 'targetAttribute' => ['document_tip' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_tip' => 'Document Tip',
            'document_user_id' => 'Document User ID',
            'document_daca_emitere' => 'Document Daca Emitere',
            'document_data_expirare' => 'Document Data Expirare',
            'document_preluat' => 'Document Preluat',
            'document_retras' => 'Document Retras',
            'document_status' => 'Document Status',
        ];
    }

    /**
     * Gets query for [[DocumentTip]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentTip()
    {
        return $this->hasOne(TipuriDocument::className(), ['id' => 'document_tip']);
    }
}
