<?php
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

define('DEFAULT_URL', 'https://task-dc988.firebaseio.com');
define('DEFAULT_TOKEN', 'AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE');
define('DEFAULT_PATH', '/task-dc988/');
/**
 * Get all Order
 *
 * @param $args array
 *
 * @return array
 */
function order_get_all_Order( $args = array() ) {

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $database = $firebase->getDatabase();
    $reference = $database->getReference('order');
    $snapshot = $reference->getSnapshot();
    $value = $reference->getValue();



    global $wpdb;

    $defaults = array(
        'number'     => 20,
        'offset'     => 0,
        'orderby'    => 'id',
        'order'      => 'ASC',
    );

    $args      = wp_parse_args( $args, $defaults );
    $cache_key = 'Order-all';
    $items     = wp_cache_get( $cache_key, 'wedevs' );

    if ( false === $items ) {
        $items = $wpdb->get_results( 'SELECT * FROM ' . $wpdb->prefix . 'order ORDER BY ' . $args['orderby'] .' ' . $args['order'] .' LIMIT ' . $args['offset'] . ', ' . $args['number'] );

        wp_cache_set( $cache_key, $items, 'wedevs' );
    }

    return $value;
}

/**
 * Fetch all Order from database
 *
 * @return array
 */
function order_get_Order_count() {
    global $wpdb;

    return (int) $wpdb->get_var( 'SELECT COUNT(*) FROM ' . $wpdb->prefix . 'order' );
}

/**
 * Fetch a single Order from database
 *
 * @param int   $id
 *
 * @return array
 */
function order_get_Order( $id = 0 ) {
    global $wpdb;

    return $wpdb->get_row( $wpdb->prepare( 'SELECT * FROM ' . $wpdb->prefix . 'order WHERE id = %d', $id ) );
}

/**
 * Insert and update Order
 *
 * @param $args array

 */
function Order_insert_order( $args = array() ) {
    global $wpdb;

    $defaults = array(
        'id'         => null,
        'product_id' => '',
        'user_id' => '',
        'total' => '',
        'username'=>'',
        'product_name'=>'',

    );

    $args       = wp_parse_args( $args, $defaults );
    $table_name = $wpdb->prefix .'order';

    // some basic validation
    if ( empty( $args['product_id'] ) ) {
        return new WP_Error( 'no-product_id', __( 'No Product provided.', 'wedevs' ) );
    }
    if ( empty( $args['user_id'] ) ) {
        return new WP_Error( 'no-user_id', __( 'No User provided.', 'wedevs' ) );
    }
    if ( empty( $args['total'] ) ) {
        return new WP_Error( 'no-total', __( 'No total provided.', 'wedevs' ) );
    }

    // remove row id to determine if new or update
    $row_id = (int) $args['id'];
//    unset( $args['id'] );

    if ( ! $row_id ) {


        $args['date'] = date("Y-m-d");
        $args['id']= rand(100000,999999);
        $args['username'] = $_POST['username'];
        $args['product_name'] = $_POST['prodcut_name'];
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('order/')->getChild($args['id'])->set($args);
        unset($args['username'] ,
        $args['product_name']
    );
        // insert a new
        if ( $wpdb->insert( $table_name, $args ) ) {
            return $wpdb->insert_id;
        }

    } else {


        $args['date'] = date("Y-m-d");
        $args['username'] = $_POST['username'];
        $args['product_name'] = $_POST['prodcut_name'];
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('order/')->getChild($args['id'])->set($args);
        // do update method here
        if ( $wpdb->update( $table_name, $args, array( 'id' => $row_id ) ) ) {
            return $row_id;
        }
    }

    return false;
}
