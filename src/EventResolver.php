<?php
namespace mikk150\evdev;

use mikk150\evdev\EventConstants;

/**
*
*/
class EventResolver
{

    private $eventClasses = [
        EventConstants::EV_ABS => 'mikk150\evdev\events\AbsoluteEvent',
        EventConstants::EV_KEY => 'mikk150\evdev\events\KeyEvent',
        EventConstants::EV_MSC => 'mikk150\evdev\events\MiscEvent',
        EventConstants::EV_REL => 'mikk150\evdev\events\RelativeEvent',
        EventConstants::EV_REP => 'mikk150\evdev\events\RepeatEvent',
        EventConstants::EV_SW =>  'mikk150\evdev\events\SwitchEvent',
        EventConstants::EV_SYN => 'mikk150\evdev\events\SynEvent',
        EventConstants::EV_PWR => 'mikk150\evdev\events\PowerEvent',
        // EventConstants::EV_LED => 'mikk150\evdev\events\LedEvent',
        // EventConstants::EV_SND => 'mikk150\evdev\events\SoundEvent',
        // EventConstants::EV_FF => 'mikk150\evdev\events\RepeatEvent',
    ];

    public function resolveEvent(array $eventData)
    {
        if (array_key_exists($eventData['type'], $this->eventClasses)) {
            $className = $this->eventClasses[$eventData['type']];
            return new $className($eventData);
        }
    }
}
