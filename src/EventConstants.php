<?php

namespace mikk150\evdev;

/**
 * Enum-like class with evdev-event constants.
 * Not all constants defined in include/uapi/linux/input.h are present
 * because there are very numerous and not always useful.
 * If you think a const is missing, open a pull request.
 */
abstract class EventConstants
{
    private static $constants;

    private static $realms;

    # EVENT TYPES
    # ===========
    const EV_SYN       = 0x00;
    const EV_KEY       = 0x01;
    const EV_REL       = 0x02;
    const EV_ABS       = 0x03;
    const EV_MSC       = 0x04;
    const EV_SW        = 0x05;
    const EV_LED       = 0x11;
    const EV_SND       = 0x12;
    const EV_REP       = 0x14;
    const EV_FF        = 0x15;
    const EV_PWR       = 0x16;
    const EV_FF_STATUS = 0x17;

    # SYNCHRONIZATION EVENTS
    # ======================
    const SYN_REPORT    = 0;
    const SYN_CONFIG    = 1;
    const SYN_MT_REPORT = 2;
    const SYN_DROPPED   = 3;

    # KEYS AND BUTTONS
    # ================
    # Most of the keys/buttons are modeled after USB HUT 1.12
    # (see http://www.usb.org/developers/hidpage).
    # Abbreviations in the comments:
    # AC - Application Control
    # AL - Application Launch Button
    # SC - System Control
    const KEY_RESERVED   = 0;
    const KEY_ESC        = 1;
    const KEY_1          = 2;
    const KEY_2          = 3;
    const KEY_3          = 4;
    const KEY_4          = 5;
    const KEY_5          = 6;
    const KEY_6          = 7;
    const KEY_7          = 8;
    const KEY_8          = 9;
    const KEY_9          = 10;
    const KEY_0          = 11;
    const KEY_MINUS      = 12;
    const KEY_EQUAL      = 13;
    const KEY_BACKSPACE  = 14;
    const KEY_TAB        = 15;
    const KEY_Q          = 16;
    const KEY_W          = 17;
    const KEY_E          = 18;
    const KEY_R          = 19;
    const KEY_T          = 20;
    const KEY_Y          = 21;
    const KEY_U          = 22;
    const KEY_I          = 23;
    const KEY_O          = 24;
    const KEY_P          = 25;
    const KEY_LEFTBRACE  = 26;
    const KEY_RIGHTBRACE = 27;
    const KEY_ENTER      = 28;
    const KEY_LEFTCTRL   = 29;
    const KEY_A          = 30;
    const KEY_S          = 31;
    const KEY_D          = 32;
    const KEY_F          = 33;
    const KEY_G          = 34;
    const KEY_H          = 35;
    const KEY_J          = 36;
    const KEY_K          = 37;
    const KEY_L          = 38;
    const KEY_SEMICOLON  = 39;
    const KEY_APOSTROPHE = 40;
    const KEY_GRAVE      = 41;
    const KEY_LEFTSHIFT  = 42;
    const KEY_BACKSLASH  = 43;
    const KEY_Z          = 44;
    const KEY_X          = 45;
    const KEY_C          = 46;
    const KEY_V          = 47;
    const KEY_B          = 48;
    const KEY_N          = 49;
    const KEY_M          = 50;
    const KEY_COMMA      = 51;
    const KEY_DOT        = 52;
    const KEY_SLASH      = 53;
    const KEY_RIGHTSHIFT = 54;
    const KEY_KPASTERISK = 55;
    const KEY_LEFTALT    = 56;
    const KEY_SPACE      = 57;
    const KEY_CAPSLOCK   = 58;
    const KEY_F1         = 59;
    const KEY_F2         = 60;
    const KEY_F3         = 61;
    const KEY_F4         = 62;
    const KEY_F5         = 63;
    const KEY_F6         = 64;
    const KEY_F7         = 65;
    const KEY_F8         = 66;
    const KEY_F9         = 67;
    const KEY_F10        = 68;
    const KEY_NUMLOCK    = 69;
    const KEY_SCROLLLOCK = 70;
    const KEY_KP7        = 71;
    const KEY_KP8        = 72;
    const KEY_KP9        = 73;
    const KEY_KPMINUS    = 74;
    const KEY_KP4        = 75;
    const KEY_KP5        = 76;
    const KEY_KP6        = 77;
    const KEY_KPPLUS     = 78;
    const KEY_KP1        = 79;
    const KEY_KP2        = 80;
    const KEY_KP3        = 81;
    const KEY_KP0        = 82;
    const KEY_KPDOT      = 83;
    const KEY_ZENKAKUHANKAKU   = 85;
    const KEY_102ND            = 86;
    const KEY_F11              = 87;
    const KEY_F12              = 88;
    const KEY_RO               = 89;
    const KEY_KATAKANA         = 90;
    const KEY_HIRAGANA         = 91;
    const KEY_HENKAN           = 92;
    const KEY_KATAKANAHIRAGANA = 93;
    const KEY_MUHENKAN         = 94;
    const KEY_KPJPCOMMA        = 95;
    const KEY_KPENTER          = 96;
    const KEY_RIGHTCTRL        = 97;
    const KEY_KPSLASH          = 98;
    const KEY_SYSRQ            = 99;
    const KEY_RIGHTALT         = 100;
    const KEY_LINEFEED         = 101;
    const KEY_HOME             = 102;
    const KEY_UP               = 103;
    const KEY_PAGEUP           = 104;
    const KEY_LEFT             = 105;
    const KEY_RIGHT            = 106;
    const KEY_END              = 107;
    const KEY_DOWN             = 108;
    const KEY_PAGEDOWN         = 109;
    const KEY_INSERT           = 110;
    const KEY_DELETE           = 111;
    const KEY_MACRO            = 112;
    const KEY_MUTE             = 113;
    const KEY_VOLUMEDOWN       = 114;
    const KEY_VOLUMEUP         = 115;
    const KEY_POWER            = 116; # SC System Power Down
    const KEY_KPEQUAL          = 117;
    const KEY_KPPLUSMINUS      = 118;
    const KEY_PAUSE            = 119;
    const KEY_SCALE            = 120; # AL Compiz Scale (Expose)
    const KEY_KPCOMMA          = 121;
    const KEY_HANGEUL          = 122;
    const KEY_HANGUEL          = self::KEY_HANGEUL;
    const KEY_HANJA            = 123;
    const KEY_YEN              = 124;
    const KEY_LEFTMETA         = 125;
    const KEY_RIGHTMETA        = 126;
    const KEY_COMPOSE          = 127;
    const KEY_STOP             = 128; # AC Stop
    const KEY_AGAIN            = 129;
    const KEY_PROPS            = 130; # AC Properties
    const KEY_UNDO             = 131; # AC Undo
    const KEY_FRONT            = 132;
    const KEY_COPY             = 133; # AC Copy
    const KEY_OPEN             = 134; # AC Open
    const KEY_PASTE            = 135; # AC Paste
    const KEY_FIND             = 136; # AC Search
    const KEY_CUT              = 137; # AC Cut
    const KEY_HELP             = 138; # AL Integrated Help Center
    const KEY_MENU             = 139; # Menu (show menu)
    const KEY_CALC             = 140; # AL Calculator
    const KEY_SETUP            = 141;
    const KEY_SLEEP            = 142; # SC System Sleep
    const KEY_WAKEUP           = 143; # System Wake Up
    const KEY_FILE             = 144; # AL Local Machine Browser
    const KEY_SENDFILE         = 145;
    const KEY_DELETEFILE       = 146;
    const KEY_XFER             = 147;
    const KEY_PROG1            = 148;
    const KEY_PROG2            = 149;
    const KEY_WWW              = 150; # AL Internet Browser
    const KEY_MSDOS            = 151;
    const KEY_COFFEE           = 152; # AL Terminal Lock/Screensaver
    const KEY_SCREENLOCK       = self::KEY_COFFEE;
    const KEY_ROTATE_DISPLAY   = 153; # Display orientation for e.g. tablets
    const KEY_DIRECTION        = self::KEY_ROTATE_DISPLAY;
    const KEY_CYCLEWINDOWS     = 154;
    const KEY_MAIL             = 155;
    const KEY_BOOKMARKS        = 156; # AC Bookmarks
    const KEY_COMPUTER         = 157;
    const KEY_BACK             = 158; # AC Back
    const KEY_FORWARD          = 159; # AC Forward
    const KEY_CLOSECD          = 160;
    const KEY_EJECTCD          = 161;
    const KEY_EJECTCLOSECD     = 162;
    const KEY_NEXTSONG         = 163;
    const KEY_PLAYPAUSE        = 164;
    const KEY_PREVIOUSSONG     = 165;
    const KEY_STOPCD           = 166;
    const KEY_RECORD           = 167;
    const KEY_REWIND           = 168;
    const KEY_PHONE            = 169; # Media Select Telephone
    const KEY_ISO              = 170;
    const KEY_CONFIG           = 171; # AL Consumer Control Configuration
    const KEY_HOMEPAGE         = 172; # AC Home
    const KEY_REFRESH          = 173; # AC Refresh
    const KEY_EXIT             = 174; # AC Exit
    const KEY_MOVE             = 175;
    const KEY_EDIT             = 176;
    const KEY_SCROLLUP         = 177;
    const KEY_SCROLLDOWN       = 178;
    const KEY_KPLEFTPAREN      = 179;
    const KEY_KPRIGHTPAREN     = 180;
    const KEY_NEW              = 181; # AC New
    const KEY_REDO             = 182; # AC Redo/Repeat
    const KEY_F13              = 183;
    const KEY_F14              = 184;
    const KEY_F15              = 185;
    const KEY_F16              = 186;
    const KEY_F17              = 187;
    const KEY_F18              = 188;
    const KEY_F19              = 189;
    const KEY_F20              = 190;
    const KEY_F21              = 191;
    const KEY_F22              = 192;
    const KEY_F23              = 193;
    const KEY_F24              = 194;
    const KEY_PLAYCD           = 200;
    const KEY_PAUSECD          = 201;
    const KEY_PROG3            = 202;
    const KEY_PROG4            = 203;
    const KEY_DASHBOARD        = 204; # AL Dashboard
    const KEY_SUSPEND          = 205;
    const KEY_CLOSE            = 206; # AC Close
    const KEY_PLAY             = 207;
    const KEY_FASTFORWARD      = 208;
    const KEY_BASSBOOST        = 209;
    const KEY_PRINT            = 210; # AC Print
    const KEY_HP               = 211;
    const KEY_CAMERA           = 212;
    const KEY_SOUND            = 213;
    const KEY_QUESTION         = 214;
    const KEY_EMAIL            = 215;
    const KEY_CHAT             = 216;
    const KEY_SEARCH           = 217;
    const KEY_CONNECT          = 218;
    const KEY_FINANCE          = 219; # AL Checkbook/Finance
    const KEY_SPORT            = 220;
    const KEY_SHOP             = 221;
    const KEY_ALTERASE         = 222;
    const KEY_CANCEL           = 223; # AC Cancel
    const KEY_BRIGHTNESSDOWN   = 224;
    const KEY_BRIGHTNESSUP     = 225;
    const KEY_MEDIA            = 226;
    const KEY_SWITCHVIDEOMODE  = 227; # Cycle between available video
    const KEY_KBDILLUMTOGGLE   = 228;
    const KEY_KBDILLUMDOWN     = 229;
    const KEY_KBDILLUMUP       = 230;
    const KEY_SEND             = 231; # AC Send
    const KEY_REPLY            = 232; # AC Reply
    const KEY_FORWARDMAIL      = 233; # AC Forward Msg
    const KEY_SAVE             = 234; # AC Save
    const KEY_DOCUMENTS        = 235;
    const KEY_BATTERY          = 236;
    const KEY_BLUETOOTH        = 237;
    const KEY_WLAN             = 238;
    const KEY_UWB              = 239;
    const KEY_UNKNOWN          = 240;
    const KEY_VIDEO_NEXT       = 241; # drive next video source
    const KEY_VIDEO_PREV       = 242; # drive previous video source
    const KEY_BRIGHTNESS_CYCLE = 243; # brightness up, after max is min
    const KEY_BRIGHTNESS_AUTO  = 244; # Set Auto Brightness: manual
    const KEY_BRIGHTNESS_ZERO  = self::KEY_BRIGHTNESS_AUTO;
    const KEY_DISPLAY_OFF      = 245; # display device to off state
    const KEY_WWAN             = 246; # Wireless WAN (LTE, UMTS, GSM, etc.)
    const KEY_WIMAX            = self::KEY_WWAN;
    const KEY_RFKILL           = 247; # Key that controls all radios
    const KEY_MICMUTE          = 248; # Mute / unmute the microphone
    const BTN_MISC           = 0x100;
    const BTN_0              = 0x100;
    const BTN_1              = 0x101;
    const BTN_2              = 0x102;
    const BTN_3              = 0x103;
    const BTN_4              = 0x104;
    const BTN_5              = 0x105;
    const BTN_6              = 0x106;
    const BTN_7              = 0x107;
    const BTN_8              = 0x108;
    const BTN_9              = 0x109;
    const BTN_MOUSE          = 0x110;
    const BTN_LEFT           = 0x110;
    const BTN_RIGHT          = 0x111;
    const BTN_MIDDLE         = 0x112;
    const BTN_SIDE           = 0x113;
    const BTN_EXTRA          = 0x114;
    const BTN_FORWARD        = 0x115;
    const BTN_BACK           = 0x116;
    const BTN_TASK           = 0x117;
    const BTN_JOYSTICK       = 0x120;
    const BTN_TRIGGER        = 0x120;
    const BTN_THUMB          = 0x121;
    const BTN_THUMB2         = 0x122;
    const BTN_TOP            = 0x123;
    const BTN_TOP2           = 0x124;
    const BTN_PINKIE         = 0x125;
    const BTN_BASE           = 0x126;
    const BTN_BASE2          = 0x127;
    const BTN_BASE3          = 0x128;
    const BTN_BASE4          = 0x129;
    const BTN_BASE5          = 0x12a;
    const BTN_BASE6          = 0x12b;
    const BTN_DEAD           = 0x12f;
    const BTN_GAMEPAD        = 0x130;
    const BTN_SOUTH          = 0x130;
    const BTN_A              = self::BTN_SOUTH;
    const BTN_EAST           = 0x131;
    const BTN_B              = self::BTN_EAST;
    const BTN_C              = 0x132;
    const BTN_NORTH          = 0x133;
    const BTN_X              = self::BTN_NORTH;
    const BTN_WEST           = 0x134;
    const BTN_Y              = self::BTN_WEST;
    const BTN_Z              = 0x135;
    const BTN_TL             = 0x136;
    const BTN_TR             = 0x137;
    const BTN_TL2            = 0x138;
    const BTN_TR2            = 0x139;
    const BTN_SELECT         = 0x13a;
    const BTN_START          = 0x13b;
    const BTN_MODE           = 0x13c;
    const BTN_THUMBL         = 0x13d;
    const BTN_THUMBR         = 0x13e;
    const BTN_DIGI           = 0x140;
    const BTN_TOOL_PEN       = 0x140;
    const BTN_TOOL_RUBBER    = 0x141;
    const BTN_TOOL_BRUSH     = 0x142;
    const BTN_TOOL_PENCIL    = 0x143;
    const BTN_TOOL_AIRBRUSH  = 0x144;
    const BTN_TOOL_FINGER    = 0x145;
    const BTN_TOOL_MOUSE     = 0x146;
    const BTN_TOOL_LENS      = 0x147;
    const BTN_TOOL_QUINTTAP  = 0x148; # Five fingers on trackpad
    const BTN_TOUCH          = 0x14a;
    const BTN_STYLUS         = 0x14b;
    const BTN_STYLUS2        = 0x14c;
    const BTN_TOOL_DOUBLETAP = 0x14d;
    const BTN_TOOL_TRIPLETAP = 0x14e;
    const BTN_TOOL_QUADTAP   = 0x14f; # Four fingers on trackpad
    const BTN_WHEEL          = 0x150;
    const BTN_GEAR_DOWN      = 0x150;
    const BTN_GEAR_UP        = 0x151;
    # !=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!
    # ! The Linux API defines a lot of exotic keys/buttons after this list. !
    # ! I don't included those buttons here.                                !
    # ! If you think somme common buttons are missing, open a pull request. !
    # !=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!=!

    # RELATIVE AXES
    # =============
    const REL_X      = 0x00;
    const REL_Y      = 0x01;
    const REL_Z      = 0x02;
    const REL_RX     = 0x03;
    const REL_RY     = 0x04;
    const REL_RZ     = 0x05;
    const REL_HWHEEL = 0x06;
    const REL_DIAL   = 0x07;
    const REL_WHEEL  = 0x08;
    const REL_MISC   = 0x09;

    # ABSOLUTE AXES
    # =============
    const ABS_X              = 0x00;
    const ABS_Y              = 0x01;
    const ABS_Z              = 0x02;
    const ABS_RX             = 0x03;
    const ABS_RY             = 0x04;
    const ABS_RZ             = 0x05;
    const ABS_THROTTLE       = 0x06;
    const ABS_RUDDER         = 0x07;
    const ABS_WHEEL          = 0x08;
    const ABS_GAS            = 0x09;
    const ABS_BRAKE          = 0x0a;
    const ABS_HAT0X          = 0x10;
    const ABS_HAT0Y          = 0x11;
    const ABS_HAT1X          = 0x12;
    const ABS_HAT1Y          = 0x13;
    const ABS_HAT2X          = 0x14;
    const ABS_HAT2Y          = 0x15;
    const ABS_HAT3X          = 0x16;
    const ABS_HAT3Y          = 0x17;
    const ABS_PRESSURE       = 0x18;
    const ABS_DISTANCE       = 0x19;
    const ABS_TILT_X         = 0x1a;
    const ABS_TILT_Y         = 0x1b;
    const ABS_TOOL_WIDTH     = 0x1c;
    const ABS_VOLUME         = 0x20;
    const ABS_MISC           = 0x28;
    const ABS_MT_SLOT        = 0x2f; # MT slot being modified
    const ABS_MT_TOUCH_MAJOR = 0x30; # Major axis of touching ellipse
    const ABS_MT_TOUCH_MINOR = 0x31; # Minor axis (omit if circular)
    const ABS_MT_WIDTH_MAJOR = 0x32; # Major axis of approaching ellipse
    const ABS_MT_WIDTH_MINOR = 0x33; # Minor axis (omit if circular)
    const ABS_MT_ORIENTATION = 0x34; # Ellipse orientation
    const ABS_MT_POSITION_X  = 0x35; # Center X touch position
    const ABS_MT_POSITION_Y  = 0x36; # Center Y touch position
    const ABS_MT_TOOL_TYPE   = 0x37; # Type of touching device
    const ABS_MT_BLOB_ID     = 0x38; # Group a set of packets as a blob
    const ABS_MT_TRACKING_ID = 0x39; # Unique ID of initiated contact
    const ABS_MT_PRESSURE    = 0x3a; # Pressure on contact area
    const ABS_MT_DISTANCE    = 0x3b; # Contact hover distance
    const ABS_MT_TOOL_X      = 0x3c; # Center X tool position
    const ABS_MT_TOOL_Y      = 0x3d; # Center Y tool position

    # MISC EVENTS
    # ===========
    const MSC_SERIAL    = 0x00;
    const MSC_PULSELED  = 0x01;
    const MSC_GESTURE   = 0x02;
    const MSC_RAW       = 0x03;
    const MSC_SCAN      = 0x04;
    const MSC_TIMESTAMP = 0x05;
    const MSC_MAX       = 0x07;


    final public static function getConstants()
    {
        return self::$constants ?: self::$constants = (new \ReflectionClass(__CLASS__))->getConstants();
    }

    final public static function getConstantsRealm($realm)
    {
        if(!self::$realms) {
            foreach(self::getConstants() as $constname => $constval) {
                $key = substr($constname, 0, strpos($constname, '_'));
                self::$realms[$key][$constname] = $constval;
            }
        }

        return self::$realms[$realm];
    }

    final public static function getConstantFromValue($value, $realm)
    {
        $values = array_flip(self::getConstantsRealm($realm));

        return isset($values[$value]) ? $values[$value] : null;
    }

    // final public static function getSupportedEventsByMask($mask, $valuesOnly = true)
    // {
    //     if(is_string($mask)) $mask = hexdec($mask);

    //     $supported = [];

    //     foreach(self::getConstantsRealm('EV') as $eventName => $eventMask) {
    //         if($mask & 1 << $eventMask) {
    //             $supported[] = $valuesOnly ? $eventMask : $eventName;
    //         }
    //     }

    //     return $supported;
    // }
}
