<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class FormProgramare extends Model
{
    public $programare_localitate;
    public $programare_institutie;
    public $programare_serviciu;
    public $programare_prestare;
    public $programare_nume;
    public $programare_prenume;
    public $programare_email;
    public $programare_telefon;
    public $programare_user;
    public $programare_data;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [
                [
                    'programare_localitate',
                    'programare_institutie',
                    'programare_serviciu',
                    'programare_prestare'
                ],
                'required',
                'message' => 'Câmpul este obligatoriu'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }
}
