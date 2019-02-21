<?php

namespace frontend\components;

class SessionHelper
{
    /**
     * Записываем в сессию ид материла
     *
     * @param int $id
     * @return void
     */
    public static function write($id) {
        $session = \Yii::$app->session;
        $session->open();
        $viewed = $session['viewed'];
        if (!in_array($id, $viewed))
        {
            $viewed[] = $id;
        }
        $session['viewed'] = $viewed;
        $session->close();
    }

    /**
     * Получаем список просмотренных материалов
     *
     * @return array
     */
    public static function getViewed() {
        $session = \Yii::$app->session;
        $session->open();
        $result = $session['viewed'];
        $session->close();
        return $result;
    }
}
