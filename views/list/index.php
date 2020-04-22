<?php
/** @var \app\models\Lists[] $lists */

use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
    <h1>Lists</h1>
    <ul>
        <?php foreach ($lists as $list): ?>
            <li>
                <?= Html::encode("({$list->name})") ?>:

            </li>
        <?php endforeach; ?>
    </ul>

