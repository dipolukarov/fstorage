<?php
/**
 * Description of NotFound
 *
 * @author neo
 */
namespace tts\fstorage\controller\ex;

class NotFound extends ClientError
{
    const CODE	= 404;
    const MSG	= 'Not Found';
}
