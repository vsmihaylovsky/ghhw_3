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

    /**
     * ElectricPowerConvertor constructor.
     * @param $Voltage
     * @param $ElectricCurrent
     * @param $InputVoltage
     * @param $InputElectricCurrent
     * @param PowerSourceInterface|null $InputPowerSource
     */
    public function __construct(
        $Voltage,
        $ElectricCurrent,
        $InputVoltage,
        $InputElectricCurrent,
        PowerSourceInterface $InputPowerSource = null
    ) {
        parent::__construct($Voltage, $ElectricCurrent);
        $this->InputVoltage = $InputVoltage;
        $this->InputElectricCurrent = $InputElectricCurrent;
        $this->setInputPowerSource($InputPowerSource);
    }

    private function isCorrectInputPowerSource()
    {
        return
            ($this->getInputPowerSource() !== null) &&
            ($this->getInputPowerSource()->getVoltage() === $this->getInputVoltage()) &&
            ($this->getInputPowerSource()->getElectricCurrent() === $this->getInputElectricCurrent());
    }

    /**
     * @return mixed
     */
    public function getVoltage()
    {
        return $this->isCorrectInputPowerSource() ? $this->Voltage : 0;
    }

    /**
     * @return mixed
     */
    public function getElectricCurrent()
    {
        return $this->isCorrectInputPowerSource() ? $this->ElectricCurrent : '';
    }

    /**
     * @return mixed
     */
    public function getInputVoltage()
    {
        return $this->InputVoltage;
    }

    /**
     * @return mixed
     */
    public function getInputElectricCurrent()
    {
        return $this->InputElectricCurrent;
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
        $ResultString = parent::__toString() . "\n";
        if ($this->isCorrectInputPowerSource()) {
            $ResultString .= sprintf("Input voltage: %s\nInput electric current: %s",
                $this->getInputPowerSource()->getVoltage(),
                $this->getInputPowerSource()->getElectricCurrent());
        } elseif ($this->getInputPowerSource() === null) {
            $ResultString .= 'Input power source is not set!';
        } else {
            $ResultString .= "Input power source is not correct!\n" . sprintf("Input voltage: %s\nInput electric current: %s",
                    $this->getInputPowerSource()->getVoltage(), $this->getInputPowerSource()->getElectricCurrent());

        };

        return $ResultString;
    }
}