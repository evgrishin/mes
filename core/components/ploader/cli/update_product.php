<?php

    $params = array(
        'select'=> array(
            'id_pproduct' => 4
        ),
        'load_params' => array(
            'load_name' => false,
            'load_description' => false,
            'load_price' => false,
            'load_images' => true,
            'load_features' => false,
            'load_consistions' => false,
            'load_reviews' => false,
        ),
        'params' => array(
            'proxy' => null,
            'cache' => true,
        ),
    );
//$params=array();

//###########################################################################################################
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';
require_once(MODX_CORE_PATH . 'components/ploader/model/ploader/loadmanager.php');

$modx->loadClass('plConnectors', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plLoads', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plPproduct', MODX_CORE_PATH.'components/ploader/model/ploader/');


//#########################################################################################################

$manager = new loadmanager($modx);
$manager->updateProductContent($params);
print_r($manager->result);
