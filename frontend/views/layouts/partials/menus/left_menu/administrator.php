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
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Regiuni', ['regiune/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Judete', ['judet/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Localitati', ['localitate/index'], ['class' => 'nav-link']) ?>
                </li>

                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Ministere', ['minister/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Structuri', ['structura/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Servicii', ['tipuri-serviciu/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Excepții', ['tipuri-exceptie/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Sesizări', ['sesizare/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Roluri', ['auth-item/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Permisiuni', ['auth-item-child/index'], ['class' => 'nav-link']) ?>
                </li>
                <li class="nav-item">
                    <?= Html::a('<i class="fas fa-list nav-icon"></i>Utilizatori', ['user/index'], ['class' => 'nav-link']) ?>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                    Configurator
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Programari</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Sesizari</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list nav-icon"></i>
                        <p>Exceptii</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-calendar-alt nav-icon"></i>
                        <p>Zile Libere</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-history nav-icon"></i>
                        <p>Program de lucru</p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>


