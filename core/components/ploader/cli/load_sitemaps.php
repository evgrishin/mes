<?php

$provider = "omatrasru";
$id_connector = null;
$id_load = null;
//#############################################################################
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';
require_once(MODX_CORE_PATH . 'components/ploader/model/ploader/loadmanager.php');

$modx->loadClass('plConnectors', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plLoads', MODX_CORE_PATH.'components/ploader/model/ploader/');

//###############################################################################

$manager = new loadmanager($modx);
$manager->loadConnectors($provider, $id_load, array('cache' => true));

print_r($manager->result);

