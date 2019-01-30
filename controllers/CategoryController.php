<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Category;
use app\models\Product;
use yii\data\Pagination;
use Yii;

class CategoryController extends AppController {

    public function actionIndex(){
      $hits = Product::find()->where(['hit' => '1'])->limit(6)->all();
      $this->setMeta('ALMENI');
      //debug($hits);
      return $this->render('index', compact('hits'));
    }

    public function actionView($id){
      $category = Category::findOne($id);

      if (empty($category))
        throw new \yii\web\HttpException(404, 'Такой категории нет...');
//      $id = Yii::$app->request->get('id');
//      $products = Product::find()->where(['category_id' => $id])->all();

      $query = Product::find()->where(['category_id' => $id]);
      $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
      $products = $query->offset($pages->offset)->limit($pages->limit)->all();

      $this->setMeta('ALMENI | ' . $category->name, $category->keywords, $category->description);
      return $this->render('view', compact('products', 'pages', 'category'));
    }

    public function actionSearch(){
      $q = trim(Yii::$app->request->get('q'));
      $this->setMeta('ALMENI | Поиск: ' . $q);
      if (!$q)
          return $this->render('search');
      $query = Product::find()->where(['like', 'name', $q]);
      $pages = new Pagination(['totalCount' => $query->count(), 'pageSize' => 3, 'forcePageParam' => false, 'pageSizeParam' => false]);
      $products = $query->offset($pages->offset)->limit($pages->limit)->all();
      return $this->render('search', compact('products', 'pages', 'q'));
    }

}

 ?>
