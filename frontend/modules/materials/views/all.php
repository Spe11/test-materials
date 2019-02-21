<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="materials-default-index">
    <h1>Список материалов</h1>
    <?php 
foreach($types as $type): ?>
    <p>
        <?= Html::a($type->title, Url::to("/$type->title")); ?>
    </p>
    <?php endforeach ?>
</div>
