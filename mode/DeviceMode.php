<?php

namespace aface\mobiledetector\mode;

use Detection\MobileDetect;

/**
 * Class DeviceMode
 * @package frontend\themes\detector
 */
class DeviceMode
{
    /**
     * @var MobileDetect
     */
    private $detect;

    /**
     * DeviceMode constructor.
     * @param MobileDetect $detect
     */
    public function __construct(MobileDetect $detect)
    {
        $this->detect = $detect;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->detect->isMobile() || $this->detect->isTablet();
    }
}