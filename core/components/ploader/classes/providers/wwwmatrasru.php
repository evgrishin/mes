<?php

require_once(_PS_MODULE_DIR_.'egploader/classes/provider.php');

class wwwmatrasru  extends provider{

    public function isProduct()
    {
        return ;
    }

    public function getProductName(){

        foreach ($this->parser->find('h1') as $e) {
            foreach($e->find('span') as $span) {
                $span->outertext = '';
            }
            $p = trim($e->innertext);
        }
        return $p;
    }

    public function getProductDescription(){

        $description = "";
        $i=1;
        foreach ($this->parser->find('div.item-description-content div.description-body p') as $p){
            if(count($this->parser->find('div.item-description-content div.description-body p'))>$i)
                $description .= "<p>".$p->plaintext."</p>";
            $i++;
        }

        return $description;
    }

    public function getProductFeatures(){
        $features = array();
        foreach ($this->parser->find('table.info-tab tr') as $tr){
            $item = array();
            foreach($tr->find('td') as $td) {
                if($td->class=="define")
                    $item['name'] =  trim($td->plaintext);
                else
                    $item['value'] = trim($td->plaintext);
            }
            $features[] = $item;
        }

        return $features;
    }

    public function getPrice(){

        $price = "";

        if( count($this->parser->find('div.sizes-grid')))
        {
            foreach ($this->parser->find('div.sizes-grid ul li strong, div.sizes-grid ul li a') as $li){
                $t=$li->attr['title'];
                if($t != null){
                    $price_temp = preg_replace('/[^0-9]/', "", str_replace("&thinsp;", "", $t));
                    if($this->discount>0)
                        $price['price'][] = round($price_temp/((100 - $this->discount)/100));
                    else
                        $price['price'][] = $price_temp;
                    $price['sizes'][] = str_replace(" ", "", trim($li->plaintext));
                }
            }

        }

        return $price;
    }

    public function getPriceDiscount(){

        $discount = 0;
        foreach ($this->parser->find('div.discount') as $div){
            $discount = $div->plaintext;
        }
        $discount = trim(str_replace('%', '', str_replace('-', '', $discount)));
        $this->discount = $discount;
        return $discount;
    }

    public function getImages(){
        $images_url = "";
        $i = 0;
        foreach ($this->parser->find('a.various img') as $img){
            $images_url = "https://www.matras.ru".$img->src;
            $i++;
        }
        foreach ($this->parser->find('a.thumb') as $a){
            $images_url .= ",https://www.matras.ru".$a->href;
            $i++;
        }

        return $images_url;
    }

    public function getProductConsistens(){

        $consistence = array();

        foreach ($this->parser->find('div.bottom-container li') as $con){
            $item = array();

            foreach ($con->find('span.extend') as $div){
                $item['name'] = trim(ltrim(trim($div->plaintext), '&mdash;&nbsp;'));
            }

            foreach ($con->find('div.popup-content') as $div){
                $item['description'] = trim($div->plaintext);
            }
            foreach ($con->find('div.layer-info img') as $img){
                $item['image_url'] = "https://www.matras.ru".$img->src;
            }

            $consistence[] = $item;
        }
        return $consistence;
    }

    public function getReviews(){
        return "";
    }

    public function getSitemap($type = "category")
    {
        $result = array();

        if ($type == "category")
            foreach ($this->parser->find('span.pic a') as $a){
                $result[] = "https://www.matras.ru".trim($a->href);
            }
        else
            $result = "";
        return $result;
    }

    public function getMetaTitle(){
        return "not implemented!!";
    }

    public function getMetaDescription(){
        return "not implemented!!";
    }

    public function getMetaKeywords(){
        return "not implemented!!";
    }

    public function getH1(){
        return "not implemented!!";
    }
}