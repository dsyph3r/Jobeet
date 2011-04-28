<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // Change the web root to match the host server
    $this->setWebDir(dirname($this->getRootDir()).'/httpdocs');
    //sfConfig::set('sf_upload_dir', dirname($this->getRootDir()).'/uploads');
    
    $this->enablePlugins('sfDoctrinePlugin');
  }
}
