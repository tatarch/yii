<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;
/** @var \app\models\TaskList[] $taskList */
/* @var $searchModel app\models\TaskListSearch */
?>

<?php $form = ActiveForm::begin([
    'action' => ['save'],
]); ?>

<?= $form->field($taskList, 'tasks')->widget(MultipleInput::className(), [
    'max' => 4,
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
]);
?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>