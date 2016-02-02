<?php
/**
 * Description of ServiceUnavailable
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class ServiceUnavailable extends ServerError
{
    const CODE  = 503;
    const MSG   = 'Service Unavailable';
}
