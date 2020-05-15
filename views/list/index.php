<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/** @var \app\models\TaskListForm $model */


$this->title = 'Task Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php foreach ($model as $mod): ?>
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($mod, 'tasks')->widget(MultipleInput::className(), [
            'min' => $mod['countTasks'],
            'max' => $mod['countTasks'],
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
        ])->label(false);
        ?>

        <?= $form->field($mod, 'listId')->hiddenInput()->label(false); ?>

        <?php ActiveForm::end(); ?>
    <?php endforeach; ?>

</div>
