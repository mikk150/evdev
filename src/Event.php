<?php
namespace mikk150\evdev;

/**
*
*/
class Event
{
    public $value;
    public $code;


    public function __construct(array $eventData)
    {
        $this->value = $eventData['value'];
        $this->code = $eventData['code'];
    }
}
