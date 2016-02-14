<?php
namespace mikk150\evdev;

use Evenement\EventEmitter;
use React\EventLoop\LoopInterface;
use React\Stream\Stream as FileStreamer;

/**
*
*/
class Stream extends EventEmitter
{
    private $fileStreamer;
    private $structSize;
    private $evBinaryFormat;
    private $eventResolver;

    public function __construct($evdev, LoopInterface $loop)
    {
        $this->determineBinaryFormats();

        $this->fileStreamer = new FileStreamer($evdev, $loop);
        $this->fileStreamer->bufferSize = $this->structSize;

        $this->eventResolver = new EventResolver;

        $that=$this;

        $this->fileStreamer->on('error', function ($error) use ($that) {
            $that->emit('error', array($error, $that));
        });

        $this->fileStreamer->on('drain', function () use ($that) {
            $that->emit('drain', array($that));
        });

        $this->fileStreamer->on('data', function ($data) use ($that) {
            $that->handleData($data);
        });
    }

    public function handleData($data)
    {
        $eventData = unpack($this->evBinaryFormat, $data);
        $resolvedEvent = $this->eventResolver->resolveEvent($eventData);
        if ($resolvedEvent) {
            $this->emit('data', array($resolvedEvent, $this));
        }
    }

    /**
     * Determines the OS mem addresses sizes and adapt the unpack()
     * format used to decode the events.
     *
     * @author Morgan Touverey-Quilling <mtouverey@alembic-dev.com>
     * @return void
     */
    private function determineBinaryFormats()
    {
        switch ((int) trim(`getconf LONG_BIT`)) {
            case 32:
                $this->structSize = 16;
                $this->evBinaryFormat = 'Lsec/Lmsec/Stype/Scode/lvalue';
                break;
            case 64:
                $this->structSize = 24;
                $this->evBinaryFormat = 'Qsec/Qmsec/Stype/Scode/lvalue';
                break;
            default:
                throw new \RuntimeException('Could not determine on which architecture (x86, x64) the Linux kernel was compiled because getconf is not in the $PATH.');
                break;
        }
    }
}
