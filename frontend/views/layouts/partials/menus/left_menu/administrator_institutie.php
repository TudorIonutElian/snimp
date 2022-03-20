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
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Servicii', ['institutii-servicii/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Prestari', ['prestari/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Excepții', ['institutii-exceptii/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Sesizări', ['sesizare/index-institutie'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Utilizatori', ['user/index-institutie'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>
    </ul>
</nav>


