<?php

use yii\helpers\Html;
use yii\helpers\Url;
?>

<div class="materials-default-index">
    <h1>Материал: <?= $material->title ?></h1>
    <p>
        Похожие:
    </p>
    <?php 
foreach($similars as $similar): ?>
    <p>
        <?= Html::a($similar->title, Url::to("/materials/$similar->id")); ?>
    </p>
    <?php endforeach ?>
</div>
