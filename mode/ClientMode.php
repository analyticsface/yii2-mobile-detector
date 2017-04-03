<?php

namespace aface\mobiledetector\mode;

use yii\web\Request;

/**
 * Class ClientMode
 * @package frontend\themes\detector
 */
class ClientMode
{
    const COOKIE_NAME = 'mode';
    const MODE_MOBILE = 'mobile';
    const MODE_DESKTOP = 'desktop';

    /**
     * @var Request
     */
    private $request;

    /**
     * ClientMode constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->is(self::MODE_MOBILE);
    }

    /**
     * @return bool
     */
    public function isDesktop()
    {
        return $this->is(self::MODE_DESKTOP);
    }

    /**
     * @param $mode
     * @return bool
     */
    private function is($mode)
    {
        return $this->request->getCookies()->getValue(self::COOKIE_NAME) === $mode;
    }
}

