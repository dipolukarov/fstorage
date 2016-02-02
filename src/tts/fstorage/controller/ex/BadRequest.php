<?php
/**
 * Description of BadRequest
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class BadRequest extends ClientError
{
    const CODE  = 400;
    const MSG   = 'Bad Request';
}
