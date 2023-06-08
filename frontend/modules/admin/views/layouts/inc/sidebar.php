<?php

use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Yii::$app->homeUrl ?>" class="brand-link" target="_blank">
        <img src="img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Grocery Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= Yii::$app->user->identity->username ?></a>
            </div>
            <div class="logout ml-auto">
                <a href="<?= Url::to(['auth/logout']) ?>" class="d-block">
                    <i class="fa fa-sign-out-alt"></i>
                </a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Основное меню
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fa fa-shopping-cart nav-icon"></i>
                                <p>
                                    Заказы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::to(['order/index']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список заказов</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::to(['order/create']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создать заказ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fa fa-cubes nav-icon"></i>
                                <p>
                                    Категории
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::to(['category/index']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список категорий</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::to(['category/create']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Создать категорию</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/" class="nav-link">
                                <i class="nav-icon fa fa-lightbulb nav-icon"></i>
                                <p>
                                    Товары
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= Url::to(['product/index']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список товаров</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= Url::to(['product/create']) ?>" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить товар</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= Url::to(['main/index']) ?>" class="nav-link">
                        <i class="far fa-chart-bar nav-icon"></i>
                        <p>Статистика магазина</p>
                    </a>
                </li>
<!--                <li class="nav-item">-->
<!--                    <a href="/" class="nav-link">-->
<!--                        <i class="nav-icon fas fa-th"></i>-->
<!--                        <p>-->
<!--                            Simple Link-->
<!--                            <span class="right badge badge-danger">New</span>-->
<!--                        </p>-->
<!--                    </a>-->
<!--                </li>-->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>