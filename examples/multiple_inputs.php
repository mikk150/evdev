<?php
use mikk150\evdev\EventConstants;

require_once __DIR__.'/../vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$eventStreamer  = new mikk150\evdev\Stream(fopen('/dev/input/by-path/platform-i8042-serio-0-event-kbd', 'r'), $loop); // On my machine Keyboard (internal)
$eventStreamer2 = new mikk150\evdev\Stream(fopen('/dev/input/by-path/pci-0000:00:14.0-usb-0:2:1.0-event-kbd', 'r'), $loop); // On my machine Keyboard (external)
$eventStreamer3 = new mikk150\evdev\Stream(fopen('/dev/input/by-path/platform-i8042-serio-4-event-mouse', 'r'), $loop); // On my machine touchpad (internal)

$konamiCode=[
    EventConstants::KEY_UP,
    EventConstants::KEY_UP,
    EventConstants::KEY_DOWN,
    EventConstants::KEY_DOWN,
    EventConstants::KEY_LEFT,
    EventConstants::KEY_RIGHT,
    EventConstants::KEY_LEFT,
    EventConstants::KEY_RIGHT,
    EventConstants::KEY_B,
    EventConstants::KEY_A,
];

$enteredKeys=[];


$eventStreamer->on('data', function ($data) {
    if (in_array($data->code, [
        EventConstants::KEY_UP,
        EventConstants::KEY_LEFT,
        EventConstants::KEY_RIGHT,
        EventConstants::KEY_DOWN
    ]) && $data->value == 1) {
        echo 'Let\'s play a game'.PHP_EOL;
    }
});

$eventStreamer2->on('data', function ($data) use ($konamiCode, &$enteredKeys) {
    if ($data->value == 1) {
        $enteredKeys[] = $data->code;
        if (count($enteredKeys)>10) {
            array_shift($enteredKeys);
        }
        if ($konamiCode == $enteredKeys) {
            echo 'KONAMI CODE INSERTED!!!!!!!!!!'.PHP_EOL;
        }
    }
});


$eventStreamer3->on('data', function ($data) {
    if ($data->code == EventConstants::BTN_TOOL_TRIPLETAP && $data->value == 1) {
        echo 'User put three fingers on touchpad'.PHP_EOL;
    }
});

$loop->run();
