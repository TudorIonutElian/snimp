<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Programare */

$this->title = 'Adaugă programare';
if(!Yii::$app->user->getIsGuest()){
    $this->params['breadcrumbs'][] = ['label' => 'Listă programări', 'url' => ['index']];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programare-create">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'localitatiJudet' => $localitatiJudet
    ]) ?>

</div>

<?php $this->registerJsFile("@web/js/plugins/views/programare/create.js"); ?>
