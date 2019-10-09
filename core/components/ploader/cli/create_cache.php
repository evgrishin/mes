<?php
//TODO: сделать умную загрузку
//TODO: добавить симуляцию и логирование

$id_load = 26962;
$params = array(
    'image_cache' => true,
    'proxy' => null,
);

//###########################################################################################################
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';
require_once(MODX_CORE_PATH . 'components/ploader/model/ploader/loadmanager.php');

$modx->loadClass('plConnectors', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plLoads', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plPproduct', MODX_CORE_PATH.'components/ploader/model/ploader/');


//#########################################################################################################

$manager = new loadmanager($modx);
$manager->createCache($id_load, $params);
print_r($manager->result);
