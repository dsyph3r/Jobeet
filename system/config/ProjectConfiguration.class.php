<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{

  static protected $zendLoaded = false;
  
  public function setup()
  {
    // Change the web root to match the host server
    $this->setWebDir(dirname($this->getRootDir()).'/httpdocs');
    //sfConfig::set('sf_upload_dir', dirname($this->getRootDir()).'/uploads');
    
    $this->enablePlugins(
      'sfDoctrinePlugin',
      'sfDoctrineGuardPlugin'
    );
  }
  
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('sf_lib_dir').'/vendor'.PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('sf_lib_dir').'/vendor/Zend/Loader/Autoloader.php';
    Zend_Loader_Autoloader::getInstance();
    self::$zendLoaded = true;
  }
  
}
