<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

/* @var $this yii\web\View */
/** @var \app\models\TaskList $model */

$this->title = 'Task Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Task List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php $form = ActiveForm::begin([
        'action' => ['save'],
    ]); ?>

    <?= $form->field($model, 'tasks')->widget(MultipleInput::className(), [
        'allowEmptyList'    => false,
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
                    'type' => 'number',
                    'class' => 'input-priority'
                ]
            ],
        ]
    ]);
    ?>

    <?= $form->field($model, 'listId')->hiddenInput()->label(false); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
