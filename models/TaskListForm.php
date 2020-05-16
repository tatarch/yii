<?php

namespace app\models;

use Yii;
use yii\base\Model;


class TaskListForm extends Model
{
    public $tasks;
    public $listId;
    public $name;

    public function rules()
    {
        return [
            // username and password are both required
            [['tasks', 'listId'], 'required'],

        ];
    }


    public function save()
    {
        $taskList = TaskList::findOne($this->listId);
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();

        try {
            foreach ($taskList->tasks as $task) {
                $task->delete();
            }
            foreach ($this->tasks as $taskData) {
                $task = new Task();
                $task->listId = $this->listId;
                $task->name = $taskData['name'];
                $task->goal = $taskData['goal'];
                $task->save();
            }
            $transaction->commit();

        } catch (\Exception $e) {
            $transaction->rollBack();
            return false;
        }

        return true;
    }
}