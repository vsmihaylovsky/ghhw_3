<?php
/**
 * Created by PhpStorm.
 * User: vad
 * Date: 10/22/15
 * Time: 10:17 PM
 */

namespace PowerSource;


class ElectricPowerConvertor extends PowerSource
{
    private $InputVoltage;
    private $InputElectricCurrent;
    private $InputPowerSource;

    public function __construct($Voltage, $ElectricCurrent, $InputVoltage, $InputElectricCurrent, PowerSourceInterface $InputPowerSource = null)
    {
        parent::__construct($Voltage, $ElectricCurrent);
        $this->InputVoltage = $InputVoltage;
        $this->InputElectricCurrent = $InputElectricCurrent;
        $this->setInputPowerSource($InputPowerSource);
    }

    /**
     * @return PowerSourceInterface
     */
    public function getInputPowerSource()
    {
        return $this->InputPowerSource;
    }

    /**
     * @param PowerSourceInterface $InputPowerSource
     */
    public function setInputPowerSource(PowerSourceInterface $InputPowerSource)
    {
        $this->InputPowerSource = $InputPowerSource;
    }

    public function __toString()
    {
        $ResultString = parent::__toString();
        return $ResultString . $this->Voltage . $this->ElectricCurrent;
    }

}