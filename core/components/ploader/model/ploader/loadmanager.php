<?php

//TODO: загрузка множественных картинок
//TODO: загрузка множественных коментариев

//TODO: загрузка артикуля
//TODO: загрузка мета информации из темы

//TODO: vendor через template
//TODO: генерировать арнтикль

class loadmanager
{

    public $modx;
    public $config = array();
    public $result;

    private $current_id_load;
    private $load_data;


    function __construct(modX &$modx, array $config = array())
    {

        require_once(MODX_CORE_PATH . 'components/ploader/classes/simple_html_dom.php');

        $this->modx =& $modx;
        $this->config = array(
            'param1' => 1,
            'param2' => 2,
        );
        $this->config = array_merge($this->config, $config);

    }

    private function productExist($id_pproduct)
    {

    }

    public function productCreate($id_pproduct)
    {
        $pproduct = null;
        $params = null;
        if($id_pproduct>0)
            $pproduct = $this->modx->getObject('plPproduct', $id_pproduct);
        if($pproduct){
            $id_product = $pproduct->get('id_product');
            if($id_product>0)
            {
                $this->result['errors'][] = array(
                    'code' => 202,
                    'id_pproduct' => $id_pproduct,
                    'message' => 'Товар уже создан id ='.$id_product);
                return;
            }
            //получение данных темы
            $id_theme = $pproduct->get('id_themee');
            $t = $this->modx->getObject("plPproductTheme", $id_theme);
            $p = json_decode($t->get('params'), true);

            //создаем новый товар
            $data = array( 'class_key' => 'msProduct',
                'pagetitle' => $pproduct->get('name'),
                'longtitle' => $pproduct->get('name'),
                'parent' => $p['category']?$p['category']:$pproduct->get('id_category'),
                'template' => $p['template']);

            $response = $this->modx->runProcessor('resource/create', $data);
            if ($response->isError()) { // Проверка на ошибки
                $this->result['errors'][] = array(
                    'code' => 205,
                    'id_pproduct' => $pproduct->get('id_pproduct'),
                    'message' => 'ошибка при создании товара'); // $modx->error->failure($response->getMessage()) $response->getMessage());
                return;
            }

            //получаем и сохраняем id нового товара
            $id_product = $response->response['object']['id'];
            $pproduct->set('id_product', $id_product);
            $pproduct->save();

            // получаем лоадеры для загрузки прочих данных
            $load_params_field = $pproduct->get('load_params');

            if (!$load_params_field)
                $this->result['errors'][] = array(
                    'code' => 202,
                    'id_pproduct' => $pproduct->get('id_pproduct'),
                    'message' => 'Товара не существует!');
            else{
                $load_params = json_decode($load_params_field, true);

                $this->loadContent($pproduct->get('id_product'), $load_params, $load_params);
            }
        }
        else
            $this->result['errors'][] = array(
                'code' => 201,
                'id_pproduct' => $id_pproduct,
                'message' => 'Товара не существует!');

    }

    private function updateResourseData($resId, $new_date)
    {
        if($doc = $this->modx->getObject('modResource', $resId)){
            $data = $doc->toArray();
            foreach ($new_date as $key => $v)
                $data[$key] = $v;
            $response = $this->modx->runProcessor('resource/update', $data);
            $t = 0;
            //TODO: add error to log
        }
    }

    private function loadContent($id_product, $loads, $load_params, $params = null)
    {
        //TODO: проверка на загрузку нулевого лоадера
        //TODO: удалять старые загружанне данные изображения, характеристики
        //$id_product = $pproduct->get('id_product');
        // сдеать чтобы при обновлении можно было публиковать тоже,'published' => 1
        //$pproduct

        if($load_params['load_name'])
        {
            $this->getContentLoad($loads['load_name'], $params);

            $data = array(
                'pagetitle' => $this->load_data[$loads['load_name']]['product_name'],
                'longtitle' => $this->load_data[$loads['load_name']]['product_name'],
                //'alias' => '','uri' => '' // uncomment for alias update
            );
           $this->updateResourseData($id_product, $data);

        }

        //load_description
        if($load_params['load_description'])
        {
            $this->getContentLoad($loads['load_description'], $params);
            $data = array(
                'content' => $this->load_data[$loads['load_description']]['description'],
            );
            $this->updateResourseData($id_product, $data);

        }

        //load_images
        if($load_params['load_images'])
        {
            // if (is_array($loads['load_images'])
            $this->getContentLoad($loads['load_images'], $params);

            $images_arr = $this->load_data[$loads['load_images']]['product_images'];
            foreach ($images_arr as $image)
            {
                $i = array(
                    'id' => $id_product,
                    'name' => $this->load_data[$loads['load_name']]['product_name'],
                    'file' => $image,
                );
                $response = $this->modx->runProcessor('gallery/upload',
                    $i,
                    array('processors_path' => MODX_CORE_PATH.'components/minishop2/processors/mgr/')
                );
            }


        }

        //load_price
        if($load_params['load_price'])
        {
            $this->getContentLoad($loads['load_price'], $params);

            // обновляем цену
            $data = array(
                'price' => $this->load_data[$loads['load_price']]['price']['price'],
                'old_price' => $this->load_data[$loads['load_price']]['price']['old_price'],
            );
            $this->updateResourseData($id_product, $data);

            //delete модификации
            $this->modx->call('msopModification', 'removeProductModification', array(&$this->modx, $id_product, array(array())));
            //создаем модификации
            $modification = $this->load_data[$loads['load_price']]['price']['modifications'];
            if($modification)
            {
                $this->modx->call('msopModification',
                    'saveProductModification',
                    array(&$this->modx, $id_product, $modification));
            }
        }

        //load_features

        //load_consistions

        //load_reviews

        return 'product created';
    }

    public function getContentLoad($id_load, $params = null)
    {
        $load = $this->modx->getObject('plLoads', $id_load);
        $provider_name = $load->get('provider');

        // если предыдущий провайдер не равен текущему
        if($this->current_id_load != $id_load)
        {
            // получаем данные с провайдера
            require_once(MODX_CORE_PATH . 'components/ploader/classes/providers/' . $provider_name . '.php');
            $provider = new $provider_name($provider_name);

            //получаем контент с учетом кэширования и прокси
            $provider->getContent($load->get('url'), $id_load, "prod", $params['proxy'], $params['cache']);

            $this->current_id_load = $id_load;
            $provider->getAllData();

            // кэшируем изображения
            if($params['image_cache'])
                $provider->saveImagesToCache();

            // доставем картинки из кэша
            // если картинка отсутствует, то тянем из сети
            if($params['cache'])
                $provider->getImagesFromCache();

            //сохраняем характеристики
            $this->featuresSave();

            //сохраняем состав

            //сохраняем отзывы


            $this->load_data[$id_load] = $provider->extractDataResult;
        }
        return $this->load_data[$id_load];
    }

    private function featuresSave()
    {
        foreach ($this->extractDataResult['features'] as $feature)
        {
            // delete old features by load
            //$sql = "DELETE FROM " . _DB_PREFIX_ . "egploader_product_feature WHERE feature_load_name=".$this->extractDataResult['id_load'];
            //$r = Db::getInstance()->executeS($sql);


            // add to map
            $sql = "SELECT * FROM " . _DB_PREFIX_ . "egploader_product_feature_map WHERE provider='".$this->provider."' AND feature_load_name='".$feature['name']."' AND feature_load_value='".$feature['value']."'";
            $r = Db::getInstance()->executeS($sql);
            if(!$r) {
                $sql = "INSERT INTO " . _DB_PREFIX_ . "egploader_product_feature_map(`provider`, `feature_load_name`, `feature_load_value`) VALUES ('".$this->provider."','".$feature['name']."','".$feature['value']."')";
                $r = Db::getInstance()->executeS($sql);
            }

            $sql = "SELECT id_load_feature_map FROM " . _DB_PREFIX_ . "egploader_product_feature_map WHERE provider='".$this->provider."' AND feature_load_name='".$feature['name']."' AND feature_load_value='".$feature['value']."'";
            $id_load_feature_map = Db::getInstance()->getValue($sql);

            if($id_load_feature_map>0){

                $sql = "SELECT * FROM " . _DB_PREFIX_ . "egploader_product_feature WHERE id_load=".$this->extractDataResult['id_load']." AND id_load_feature_map=".$id_load_feature_map."";
                $r = Db::getInstance()->executeS($sql);

                if(!$r) {
                    $sql = "INSERT INTO " . _DB_PREFIX_ . "egploader_product_feature(`id_load`, `id_load_feature_map`, `load_datetime`) VALUES (".$this->extractDataResult['id_load'].",".$id_load_feature_map.", NOW())";
                    $r = Db::getInstance()->execute($sql);
                }

            }

        }

    }

    public function createCache($id_load, $params)
    {

        $load = $this->modx->getObject('plLoads', $id_load);

        $this->getContentLoad($id_load, $params);

        $load->set('url_product_name', $this->load_data[$id_load]['product_name']);
        $load->set('page_type', $this->load_data[$id_load]['page_type']);
        $load->set('load_datetime', date('Y-m-d H:i:s'));
        $load->save();

        $this->result['result'][] = "created cache for id_load = ".$id_load;
    }


    public function updateProductContent($params = null)
    {
        if (!$params)
            return;

        $select = $params['select'];

        $products = $this->modx->getCollection('plPproduct', $select);

        foreach ($products as $product) {

            $id_product = $product->get('id_product');
            if($id_product > 0)
            {
                $loads = json_decode($product->get('load_params'), true);
                $this->loadContent($id_product, $loads, $params['load_params'], $params['params']);
            }
        }
    }



    public function pProductCreate($id_load, $params = null)
    {
        $this->result = array('loads founded' => 0, 'created pproducts' => 0, 'errors' => 0);
        //получаем лоадеры
        if($id_load== null && $params == null)
            // выбираем новых активных закэшированныйх
            $params = array('page_type' => 'PRODUCT', 'id_pproduct' => 0, 'id_category:>' => '0', 'id_manufacturer:>' => '0', 'id_theme:>' => '0', 'active' => 1);

        $loads = $this->getLoads($id_load, $params);
        $this->result['loads founded'] = count($loads);

        foreach ($loads as $load)
        {
            if($load['plLoads_page_type']=='NEW')
            {
                $this->result['errors_log'][] = array(
                    'code' => 401,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'Кэш еще не создан! Создайте кэш!');
                $this->result['errors'] +=1;
                continue;
            }
            // если лоадер
            if ($load['plLoads_id_pproduct']>0)
            {
                $this->result['errors_log'][] = array(
                    'code' => 402,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'Продукт уже существует!');
                $this->result['errors'] +=1;
                continue;
            }

            if ($load['plLoads_id_category']==0)
            {
                $this->result['errors_log'][] = array(
                    'code' => 403,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'Категория не определена!');
                $this->result['errors'] +=1;
                continue;
            }

            if ($load['plLoads_id_manufacturer']==0)
            {
                $this->result['errors_log'][] = array(
                    'code' => 404,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'Производитель не определен!');
                $this->result['errors'] +=1;
                continue;
            }

            if ($load['plLoads_id_theme']==0)
            {
                $this->result['errors_log'][] = array(
                    'code' => 405,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'Не указана тема загрузки!');
                $this->result['errors'] +=1;
                continue;
            }

            if ($load['plLoads_active']==0)
            {
                $this->result['errors_log'][] = array(
                    'code' => 406,
                    'id_load' => $load['plLoads_id_load'],
                    'product_name' => $load['plLoads_url_product_name'],
                    'provider' => $load['plLoads_provider'],
                    'message' => 'не активен!');
                $this->result['errors'] +=1;
                continue;
            }
            $new_id = $this->addPproduct($load['plLoads_id_load'], $load['plLoads_url_product_name'], $load['plLoads_id_category'],$load['plLoads_id_manufacturer'],$load['plLoads_id_theme']);
            $o = $this->modx->getObject('plLoads', $load['plLoads_id_load']);
            $o->set('id_pproduct', $new_id);
            $o->save();
            $this->result['created pproducts'] += 1;
        }

    }

    private function addPproduct($id_load, $name, $id_category, $id_manufacturer, $id_theme)
    {
        $table = $this->modx->getTableName('plPproduct');

        $sql = "INSERT INTO {$table} (`name`, `id_product`, `id_category`, `id_manufacturer`, `id_theme`, `load_params`, `load_datetime`, `active`) 
                                    VALUES (:name, :id_product, :id_category, :id_manufacturer, :id_theme, :load_params, :load_datetime, :active);";
        $stmt = $this->modx->prepare($sql);

        $load_params = json_encode(array(
                'load_name' => $id_load,
                'load_description' => $id_load,
                'load_price' => $id_load,
                'load_images' => $id_load,
                'load_features' => $id_load,
                'load_consistions' => $id_load,
                'load_reviews' => $id_load));

        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':id_product', 0);
        $stmt->bindValue(':id_category', $id_category);
        $stmt->bindValue(':id_manufacturer', $id_manufacturer);
        $stmt->bindValue(':id_theme', $id_theme);
        $stmt->bindValue(':load_params', $load_params);
        $stmt->bindValue(':load_datetime', date('Y-m-d H:i:s'));
        $stmt->bindValue(':active', 1);

        $stmt->execute();

        $stmt->closeCursor();

        return $this->modx->lastInsertId();

    }

    public function loadConnectors($provider_name, $id_connector = null, $params = null)
    {
        $this->result = array('connectors' => 0, 'founded' => 0, 'added' => 0, 'exists' => 0);
        //получаем коннектор или коннекторы по одному провайщдеру
        $connectors = $this->getConnectors($provider_name, $id_connector);

        $this->result['connectors'] += count($connectors);

        // получить коллекцию для закгрузки
        require_once(MODX_CORE_PATH . 'components/ploader/classes/providers/' . $provider_name . '.php');

        $loads = array();
        $provider = new $provider_name($provider_name);

        // перебираем коннекторы
        foreach ($connectors as $connector) {
            //получаем контент с учетом кэширования и прокси
            $provider->getContent($connector['plConnectors_url_sitemap'], $connector['plConnectors_id_connecter'], "conn", $params['proxy'], $params['cache']);
            //если контент ок
            if(!$provider->errors){
                $loads_tmp = $provider->getSitemap();//$connector['plConnectors_connection_type']);
                $loads = array_merge($loads, $loads_tmp);
            }
            else
                $this->result['errors'][]=$provider->errors;

        }

        $this->result['founded'] += count($loads);
        // перебираем коллекцию
        foreach ($loads as $url) {

            //если урла нет, то добавляем его
            if(!$this->getLoads(null, array('url' => $url)))
            {
                $this->addLoad($url, $provider_name);
            }else
                $this->result['exists'] += 1;
        }
    }



    private function addLoad($url, $provider)
    {
        $table = $this->modx->getTableName('plLoads');

        $sql = "INSERT INTO {$table} (`url`, `page_type`, `id_pproduct`, `url_product_name`,
                                    `provider`, `id_category`, `id_manufacturer`, `exist_url`, `load_datetime`, `active`) 
                                    VALUES (:url, :page_type, :id_pproduct, :url_product_name, :provider, 
                                    :id_category, :id_manufacturer, :exist_url, :active);";
        $stmt = $this->modx->prepare($sql);

        $stmt->bindValue(':url', $url);
        $stmt->bindValue(':page_type', 'NEW');
        $stmt->bindValue(':id_pproduct', 0);
        $stmt->bindValue(':url_product_name', '-');
        $stmt->bindValue(':provider', $provider);
        $stmt->bindValue(':id_category', 0);
        $stmt->bindValue(':id_manufacturer', 0);
        $stmt->bindValue(':load_datetime', date('Y-m-d H:i:s'));
        $stmt->bindValue(':exist_url', 1);
        $stmt->bindValue(':active', 1);

        $stmt->execute();

        $stmt->closeCursor();

        $this->result['added'] += 1;
    }

    public function getConnectors($provider, $id_connector=null)
    {
        $restiction = array( 'provider' => $provider);
        if($id_connector!=null)
            $restiction = array_merge($restiction,array('id_connecter'=> $id_connector));

        $q = $this->modx->newQuery('plConnectors');
        $q->where($restiction);
        $a = array();
        if ($q->prepare() && $q->stmt->execute()) {
            while ($row = $q->stmt->fetch(PDO::FETCH_ASSOC)) {
                    $a[] = $row;
            }
        }
        return $a;
    }

    private function getLoads($id_load=null, $params=null)
    {
        $restiction = array();

        if($id_load!=null)
            $restiction = array( 'id_load' => $id_load);

        if($params!=null)
            $restiction = array_merge($restiction, $params);

        $q = $this->modx->newQuery('plLoads');
        $q->where($restiction);
        $a = array();
        if ($q->prepare() && $q->stmt->execute()) {
            while ($row = $q->stmt->fetch(PDO::FETCH_ASSOC)) {
                $a[] = $row;
            }
        }
        return $a;
    }
}