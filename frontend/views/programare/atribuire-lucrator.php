<?php

use kartik\select2\Select2;

/** @var $lucratoriStructuraSubordonata */
/** @var $programare */

?>
    <div class="programare-programare atribuire">
        <div class="container">
            <div class="row my-2">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="text-center">Datele programării</div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Nume</div>
                        <div><?= $programare["programare_nume"]; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Prenume</div>
                        <div><?= $programare["programare_prenume"]; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Email</div>
                        <div><?= $programare["programare_email"]; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Serviciul</div>
                        <div><?= \common\models\TipuriServiciu::findOne($programare["programare_serviciu"])->tip_serviciu_denumire; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Activitate solicitată</div>
                        <div><?= \common\models\Prestari::findOne($programare["programare_prestare"])->denumire_p; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Punctul de lucru</div>
                        <div>
                            <?php
                            $punctLucru = \common\models\StructuriSubordonatePuncteLucru::findOne($programare["programare_punct_lucru"]);
                            $content = $punctLucru->localitate->localitate_nume . '-' . $punctLucru->strada_sspl . '-' . $punctLucru->numar_strada_sspl;
                            echo $content;
                            ?>
                        </div>
                    </div>

                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Număr unic</div>
                        <div><?= $programare->programare_numar_unic; ?></div>
                    </div>
                    <div class="programare-detalii">
                        <div class="font-weight-bold mr-2">Data și ora</div>
                        <div><?= date('Y-m-d h:i', strtotime($programare->programare_datetime)); ?></div>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row my-2">
                <div class="col-3"></div>
                <div class="col-6">
                    <i class="fas fa-user mr-1"></i>
                    <span>Selectați lucrătorul pentru atribuire programare</span>
                </div>
                <div class="col-3"></div>
            </div>
            <div class="row my-2">
                <div class="col-3"></div>
                <div class="col-6">

                    <?= Select2::widget([
                        'name' => 'state_2',
                        'value' => '',
                        'data' => \yii\helpers\ArrayHelper::map($lucratoriStructuraSubordonata, 'id', function ($model) {
                            // search for programari atribuite cu status 0
                            $programari_counter = \common\models\Programare::find()
                                ->where([
                                    'and',
                                    ['not', ['programare_numar_unic' => NULL]],
                                    ['programare_lucrator' => $model->id],
                                    ['programare_este_anulata' => 2]
                                ])
                                ->count();

                            return $model->prenume . ' ' . $model->nume.' - ('.$programari_counter.')';
                        }),
                        'options' => ['multiple' => false, 'placeholder' => 'Selectează lucrătorul ...']
                    ]); ?>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row my-2">
                <div class="col-3"></div>
                <div class="col-6">
                    <?= \yii\helpers\Html::a(
                        'Atribuire programare',
                        '#',
                        [
                            'id' => 'atribuire-programare',
                            'class' => 'btn btn-info btn-block',
                            'data-programare-id' => $programare->id
                        ]); ?>
                </div>
                <div class="col-3"></div>
            </div>
        </div>
    </div>

    <style>
        .programare-detalii {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: center;
        }
    </style>

<?php $this->registerJsFile("@web/js/plugins/views/programare/atribuire-lucrator.js"); ?>