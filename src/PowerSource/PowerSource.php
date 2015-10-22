<?php
/**
 * Created by PhpStorm.
 * User: vad
 * Date: 10/22/15
 * Time: 10:02 PM
 */

namespace PowerSource;


class PowerSource implements PowerSourceInterface
{
    protected $Voltage;
    protected $ElectricCurrent;

    /**
     * PowerSource constructor.
     * @param $Voltage
     * @param $ElectricCurrent
     */
    public function __construct($Voltage, $ElectricCurrent)
    {
        $this->Voltage = $Voltage;
        $this->setElectricCurrent($ElectricCurrent);
    }

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

    private function isCorrectElectricCurrent($ElectricCurrent)
    {
        return ($ElectricCurrent == 'AC') || ($ElectricCurrent == 'DC');
    }

    /**
     * @param mixed $ElectricCurrent
     */
    private function setElectricCurrent($ElectricCurrent)
    {
        if ($this->isCorrectElectricCurrent($ElectricCurrent)) {
            $this->ElectricCurrent = $ElectricCurrent;
        } else {
            $this->ElectricCurrent = null;
        }
    }

    public function __toString()
    {
        return sprintf("Output voltage: %s\nOutput electric current: %s", $this->getVoltage(),
            $this->getElectricCurrent());
    }
}