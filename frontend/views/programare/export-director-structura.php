<?php


/* @var $this \yii\web\View */
/* @var $datePuncteLucru */
/* @var $data_export */

use common\models\TipuriServiciu;

?>

<div style="margin:10px 0;text-align: center; font-weight: bold;">
    Situația programărilor din data de <?= date('d-m-Y', strtotime($data_export)); ?>
    pentru <?= \common\models\User::findOne(Yii::$app->user->id)->fullName(); ?>
</div>

<?php foreach ($datePuncteLucru as $punctLucru): ?>
    <div style="font-weight: bold; color: #2980b9; margin: 20px 0;text-align: center;">Listă programări
        la <?= $punctLucru['denumire_punct_lucru']; ?>
        pentru data de <?= $data_export; ?>
    </div>
    <div style="width: 100%;">
        <table style="width: 100%;">
            <thead style="width: 100%;">
            <tr style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center;">
                <th style="text-align:center;border: 1px solid #000;width: 7%;padding: 3px;margin: 0;">Nr. Crt</th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 20%;">Serviciul</th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 23%;">Prestare
                    solicitată
                </th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 5%;">Orele</th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 10%;">Nume</th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 15%;">Prenume</th>
                <th style="text-align:center;border: 1px solid #000;padding: 3px;margin: 0;width: 20%;">Lucrător</th>
            </tr>
            </thead>
            <tbody>
            <?php if (count($punctLucru['programari_punct_lucru']) > 0): ?>
                <?php foreach ($punctLucru['programari_punct_lucru'] as $key => $programare): ?>
                    <tr style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center;">
                        <td style="text-align:center;width: 7%;padding: 3px;margin: 0;">
                            <?= $key+1;?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 20%;">
                            <?= TipuriServiciu::findOne($programare->programare_serviciu)->tip_serviciu_denumire;?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 30%;">
                            <?= \common\models\Prestari::findOne($programare->programare_prestare)->denumire_p; ?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 5%;">
                            <?= date('h:i', strtotime($programare->programare_datetime));?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 10%;">
                            <?= $programare->programare_nume;?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 15%;">
                            <?= $programare->programare_prenume;?>
                        </td>
                        <td style="text-align:center;padding: 3px;margin: 0;width: 20%;">
                            <?= \common\models\User::findOne($programare->programare_lucrator) ? \common\models\User::findOne($programare->programare_lucrator)->fullName() : 'Nealocat';?>
                        </td>
                    </tr>

                <?php endforeach; ?>

            <?php endif; ?>

            <?php if (count($punctLucru['programari_punct_lucru']) === 0): ?>
                <tr style="width: 100%;display: flex;flex-direction: row;align-items: center;justify-content: center;justify-items: center;">
                    <td
                            colspan="7"
                            style="font-weight:bold; color: #00b44e; text-align:center;width: 100%;padding: 3px;margin: 0;">
                        Acest punct de lucru nu are programări în data de <?= date('d-m-Y', strtotime($data_export)); ?>
                    </td>
                </tr>
            <?php endif; ?>

            </tbody>
        </table>
    </div>
<?php endforeach; ?>
