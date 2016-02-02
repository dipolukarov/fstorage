<?php
/**
 * Description of Success
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class Success extends HTTP
{
    const CODE  = 200;
    const MSG   = 'OK';
    
    public function __construct($payload = '')
    {
        parent::__construct();
        
        $this->payload = $payload;
    }
    
    public function __toString()
    {
        return $this->payload;
    }

    private $payload = null;
}
