<?php


/* @var $this \yii\web\View */
/* @var $programari */
/* @var $data_export */

use common\models\StructuriSubordonatePuncteLucru;

?>
<?php if(count($programari) > 0):?>
<div style="width:100%;" class="table-flex">
    <div style="margin:10px 0;text-align: center; font-weight: bold;">
        Situația programărilor din data de <?= date('d-m-Y', strtotime($data_export));?>
        pentru <?= \common\models\User::findOne(Yii::$app->user->id)->fullName();?>
    </div>
    <table style="width:100%;">
        <thead style="width:100%;">
        <tr style="width:100%;margin:10px 0;display:flex;flex-direction: row; align-items: center;justify-content: center;">
            <th style="width: 4%;">Nr.</th>
            <th style="width: 22%;">Serviciul</th>
            <th style="width: 24%">Punct de lucru</th>
            <th>Nume</th>
            <th>Prenume</th>
            <th>Email</th>
            <th>Număr</th>
            <th>Orele</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($programari as $key => $programare) {
            echo '<tr style="margin:4px 0;display:flex;flex-direction: row; align-items: center;justify-content: center;">
                    <td>'.($key+1).'</td>
                    <td>'.$programare->serviciu->tip_serviciu_denumire.'</td>
                    <td>'. StructuriSubordonatePuncteLucru::findOne($programare->programare_punct_lucru)->getFullString().'</td>
                    <td>'.$programare->programare_nume.'</td>
                    <td>'.$programare->programare_prenume.'</td>
                    <td>'.$programare->programare_email.'</td>
                    <td>'.$programare->programare_numar_unic.'</td>
                    <td>'.date('h:i', strtotime($programare->programare_datetime)).'</td>
                </tr>';
        }

        ?>
        </tbody>
    </table>
</div>
<?php endif;?>

<?php if(count($programari) == 0):?>
    <div style="text-align: center; font-weight: bold; color: red;">Nu aveți programări în lucru pentru data de <?= date('d-m-Y', strtotime($data_export));?></div>
<?php endif;?>