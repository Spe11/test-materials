<?php

namespace frontend\actions;

use app\models\Type;
use app\modules\materials\models\Material;
use yii\web\NotFoundHttpException;

class Action extends \yii\base\Action
{
    /**
     * Обработка экшена
     *
     * @return string|\yii\web\NotFoundHttpException
     */
    public function run()
    {
        $type = Type::findOne(['title' => $this->id]);
        if ($type) {
            $type_id = $type->id;
            $materials = Material::findAll(['type_id' => $type_id]);
            return \Yii::$app->controller->render('/list', ['materials' => $materials, 'type' => $this->id]);
        } else {
            throw new NotFoundHttpException();
        }
    }
}


