<?php

namespace app\modules\materials\controllers;


use yii\web\Controller;
use frontend\actions\Action;
use app\models\Type;
use app\modules\materials\models\Material;
use yii\db\Expression;
use yii\web\NotFoundHttpException;
use frontend\components\SessionHelper;

/**
 * Default controller for the `materials` module
 */
class DefaultController extends Controller
{
    const DEFAULT_ACTION = 'materials';

    /**
     * Страница всех типов материалов\конкретнеого материала
     *
     * @param int $id
     * @return string|\yii\web\NotFoundHttpException
     */
    public function actionMaterials($id = null)
    {
        if(is_null($id)) {
            $types = Type::find()->all();
            return $this->render('/all', ['types' => $types]);
        } else {
            $material = Material::findOne($id);
            if($material) {
                SessionHelper::write($id);
                $viewed = SessionHelper::getViewed();
                $similars = $this->findRecommendMaterials($viewed, $material->type_id);
                return $this->render('/view', ['material' => $material, 'similars' => $similars]);
            } else {
                throw new NotFoundHttpException();
            }
        }
    }

    /**
     * Создание экшена для конкретного типа материала
     *
     * @param string $action
     * @return void
     */
    public function createAction($action)
    {
        if($action === self::DEFAULT_ACTION) {
            return parent::createAction($action);
        }
        return new Action($action, $this);
    }

    /**
     * Поиск рекомендовнных
     *
     * @param array $id
     * @param int $type
     * @return Material[]
     */
    protected function findRecommendMaterials($id, $type)
    {
        return Material::find()
            ->where(['not in', 'id', $id])
            ->andWhere(['type_id' => $type])
            ->orderBy(new Expression('rand()'))
            ->limit(3)
            ->all();
    }
}