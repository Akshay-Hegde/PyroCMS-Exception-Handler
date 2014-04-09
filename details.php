<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *	@author Ben Rogmans
 */

class Module_Exception_handler extends Module
{
  public $version= '1.0';

  public $module_name= 'Exception handler';

  public function info()
  {
    return array(
      'name'		=> array(
        'en'	=> 'Exception handler'
      ),
      'description'	=> array(
        'en'		=> 'Module for nicely handling exceptions'
      ),
      'frontend'	=> 'false',
      'backend'		=> 'false',
    );
  }

  public function install() {
        return true;
  }

  public function uninstall() {
    return true;
  }

  public function upgrade($old_version) { return true; }
  public function help() { return true; }
}
/* End of file details.php */
