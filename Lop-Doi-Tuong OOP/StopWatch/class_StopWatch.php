<?php
class StopWatch
{
    private $beginTime;
    private $endTime;

    # __construct method
    public function __construct()
    {
        $this->beginTime = $this->getMicroTime();
    }

    /**
     * Get the value of beginTime
     */

    public function getBeginTime()
    {
        return $this->beginTime;
    }

    /**
     * Get the value of endTime
     */

    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * Set new value for beginTime to begin record
     */
    public function beginRecord()
    {
        $this->beginTime = $this->getMicroTime();
    }

    /**
     * Set new value for stopTime to stop record
     */
    public function endRecord()
    {
        $this->endTime = $this->getMicroTime();
    }

    /**
     * Return recorder time
     */
    public function getElapsedTime()
    {
        return round($this->endTime - $this->beginTime);
    }

    /**
     * A method to test how MicroTime() function works
     */
    public function testMicroTime()
    {
        return microtime(true) * 1000;
    }

    /**
     * A method to test how MicroTime() function works
     * Return a value using round() function
     */
    public function getMicroTime()
    {
        return round(microtime(true) * 1000);
    }
}