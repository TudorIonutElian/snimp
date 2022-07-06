<?php

use yii\helpers\Html;

$puncteLucruSpreAprobare = \common\models\StructuriSubordonatePuncteLucru::find()
    ->where([
        'and',
        ['institutie_id_sspl' => Yii::$app->user->identity->institutie_id],
        ['aprobat_administrator_sspl' => 0]
    ])
    ->count();

$puncteLucruSpreSuspendare = \common\models\StructuriSubordonatePuncteLucru::find()
    ->where([
        'and',
        ['institutie_id_sspl' => Yii::$app->user->identity->institutie_id],
        ['aprobat_administrator_sspl' => 2]
    ])
    ->count();
?>
<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                    Nomenclator
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Servicii', ['institutii-servicii/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Prestari', ['prestari/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Excepții', ['institutii-exceptii/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Structuri subordonate', ['institutii-structuri-subordonate/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Utilizatori', ['user/index-institutie'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-map-marker"></i>
                <p>
                    Puncte lucru
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-plus nav-icon"></i>Adaugă', ['structuri-subordonate-puncte-lucru/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="far fa-bell-slash  nav-icon"></i>Suspendare ('.$puncteLucruSpreSuspendare.')', ['structuri-subordonate-puncte-lucru/propuneri-suspendare'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="far fa-bell  nav-icon"></i>Aprobare ('.$puncteLucruSpreAprobare.')', ['structuri-subordonate-puncte-lucru/propuneri-aprobare'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="index.php?r=programare" class="nav-link">
                <i class="fas fa-list-ul nav-icon"></i>
                <p>Programari</p>
            </a>
        </li>
        <li class="nav-item">
            <?= Html::a('<i class="fas fa-chart-area nav-icon"></i>Statistici', ['programare/statistici'], ['class' => 'nav-link']) ?>
        </li>
    </ul>
</nav>


