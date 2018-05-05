<?php 
 /*
   Plugin Name: Task
   Plugin URI: http://
  description: Task
   Author: M.osta
   Author URI: http://#
   License: @
   */



 


add_action('init',function(){
//User Crud 
include dirname(__FILE__).'/includes/class-User_admin_menu.php';
include dirname(__FILE__).'/includes/class-User-list-table.php';
include dirname(__FILE__).'/includes/class-form-handler.php';
include dirname(__FILE__).'/includes/user-functions.php';

//Product Crud
include dirname(__FILE__).'/includes/class-product-admin-menu.php';
include dirname(__FILE__).'/includes/class-product-list-table.php';
include dirname(__FILE__).'/includes/product-functions.php';


//Order Crud
    include dirname(__FILE__).'/includes/class-order-admin-menu.php';
    include dirname(__FILE__).'/includes/class-Order-list-table.php';
    include dirname(__FILE__).'/includes/Order-functions.php';



    new User_admin_menu();
    new product_Admin_menu();
    new order_Admin_Menu();
});





?>