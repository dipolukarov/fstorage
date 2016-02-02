<?php
/**
 * Description of Syslog
 *
 * @author neo
 */
namespace tts\fstorage\controller;

class Syslog
{
    /**
     * 
     * @param string $path
     */
    public function  __construct($path, $level)
    {
        $this->path  = $path;
        $this->level = $level;
        $this->tpl = '%s [%s] %s ' . "\n";

        $this->lDebug('===== BEGIN REQUEST =====');
    }

    public function  __destruct()
    {
        $this->lDebug('===== END REQUEST =====');
    }

    /**
     * 
     * @param string $msg
     */
    public function lError($msg)
    {
        $this->log(\LOG_ERR, $msg);
    }

    /**
     * 
     * @param string $msg
     */
    public function lInfo($msg)
    {
        $this->log(\LOG_INFO, $msg);
    }

    /**
     * 
     * @param string $msg
     */
    public function lDebug($msg)
    {
        $this->log(\LOG_DEBUG, $msg);
    }
    
    /**
     * @var int
     */
    private $level = 0;

    /**
     * @var string
     */
    private $path = null;
    
    /**
     * @var string
     */
    private $tpl = '';

    /**
     * 
     * @param int $level
     * @param string $message
     */
    private function log($level, $message)
    {
        if ($this->level >= $level) {
            $msg = \sprintf($this->tpl, $level, \date('Y-m-d h:i:s'), $message);
            \file_put_contents($this->path, $msg, \FILE_APPEND);
        }
    }
}
