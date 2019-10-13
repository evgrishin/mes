<?php

$request = array(
  'select' => array(
      //'provider' => 'wwwmatrasru',
      'id_connecter' => 45
  ),
  'params' => array(
      'proxy' => false,
      'cache' => true,
  )
);
//#############################################################################
define('MODX_API_MODE', true);
require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/index.php';
require_once(MODX_CORE_PATH . 'components/ploader/model/ploader/loadmanager.php');

$modx->loadClass('plConnectors', MODX_CORE_PATH.'components/ploader/model/ploader/');
$modx->loadClass('plLoads', MODX_CORE_PATH.'components/ploader/model/ploader/');

//###############################################################################

$manager = new loadmanager($modx);
$loads = $modx->getCollection('plConnectors', $request['select']);

foreach ($loads as $load) {
    $manager->loadConnectors($load->get('provider'), $load->get('id_connecter'), $request['params']);
    print 'connector '.$load->get('id_connecter'). '; found: '. $manager->result['founded']. '; exist: '. $manager->result['exists'].'; added: '. $manager->result['added']."\n";
    if($manager->result['errors'])
        foreach ($manager->result['errors'] as $r)
            print '     ERROR: code '.$r['code']. '; message: '. $r['message']. '; url: '. $r['url']."\n";

}


