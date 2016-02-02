<?php
/**
 * Description of Server
 *
 * @author neo
 */
namespace tts\fstorage\controller;

class Server
{
    public function __construct(\stdClass $settings)
    {
        $this->settings = $settings;
        $path = \sprintf(
            '%s%s.log',
            $settings->path->log,
            $settings->app->name
        );
        $this->log  = new \tts\fstorage\controller\Syslog($path, $settings->debug);
    }
    
    public function run()
    {
        $data = new \stdClass;
        try {
            $data->ret = '<pre>TEST</pre>';
            throw new ex\Success($data->ret);
        } catch (ex\Success $e) {
            \header(\sprintf('HTTP/1.1 %s %s', $e::CODE, $e::MSG), true, $e->getCode());
            if (! empty("{$e}")) {
                echo "{$e}";
            }
        } catch (ex\Error $e) {
            \header(\sprintf('HTTP/1.1 %s %s', $e::CODE, $e::MSG), true, $e->getCode());
            
            $this->log->lError($e->getMessage());
        }
    }
    
    /**
     * @var \tts\fstorage\controller\Syslog
     */
    private $log = null;

    /**
     * @var \stdClass
     */
    private $settings = null;
}
