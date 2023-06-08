<?php

namespace frontend\controllers;

use frontend\models\Category;
use frontend\models\Product;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends AppController
{
    public function actionView($id)
    {
        $category = Category::findOne($id);
        if (!$category) {
            throw new NotFoundHttpException("This category is not exists");
        }

        $this->setMeta("{$category->title} :: " . \Yii::$app->name, $category->keywords, $category->description);

        //$products = Product::find()->asArray()->where(['category_id' => $id])->all();

        $query = Product::find()->where(['category_id' => $id]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 4,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $crumbData = $category->getBreadCrumbData();
        return $this->render('view', [
            'category_title' => $category['title'],
            'products' => $products,
            'pages' => $pages,
            'crumbData' => $crumbData,
        ]);
    }

    public function actionSearch($q)
    {
        $q = trim($q);
        $this->setMeta("Search: {$q} :: " . \Yii::$app->name);
        if (!$q) {
            return $this->render('search', ['q' => 'Empty search']);
        }
        $query = Product::find()->where(['like', 'title', $q]);
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 2,
            'forcePageParam' => false,
            'pageSizeParam' => false,
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('search', [
            'q' => $q,
            'products' => $products,
            'pages' => $pages,
        ]);
    }
}