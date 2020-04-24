<?php
/** @var \app\models\Lists $taskList */


use yii\widgets\ActiveForm;
use unclead\multipleinput\MultipleInput;

?>
    <h1>Lists</h1>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'tasks')->widget(MultipleInput::className(), [
    'max' => 4,
    'columns' => [
        [
            'name' => 'name',
            'title' => 'User'
        ],
        [
            'name' => 'goal',
            'title' => 'Priority',
            'enableError' => true,
            'options' => [
                'class' => 'input-priority'
            ]
        ]
    ]
]);
?>
<?php ActiveForm::end(); ?>