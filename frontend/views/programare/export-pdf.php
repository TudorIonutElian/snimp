<?php

use kartik\date\DatePicker;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Export PDF';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="programare-update">
    <div class="container">
        <?php ActiveForm::begin(
            [
                'action' => ['programare/export-pdf'],
                'options' => ['method' => 'post']
            ]); ?>
        <div class="row my-2">
            <div class="col-4"></div>
            <div class="col-4">
                <?php

                echo '<label class="control-label">Selectați data pentru exportul programărilor</label>';
                echo DatePicker::widget([
                    'name' => 'data_export',
                    'type' => DatePicker::TYPE_COMPONENT_PREPEND,
                    'value' => date('d-m-Y'),
                    'pluginOptions' => [
                        'autoclose' => true,
                        'format' => 'dd-MM-yyyy',
                        'id' => 'data_export'
                    ]
                ]);

                ?>
            </div>
            <div class="col-4"></div>
        </div>

        <div class="row my-2">
            <div class="col-4"></div>
            <div class="col-4">
                <?= \yii\helpers\Html::submitButton(
                    '<i class="mr-2 fas fa-file-pdf"></i>Exportă programări PDF',
                    [
                        'id' => 'export_pdf',
                        'class' => 'btn btn-block btn-primary'
                    ]

                ) ?>
            </div>
            <div class="col-4"></div>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php $this->registerJsFile("@web/js/plugins/views/programare/export-pdf.js"); ?>
