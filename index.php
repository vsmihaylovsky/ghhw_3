<?php
require __DIR__ . '/vendor/autoload.php';

use PowerSource\PowerSource;
use PowerSource\ElectricPowerConvertor;

$AAABattery = new PowerSource(1.5, 'DC');
$ElectricalNetwork = new PowerSource(220, 'AC');
$USBCharge1 = new ElectricPowerConvertor(5, 'DC', 220, 'AC', $AAABattery);
$USBCharge2 = new ElectricPowerConvertor(5, 'DC', 220, 'AC', $ElectricalNetwork);

$PowerSourceArray = [$AAABattery, $ElectricalNetwork, $USBCharge1, $USBCharge2];
echo '<pre>';
foreach ($PowerSourceArray as $PowerSourceItem) {
    echo $PowerSourceItem . "\n\n";
}
echo '</pre>';