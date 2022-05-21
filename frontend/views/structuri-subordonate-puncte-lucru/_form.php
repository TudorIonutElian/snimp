<?php

use common\models\InstitutiiStructuriSubordonate;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\StructuriSubordonatePuncteLucru */
/* @var $form yii\widgets\ActiveForm */
/* @var $structuriSubordonate */
?>

<div class="structuri-subordonate-puncte-lucru-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <?php if(Yii::$app->user->can('admin_institutie')):?>
            <div class="row row-actions">
                <div class="col-12 my-4 d-flex flex-row align-content-center justify-content-center">
                    <a href="#" class="btn btn-outline-success mx-1" id="adaugareInstitutieCurenta">Adaug pentru instituție</a>
                    <a href="#" class="btn btn-outline-danger mx-1" id="adaugareStructuraSubordonata">Adaug pentru o structură subordonată</a>
                </div>
            </div>
        <?php endif;?>


        <div class="row row-hidden row-structura-subordonata">
            <div class="col-12">
                <?= $form->field($model, 'structura_subordonata_id_sspl')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(
                            InstitutiiStructuriSubordonate::find()
                                ->where(['institutie_parinte_iss' => Yii::$app->user->identity->institutie_id])
                                ->select(['id_iss', 'institutie_denumire_iss'])
                                ->orderBy(['institutie_denumire_iss' => SORT_ASC])
                                ->all(),
                            'id_iss',
                            'institutie_denumire_iss'),
                    'language' => 'de',
                    'options' => ['placeholder' => 'Selectați institutia subordonata...'],
                    'pluginOptions' => [
                        'allowClear' => true
                    ],
                ]);
                ?>
            </div>

        </div>

        <div class="row">
            <div class="col-4">
                <?= $form->field($model, 'localitate_id_sspl')->widget(Select2::classname(), [
                    'data' => \yii\helpers\ArrayHelper::map(\common\models\Localitate::find()->limit(5)->all(), 'id', 'localitate_nume'),
                    'language' => 'ro',
                    'options' => ['placeholder' => 'Selectați localitatea punctului...'],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'language' => [
                            'errorLoading' => new JsExpression("function () { return 'Așteptare rezultate..'; }"),
                        ],
                        'ajax' => [
                            'url' => Url::to(['localitate/localitati-by-name']),
                            'dataType' => 'json',
                            'data' => new JsExpression('function(params) { return {q:params.term, id_regiune: $(\'#institutiistructurisubordonate-institutie_regiune_id_iss\').val()} }')
                        ],
                        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
                        'templateResult' => new JsExpression('function(city) { return city.text; }'),
                        'templateSelection' => new JsExpression('function (city) { return city.text; }'),
                    ],
                ]);
                ?>
            </div>
            <div class="col-4">
                <?= $form->field($model, 'strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-4">
                <?= $form->field($model, 'numar_strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <?= $form->field($model, 'bloc_strada_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'scara_bloc_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'etaj_bloc_sspl')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-3">
                <?= $form->field($model, 'apartament_sspl')->textInput(['maxlength' => true]) ?>
            </div>
        </div>


        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <div class="form-group">
                    <?= Html::submitButton('Salveaza Punctul de lucru', ['class' => 'btn btn-success btn-block']) ?>
                </div>
            </div>
            <div class="col-3"></div>
        </div>



    </div>


    <?php ActiveForm::end(); ?>

</div>

<?php $this->registerJsFile("@web/js/plugins/views/structuri-subordonate-puncte-lucru/form.js"); ?>
<?php $this->registerCssFile("@web/css/plugins/views/structuri-subordonate-puncte-lucru/form.css"); ?>

