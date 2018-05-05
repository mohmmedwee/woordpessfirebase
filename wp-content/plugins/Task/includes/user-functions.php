<?php

use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;

define('DEFAULT_URL', 'https://task-dc988.firebaseio.com');
define('DEFAULT_TOKEN', 'AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE');
define('DEFAULT_PATH', '/task-dc988/');

/**
 * Get all User
 *
 * @param $args array
 *
 * @return array
 */
function user_task_get_all_User($args = array())
{

    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
    $firebase = (new Factory)
        ->withServiceAccount($serviceAccount)
        ->create();
    $database = $firebase->getDatabase();
    $reference = $database->getReference('users');
    $snapshot = $reference->getSnapshot();
    $value = $reference->getValue();

    global $wpdb;

    $defaults = array(
        'number' => 20,
        'offset' => 0,
        'orderby' => 'id',
        'order' => 'ASC',
    );
//
//    $args = wp_parse_args($args, $defaults);
//    $cache_key = 'User-all';
//    $items = wp_cache_get($cache_key, 'wedevs');
//
//    if (false === $items) {
//        $items = $wpdb->get_results('SELECT * FROM ' . $wpdb->prefix . 'user_task ORDER BY ' . $args['orderby'] . ' ' . $args['order'] . ' LIMIT ' . $args['offset'] . ', ' . $args['number']);
//
//        wp_cache_set($cache_key, $items, 'wedevs');
//    }
    return $value;
}

/**
 * Fetch all User from database
 *
 * @return array
 */
function user_task_get_User_count()
{
    global $wpdb;

    return (int)0;
}

/**
 * Fetch a single User from database
 *
 * @param int $id
 *
 * @return array
 */
function user_task_get_User($id = 0)
{


    global $wpdb;

    return $wpdb->get_row($wpdb->prepare('SELECT * FROM ' . $wpdb->prefix . 'user_task WHERE id = %d', $id));
}

/**
 * Insert a new user
 *
 * @param array $args
 */
function user_insert_user($args = array())
{
    global $wpdb;


    $defaults = array(
        'id' => null,
        'name' => '',
        'phone' => '',
        'email' => '',
        'website' => '',
        'website' => '',

    );

    $args = wp_parse_args($args, $defaults);
    $table_name = $wpdb->prefix . 'user_task';

    // some basic validation
    if (empty($args['name'])) {
        return new WP_Error('no-name', __('No name provided.', 'wedevs'));
    }
    if (empty($args['phone'])) {
        return new WP_Error('no-phone', __('No phone provided.', 'wedevs'));
    }
    if (empty($args['email'])) {
        return new WP_Error('no-email', __('No email provided.', 'wedevs'));
    }
    if (empty($args['website'])) {
        return new WP_Error('no-website', __('No website provided.', 'wedevs'));
    }

    // remove row id to determine if new or update
    $row_id = (int)$args['id'];
//    unset($args['id']);

    if (!$row_id) {
        $args['date'] = current_time('mysql');
        $args['id']= rand(100000,999999);
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('users/')->getChild($args['id'])->set($args);

        // insert a new
        if ($wpdb->insert($table_name, $args)) {
            return $wpdb->insert_id;
        }

    } else {

        $args['date'] = current_time('mysql');
        $serviceAccount = ServiceAccount::fromJsonFile(__DIR__ . '/firebase2/src/firbas.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();
        $database = $firebase->getDatabase();
        $database->getReference('users/')->getChild($args['id'])->set($args);
        // do update method here
        if ($wpdb->update($table_name, $args, array('id' => $row_id))) {
            return $row_id;
        }
    }

    return false;
}