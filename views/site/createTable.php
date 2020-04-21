<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use unclead\multipleinput\MultipleInput;

$this->title = 'Create table';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'schedule')->widget(MultipleInput::className(), [
        'max' => 4,
        'columns' => [
            [
                'name'  => 'user_id',
                'type'  => 'dropDownList',
                'title' => 'User',
                'defaultValue' => 1,
                'items' => [
                    1 => 'User 1',
                    2 => 'User 2'
                ]
            ],
            [
                'name'  => 'priority',
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

</div>
