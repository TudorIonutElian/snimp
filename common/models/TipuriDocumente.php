<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipuri_documente".
 *
 * @property int $id
 * @property string $document_denumire
 * @property string $document_data_creare
 * @property string|null $document_data_radiere
 * @property int $document_status
 */
class TipuriDocumente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipuri_documente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['document_denumire'], 'required'],
            [['document_data_creare', 'document_data_radiere'], 'safe'],
            [['document_status'], 'integer'],
            [['document_denumire'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'document_denumire' => 'Document Denumire',
            'document_data_creare' => 'Document Data Creare',
            'document_data_radiere' => 'Document Data Radiere',
            'document_status' => 'Document Status',
        ];
    }
}
