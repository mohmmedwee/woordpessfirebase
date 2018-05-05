<?php

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

define('DEFAULT_URL', 'https://task-dc988.firebaseio.com');
define('DEFAULT_TOKEN', 'AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE');
define('DEFAULT_PATH', '/task-dc988/');
/**
 * Get all product
 *
 * @param $args array
 *
 * @return array
 */
function product_get_all_product( $args = array() ) {

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $database = $firebase->getDatabase();
    $reference = $database->getReference('product');
    $snapshot = $reference->getSnapshot();
    $value = $reference->getValue();


    global $wpdb;

//    $defaults = array(
//        'number'     => 20,
//        'offset'     => 0,
//        'orderby'    => 'id',
//        'order'      => 'ASC',
//    );
//
//    $args      = wp_parse_args( $args, $defaults );
//    $cache_key = 'product-all';
//    $items     = wp_cache_get( $cache_key, 'wedevs' );
//
//    if ( false === $items ) {
//        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'product ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );
//
//        wp_cache_set( $cache_key, $items, 'wedevs' );
//    }

    return $value;
}

/**
 * Fetch all product from database
 *
 * @return array
 */
function product_get_product_count() {
    global $wpdb;

    return (int) 0;
}

/**
 * Fetch a single product from database
 *
 * @param int   $id
 *
 * @return array
 */
function product_get_product( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'product WHERE id = %d', $id ) );
}


/**
 * Insert a new product
 *
 * @param array $args
 */
function product_insert_product( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'name' => '',
        'description' => '',
        'qty' => '',
        'price' => '',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix . 'product';

    // some basic validation
    if ( empty( $args['name'] ) ) {
        return new WP_Error( 'no-name', __( 'No name provided.', 'wedevs' ) );
    }
    if ( empty( $args['description'] ) ) {
        return new WP_Error( 'no-description', __( 'No description provided.', 'wedevs' ) );
    }
    if ( empty( $args['qty'] ) ) {
        return new WP_Error( 'no-qty', __( 'No qty provided.', 'wedevs' ) );
    }
    if ( empty( $args['price'] ) ) {
        return new WP_Error( 'no-price', __( 'No price provided.', 'wedevs' ) );
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
//    unset( $args['id'] );

    if ( ! $row_id ) {

        $args['date'] = date("Y-m-d");
        $args['id']= rand(100000,999999);
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('product/')->getChild($args['id'])->set($args);

        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {

        $args['date'] =date("Y-m-d");
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('product/')->getChild($args['id'])->set($args);

        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}