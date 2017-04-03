<?php

namespace aface\mobiledetector\mode;

/**
 * Class ViewMode
 * @package frontend\themes\detector
 */
class ViewMode
{
    /**
     * @var ClientMode
     */
    private $client;

    /**
     * @var DeviceMode
     */
    private $device;

    /**
     * ViewMode constructor.
     * @param ClientMode $client
     * @param DeviceMode $device
     */
    public function __construct(ClientMode $client, DeviceMode $device)
    {
        $this->client = $client;
        $this->device = $device;
    }

    /**
     * @return bool
     */
    public function isMobile()
    {
        return $this->client->isMobile() || (!$this->client->isDesktop() && $this->device->isMobile());
    }
}