<?php

namespace aface\mobiledetector\bootstrap;


use aface\mobiledetector\mode\ClientMode;
use Yii;
use yii\base\BootstrapInterface;
use yii\base\Application;

/**
 * Class Bootstrap
 * @package aface\mobiledetector\bootstrap
 *
 * For example
 *
 * [
 *      'class' => 'aface\mobiledetector\bootstrap\Bootstrap',
 *      'themesPath' => '@frontend/themes/'
 * ]
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @var alias
     */
    public $themesPath;

    /**
     * @param Application $app
     */
    public function bootstrap($app)
    {
        $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {

            $theme = $app->request->getCookies()->getValue(ClientMode::COOKIE_NAME);

            if ($theme !== null) {
                Yii::setAlias('theme', $this->themesPath . $theme);
            }
        });

    }
}
