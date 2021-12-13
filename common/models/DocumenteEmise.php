<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "documente_emise".
 *
 * @property int $id
 * @property int $document_tip
 * @property int $document_user_id
 * @property string $document_data_emitere
 * @property string $document_data_expirare
 * @property int|null $document_preluat
 * @property int $document_retras
 * @property int $document_status
 */
class DocumenteEmise extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'documente_emise';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_tip', 'document_user_id'], 'required'],
            [['document_tip', 'document_user_id', 'document_preluat', 'document_retras', 'document_status'], 'integer'],
            [['document_data_emitere', 'document_data_expirare'], 'safe'],
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
            'document_data_emitere' => 'Document Data Emitere',
            'document_data_expirare' => 'Document Data Expirare',
            'document_preluat' => 'Document Preluat',
            'document_retras' => 'Document Retras',
            'document_status' => 'Document Status',
        ];
    }
}
