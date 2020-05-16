<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/** @var \app\models\TaskListForm $model */

$this->title = 'Create Task List';
$this->params['breadcrumbs'][] = ['label' => 'Task Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
