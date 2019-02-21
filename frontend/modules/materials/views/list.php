<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="materials-default-index">
    <h1>Материалы типа <?= $type ?></h1>
    <?php 
foreach($materials as $material): ?>
    <p>
        <?= Html::a($material->title, Url::to("/materials/$material->title")); ?>
    </p>
    <?php endforeach ?>
</div>
