<?php
/**
 * Description of ServerError
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class ServerError extends Error
{
    const CODE  = 500;
    const MSG   = 'Internal Server Error';
}
