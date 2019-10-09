<?php
$xpdo_meta_map['plPproductFeatureMap']= array (
  'package' => 'ploader',
  'version' => '1.1',
  'table' => 'pl_pproduct_feature_map',
  'extends' => 'xPDOObject',
  'fields' => 
  array (
    'id_load_feature_map' => NULL,
    'provider' => NULL,
    'feature_load_name' => NULL,
    'feature_load_value' => NULL,
    'id_feature' => NULL,
    'id_feature_value' => NULL,
    'active' => 1,
  ),
  'fieldMeta' => 
  array (
    'id_load_feature_map' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'index' => 'pk',
      'generated' => 'native',
    ),
    'provider' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '20',
      'phptype' => 'string',
      'null' => false,
    ),
    'feature_load_name' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '150',
      'phptype' => 'string',
      'null' => false,
    ),
    'feature_load_value' => 
    array (
      'dbtype' => 'varchar',
      'precision' => '150',
      'phptype' => 'string',
      'null' => false,
    ),
    'id_feature' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'id_feature_value' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
    ),
    'active' => 
    array (
      'dbtype' => 'int',
      'precision' => '11',
      'phptype' => 'integer',
      'null' => false,
      'default' => 1,
    ),
  ),
  'indexes' => 
  array (
    'PRIMARY' => 
    array (
      'alias' => 'PRIMARY',
      'primary' => true,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'id_load_feature_map' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
    'id_load_feature_map' => 
    array (
      'alias' => 'id_load_feature_map',
      'primary' => false,
      'unique' => true,
      'type' => 'BTREE',
      'columns' => 
      array (
        'id_load_feature_map' => 
        array (
          'length' => '',
          'collation' => 'A',
          'null' => false,
        ),
      ),
    ),
  ),
);
