<?php


namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Lists;

class ListController extends Controller
{
    public function actionIndex()
    {
        $query = Lists::find();


        $lists = $query->orderBy('name')->all();

        return $this->render('index', [
            'lists' => $lists,
        ]);
    }
}