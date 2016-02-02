<?php
/**
 * Description of BadMethod
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class BadMethod extends ClientError
{
    const CODE  = 405;
    const MSG   = 'Method Not Allowed';
}
