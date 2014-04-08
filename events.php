<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Exception handler Events Class
 *
 * @category    events
 * @author      Ben Rogmans
 */
class Events_Exception_handler {

    protected $ci;

    public function __construct() {

        $this->ci =& get_instance();
        Events::register('public_controller', array($this, 'run'));
    }

    public function run() {

        set_exception_handler(array($this, 'HandleExceptions'));
        return;

    }

    public function HandleExceptions($exception) {

        $msg = 'Exception: '.get_class($exception).PHP_EOL;
        $msg .= 'Message: '.$exception->getMessage().PHP_EOL;
        $msg .= 'File '.$exception->getFile().' at Line '.$exception->getLine() . PHP_EOL;
        $msg .= "Backtrace" . PHP_EOL;
        $msg .= $exception->getTraceAsString();

        log_message('error', $msg, TRUE);

        if(ENVIRONMENT == 'development') {

            print '<pre>';
            print $msg;

        } else {

			$this->ci->lang->load('exception_handler/exception_handler');
			$this->ci->template->build('exception_handler/error', ['exception'=>$exception]);

			print $this->ci->output->get_output();

        }

    }

}