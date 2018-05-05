<?php

/**
 * Admin Menu
 */
class User_admin_menu {

    /**
     * Kick-in the class
     */
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Add menu items
     *
     * @return void
     */
    public function admin_menu() {

        /** Top Menu **/
        add_menu_page( __( 'Task', 'wedevs' ), __( 'Task', 'wedevs' ), 'manage_options', 'userslist', array( $this, 'plugin_page' ), 'dashicons-groups', null );

        add_submenu_page( 'userslist', __( 'Users', 'wedevs' ), __( 'Users', 'wedevs' ), 'manage_options', 'userslist', array( $this, 'plugin_page' ) );


         add_submenu_page( 'userslist', __( 'Product', 'wedevs' ), __( 'Product', 'wedevs' ), 'manage_options', 'product', array( $this, 'plugin_page' ) );

         add_submenu_page( 'userslist', __( 'Orders', 'wedevs' ), __( 'Orders', 'wedevs' ), 'manage_options', 'userslist', array( $this, 'plugin_page' ) );

         add_submenu_page( 'userslist', __( 'Analystic', 'wedevs' ), __( 'Analystic', 'wedevs' ), 'manage_options', 'userslist', array( $this, 'plugin_page' ) );
    }

    /**
     * Handles the plugin page
     *
     * @return void
     */
    public function plugin_page() {
            global $wpdb;
            $table_name = $wpdb->prefix . 'user_task';


        $action = isset( $_GET['action'] ) ? $_GET['action'] : 'list';
        $id     = isset( $_GET['id'] ) ? intval( $_GET['id'] ) : 0;

        switch ($action) {
            case 'view':

                $template = dirname( __FILE__ ) . '/views/users1-single.php';
                break;

            case 'edit':
                $template = dirname( __FILE__ ) . '/views/users1-edit.php';
                break;
            case 'new':
                $template = dirname( __FILE__ ) . '/views/users1-new.php';
                break;


            case 'delete':
              $template = dirname( __FILE__ ) . '/views/users1-remove.php';
                break;
            default:
                $template = dirname( __FILE__ ) . '/views/users1-list.php';
                break;
        }

        if ( file_exists( $template ) ) {
            include $template;
        }
    }

    
}