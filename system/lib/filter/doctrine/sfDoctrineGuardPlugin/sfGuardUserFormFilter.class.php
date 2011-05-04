<?php

/**
 * sfGuardUser filter form.
 *
 * @package    jobeet
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
    unset(
      $this['password'],
      $this['salt'],
      $this['algorithm'],
      $this['created_at'],
      $this['updated_at']
    );
  }
  
}
