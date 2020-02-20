<?php

/**
 * Created by PhpStorm.
 * User: Vanand Mkrtchyan
 * Date: 4/24/2017
 * Time: 1:45 PM
 */

class ProductExport
{
    protected static $instance = null;
    protected $type = null;
    protected $filename = null;

    protected $fields = [
        'id',
        'title',
        'description',
        'google product category',
        'product type',
        'link',
        'image link',
        'condition',
        'availability',
        'price',
        'sale price',
        'sale price effective date',
        'gtin',
        'brand',
        'mpn',
        'item group id',
        'gender',
        'age group',
        'color',
        'size',
        'shipping',
        'shipping weight',
    ];

    public static function init()
    {

        ProductExport::$instance = new static();
        $GLOBALS['PExport'] = ProductExport::$instance;
        if ( isset($_GET['pagename']) &&$_GET['pagename'] == 'export' ) {
            ProductExport::$instance->type = (!empty($_GET['platform'])) ? $_GET['platform'] : 'google';
            ProductExport::$instance->render();
            exit();
        }
        
    }


    public function render()
    {
        $type = $this->type .'Render';

        if (method_exists($this,$type)){
            $this->filename = 'google-feed.csv';
            return $this->$type();
        }
        throw new BadMethodCallException('Platform not found');
    }

    protected function googleRender(){

        $output_handle = @fopen( 'php://output', 'w' );

        $this->setHeaders();
        $this->setFeed($output_handle);

        fclose( $output_handle );

    }

    protected  function setHeaders(){
        header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
        header( 'Content-Description: File Transfer' );
        header( 'Content-type: text/csv' );
        header( 'Content-Disposition: attachment; filename=' . $this->filename );
        header( 'Expires: 0' );
        header( 'Pragma: public' );
    }

    protected function setFeed($output_handle){
        $products = get_posts([
            'post_type' => 'product',
            'posts_per_page' => -1
        ]);

        if (empty($products)){
            return false;
        }

        // defining titles row
        $row = [];
        foreach ($this->fields as $field){
            $row[] = $field;
        }
        fputcsv( $output_handle, $row );

        // defining values rows

        foreach ($products as $post){
            $product = new WC_Product($post->ID);
            $taxonomies = array_merge(get_the_terms($post->ID,'provider'),get_the_terms($post->ID,'coverage'));
            $title = $product->get_title();
            $id = $product->id .'_'. rand(100,999);
            $row = [
                /*'id',*/                           $id,
                /*'title',*/                        $title,
                /*'description',*/                  strip_tags($post->post_content),
                /*'google product category',*/      'Electronics > Electronics Accessories > Signal Boosters',
                /*'product type',*/                 'Electronics > Electronics Accessories > Signal Boosters',
                /*'link',*/                         get_permalink($product->id),
                /*'image link',*/                   get_the_post_thumbnail_url($product->id),
                /*'condition',*/                    'new',
                /*'availability',*/                 'in stock',
                /*'price',*/                        $product->regular_price,
                /*'sale price',*/                   $product->sale_price,
                /*'sale price effective date',*/    '',
                /*'gtin',*/                         $id,
                /*'brand',*/                        'Mobile Boosters',
                /*'mpn',*/                          '',
                /*'item group id',*/                '',
                /*'gender',*/                       '',
                /*'age group',*/                    '',
                /*'color',*/                        '',
                /*'size',*/                         '',
                /*'shipping',*/                     'Free',
                /*'shipping weight',*/              '',

            ];
            fputcsv( $output_handle, $row );
            foreach ($taxonomies as $taxonomy) {
                $title = $taxonomy->name .' Mobile Phone Signal Booster';
                $id = $product->id .'_'. rand(100,999);
                $row = [
                    /*'id',*/                           $id,
                    /*'title',*/                        $title,
                    /*'description',*/                  strip_tags($post->post_content),
                    /*'google product category',*/      'Electronics > Electronics Accessories > Signal Boosters',
                    /*'product type',*/                 'Electronics > Electronics Accessories > Signal Boosters',
                    /*'link',*/                         get_permalink($product->id),
                    /*'image link',*/                   get_the_post_thumbnail_url($product->id),
                    /*'condition',*/                    'new',
                    /*'availability',*/                 'in stock',
                    /*'price',*/                        $product->regular_price,
                    /*'sale price',*/                   $product->sale_price,
                    /*'sale price effective date',*/    '',
                    /*'gtin',*/                         $id,
                    /*'brand',*/                        'Mobile Boosters',
                    /*'mpn',*/                          '',
                    /*'item group id',*/                '',
                    /*'gender',*/                       '',
                    /*'age group',*/                    '',
                    /*'color',*/                        '',
                    /*'size',*/                         '',
                    /*'shipping',*/                     'Free',
                    /*'shipping weight',*/              '',

                ];

                fputcsv( $output_handle, $row );
            }
        }
    }
}

add_action( 'init', array('ProductExport', 'init') );
