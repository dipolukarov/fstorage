<?php
/**
 * Description of HTTP
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

abstract class HTTP extends \Exception
{
    public function __construct($msg = null)
    {
        parent::__construct(empty($msg) ? static::MSG : $msg, static::CODE, null);
    }

    public function __toString()
    {
        return \sprintf('%s %s', $this->getCode(), $this->getMessage());
    }
}
