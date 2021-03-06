<?php

namespace app\controllers;

use app\models\TaskListForm;
use Yii;
use app\models\TaskList;
use app\models\TaskListSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TaskListController implements the CRUD actions for TaskList model.
 */
class ListController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TaskList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $taskLists = TaskList::find()->all();

        return $this->render('index', [
            'taskLists' => $taskLists,
        ]);
    }

    /**
     * Displays a single TaskList model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */


    /**
     * Creates a new TaskList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TaskList();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $id = $model->getPrimaryKey();
            $model = new TaskListForm();
            $model->listId = $id;
            return $this->render('addtasks', [
                'model' => $model,
                'id' => $id,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TaskList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $taskList = TaskList::find()->where(['id' => $id])->one();

        $model = new TaskListForm();
        $model->tasks = $taskList->tasks;
        $model->listId = $taskList->id;

        return $this->render('tasks', [
            'model' => $model,
        ]);
    }

    public function actionSave()
    {
        $model = new TaskListForm();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

//        Yii::$app->session->addFlash('error', 'Error');
//        return $this->redirect(['index']);
        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing TaskList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TaskList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TaskList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TaskList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
