<?php

namespace frontend\modules\admin\controllers;

use frontend\modules\admin\models\Category;
use frontend\modules\admin\models\Order;
use frontend\modules\admin\models\Product;

class MainController extends AppAdminController
{
    public function actionIndex()
    {
        $orders = Order::find()->count();
        $products = Product::find()->count();
        $categories = Category::find()->count();
        return $this->render('index', compact('orders', 'products', 'categories'));
    }
}