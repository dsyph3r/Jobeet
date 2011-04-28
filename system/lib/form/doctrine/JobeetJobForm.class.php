<?php

/**
 * JobeetJob form.
 *
 * @package    jobeet
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class JobeetJobForm extends BaseJobeetJobForm
{
  
  public function configure()
  {
    
    unset(
      $this['created_at'],
      $this['updated_at'],
      $this['expires_at'],
      $this['is_activated'],
      $this['token']
    );
    
    // Can be used to add fields instead of unsetting them, also the order can be defined by the order of the array
    //$this->useFields(array('category_id', 'type', 'company', 'logo', 'url', 'position', 'location', 'description', 'how_to_apply', 'is_public', 'email'));
  
    $this->widgetSchema['type'] = new sfWidgetFormChoice(array(
      'choices'  => Doctrine_Core::getTable('JobeetJob')->getTypes(),
      'expanded' => true,
    ));
    $this->widgetSchema['logo'] = new sfWidgetFormInputFile(array(
      'label' => 'Company logo',
    ));
    
    // Add new validator for email to the existing one - this way we dont loose the validator that was
    // generated from the schema
    $this->validatorSchema['email'] = new sfValidatorAnd(array(
      $this->validatorSchema['email'],    // Reference the current validator
      new sfValidatorEmail(),             // Add the new custom one
    ));
    $this->validatorSchema['type'] = new sfValidatorChoice(array(
      'choices' => array_keys(Doctrine_Core::getTable('JobeetJob')->getTypes()),
    ));
    $this->validatorSchema['logo'] = new sfValidatorFile(array(
      'required'   => false,
      'path'       => sfConfig::get('sf_upload_dir').'/jobs',
      'mime_types' => 'web_images',
    ));
    
    $this->widgetSchema->setLabels(array(
      'category_id'    => 'Category',
      'is_public'      => 'Public?',
      'how_to_apply'   => 'How to apply?',
    ));
    
    $this->widgetSchema->setHelp('is_public', 'Whether the job can also be published on affiliate websites or not.');
    
    $this->widgetSchema->setNameFormat('job[%s]');
    
  }
  
}
