<?php

/**
 * Handle the form submissions
 *
 * @package Package
 * @subpackage Sub Package
 */
class Form_Handler {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the user new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['submit_user'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'user-new' ) ) {
            die( __( 'Are you cheating?', 'wedevs' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'wedevs' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=userslist' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $phone = isset( $_POST['phone'] ) ? sanitize_text_field( $_POST['phone'] ) : '';
        $email = isset( $_POST['email'] ) ? sanitize_text_field( $_POST['email'] ) : '';
        $website = isset( $_POST['website'] ) ? sanitize_text_field( $_POST['website'] ) : '';
        $website = isset( $_POST['website'] ) ? sanitize_text_field( $_POST['website'] ) : '';

        // some basic validation
        if ( ! $name ) {
            $errors[] = __( 'Error: name is required', 'wedevs' );
        }

        if ( ! $phone ) {
            $errors[] = __( 'Error: phone is required', 'wedevs' );
        }

        if ( ! $email ) {
            $errors[] = __( 'Error: email is required', 'wedevs' );
        }

        if ( ! $website ) {
            $errors[] = __( 'Error: website is required', 'wedevs' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'website' => $website,
            'website' => $website,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = user_insert_user( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = user_insert_user( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler();




class Form_Handler1 {

    /**
     * Hook 'em all
     */
    public function __construct() {
        add_action( 'admin_init', array( $this, 'handle_form' ) );
    }

    /**
     * Handle the product new and edit form
     *
     * @return void
     */
    public function handle_form() {
        if ( ! isset( $_POST['product'] ) ) {
            return;
        }

        if ( ! wp_verify_nonce( $_POST['_wpnonce'], 'product-new' ) ) {
            die( __( 'Are you cheating?', 'wedevs' ) );
        }

        if ( ! current_user_can( 'read' ) ) {
            wp_die( __( 'Permission Denied!', 'wedevs' ) );
        }

        $errors   = array();
        $page_url = admin_url( 'admin.php?page=product' );
        $field_id = isset( $_POST['field_id'] ) ? intval( $_POST['field_id'] ) : 0;

        $name = isset( $_POST['name'] ) ? sanitize_text_field( $_POST['name'] ) : '';
        $description = isset( $_POST['description'] ) ? sanitize_text_field( $_POST['description'] ) : '';
        $qty = isset( $_POST['qty'] ) ? sanitize_text_field( $_POST['qty'] ) : '';
        $price = isset( $_POST['price'] ) ? sanitize_text_field( $_POST['price'] ) : '';

        // some basic validation
        if ( ! $name ) {
            $errors[] = __( 'Error: name is required', 'wedevs' );
        }

        if ( ! $description ) {
            $errors[] = __( 'Error: description is required', 'wedevs' );
        }

        if ( ! $qty ) {
            $errors[] = __( 'Error: qty is required', 'wedevs' );
        }

        if ( ! $price ) {
            $errors[] = __( 'Error: price is required', 'wedevs' );
        }

        // bail out if error found
        if ( $errors ) {
            $first_error = reset( $errors );
            $redirect_to = add_query_arg( array( 'error' => $first_error ), $page_url );
            wp_safe_redirect( $redirect_to );
            exit;
        }

        $fields = array(
            'name' => $name,
            'description' => $description,
            'qty' => $qty,
            'price' => $price,
        );

        // New or edit?
        if ( ! $field_id ) {

            $insert_id = product_insert_product( $fields );

        } else {

            $fields['id'] = $field_id;

            $insert_id = product_insert_product( $fields );
        }

        if ( is_wp_error( $insert_id ) ) {
            $redirect_to = add_query_arg( array( 'message' => 'error' ), $page_url );
        } else {
            $redirect_to = add_query_arg( array( 'message' => 'success' ), $page_url );
        }

        wp_safe_redirect( $redirect_to );
        exit;
    }
}

new Form_Handler1();