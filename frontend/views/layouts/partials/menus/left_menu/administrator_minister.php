<?php

use yii\helpers\Html;
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
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Structuri', ['ministere-structuri/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Instituții', ['institutie/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Servicii', ['ministere-servicii/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Excepții', ['ministere-exceptii/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Utilizatori', ['user/index-minister'], ['class' => 'nav-link']) ?>
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


