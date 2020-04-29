<?php

namespace app\models;

use Yii;
use yii\base\Model;


class TaskListForm extends Model
{
    public $tasks;
    public $listId;

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

        return true;
    }
}