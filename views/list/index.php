<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/** @var \app\models\TaskList[] $taskLists */


$this->title = 'Task Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php foreach ($taskLists as $taskList): ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($taskList, 'tasks')->widget(MultipleInput::className(), [
            'min' => count($taskList->tasks),
            'max' => count($taskList->tasks),
            'addButtonPosition' => false,
            'columns' => [
                [
                    'name' => 'name',
                    'title' => 'Name'
                ],
                [
                    'name' => 'goal',
                    'title' => 'Goal',
                    'enableError' => true,
                    'options' => [
                        'class' => 'input-priority'
                    ]
                ]
            ]
        ])->label($taskList->name);
        ?>

        <?= $form->field($taskList, 'id')->hiddenInput()->label(false); ?>

        <div class="form-group">
            <a href="/web/list/update?id=<?= $taskList->id ?>">Update</a>
        </div>

        <?php ActiveForm::end(); ?>
    <?php endforeach; ?>

</div>
