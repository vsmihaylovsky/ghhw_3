<?php
/**
 * Created by PhpStorm.
 * User: vad
 * Date: 10/22/15
 * Time: 10:37 PM
 */

namespace PowerSource;


interface PowerSourceInterface
{
    public function getVoltage();
    public function getElectricCurrent();
}