<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tipuri_document".
 *
 * @property int $id
 * @property string $tip_document_denumire
 * @property string|null $tip_document_adaugare
 * @property string|null $tip_document_radiere
 * @property int|null $tip_document_active
 *
 * @property DocumentEmis[] $documentEmis
 */
class TipuriDocument extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipuri_document';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tip_document_denumire'], 'required'],
            [['tip_document_adaugare', 'tip_document_radiere'], 'safe'],
            [['tip_document_active'], 'integer'],
            [['tip_document_denumire'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tip_document_denumire' => 'Tip Document Denumire',
            'tip_document_adaugare' => 'Tip Document Adaugare',
            'tip_document_radiere' => 'Tip Document Radiere',
            'tip_document_active' => 'Tip Document Active',
        ];
    }

    /**
     * Gets query for [[DocumentEmis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentEmis()
    {
        return $this->hasMany(DocumentEmis::className(), ['document_tip' => 'id']);
    }
}
