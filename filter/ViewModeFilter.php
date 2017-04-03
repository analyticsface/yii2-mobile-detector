<?php

namespace aface\mobiledetector\filter;


use aface\mobiledetector\mode\ClientMode;
use Yii;
use yii\base\ActionFilter;
use yii\helpers\Url;
use yii\web\Cookie;

/**
 * Class ViewModeFilter
 * @package frontend\themes\detector
 */
class ViewModeFilter extends ActionFilter
{
    /**
     * @var int
     */
    public $expire = 0;

    /**
     * @param \yii\base\Action $action
     * @return bool
     */
    public function beforeAction($action)
    {
        if ($mode = Yii::$app->request->get('mode')) {
            $response = Yii::$app->response;
            $response->cookies->add(new Cookie([
                'name' => ClientMode::COOKIE_NAME,
                'value' => $mode,
                'expire' => time() + $this->expire,
            ]));
            $response->redirect(Url::current(['mode' => null]), 301);
            return false;
        }
        return true;
    }
}