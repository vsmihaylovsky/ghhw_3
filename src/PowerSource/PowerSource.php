<?php
/**
 * Created by PhpStorm.
 * User: vad
 * Date: 10/22/15
 * Time: 10:02 PM
 */

namespace PowerSource;


abstract class PowerSource implements PowerSourceInterface
{
    protected $Voltage;
    protected $ElectricCurrent;

    /**
     * @return mixed
     */
    public function getVoltage()
    {
        return $this->Voltage;
    }

    /**
     * @return mixed
     */
    public function getElectricCurrent()
    {
        return $this->ElectricCurrent;
    }

    /**
     * @param mixed $ElectricCurrent
     */
    private function setElectricCurrent($ElectricCurrent)
    {
        $this->ElectricCurrent = $ElectricCurrent;
    }

    public function __construct($Voltage, $ElectricCurrent)
    {
        $this->Voltage = $Voltage;
        $this->setElectricCurrent($ElectricCurrent);
    }

    public function __toString()
    {
        return $this->getVoltage() . $this->getElectricCurrent();
    }
}