<?php

require_once(dirname(__FILE__).'/../system/config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('backend', 'dev', true);
sfContext::createInstance($configuration)->dispatch();
