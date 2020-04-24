<?php


namespace app\controllers;

use app\models\TaskForm;
use yii\web\Controller;
use app\models\Lists;

class ListController extends Controller
{
    public function actionIndex()
    {
        $query = Lists::find();

        $taskList = $query->one();

        $model = new TaskForm();
        $model->tasks = $taskList->tasks;

        return $this->render('index', [
            'taskList' => $taskList,
            'model' => $model
        ]);
    }

}