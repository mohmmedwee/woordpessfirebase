<div class="wrap">
    <h1><?php _e( 'Add product', 'wedevs' ); ?></h1>

    <?php $item = product_get_product( $id ); ?>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-name">
                    <th scope="row">
                        <label for="name"><?php _e( 'name', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="<?php echo esc_attr( $item->name ); ?>" required="required" />
                        <span class="description"><?php _e('name', 'wedevs' ); ?></span>
                    </td>
                </tr>
                <tr class="row-description">
                    <th scope="row">
                        <label for="description"><?php _e( 'description', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="description" id="description" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="<?php echo esc_attr( $item->description ); ?>" required="required" />
                        <span class="description"><?php _e('description', 'wedevs' ); ?></span>
                    </td>
                </tr>
                <tr class="row-qty">
                    <th scope="row">
                        <label for="qty"><?php _e( 'qty', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="qty" id="qty" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="<?php echo esc_attr( $item->qty ); ?>" required="required" />
                        <span class="description"><?php _e('qty', 'wedevs' ); ?></span>
                    </td>
                </tr>
                <tr class="row-price">
                    <th scope="row">
                        <label for="price"><?php _e( 'price', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="price" id="price" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="<?php echo esc_attr( $item->price ); ?>" required="required" />
                        <span class="description"><?php _e('price', 'wedevs' ); ?></span>
                    </td>
                </tr>
             </tbody>
        </table>
        <input type="hidden" id="id"  value="<?php echo $id?>" >

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( 'product-new' ); ?>
<!--         <?php submit_button( __( 'update', 'wedevs' ), 'primary', 'product' ); ?>
 -->

 <input type="submit" name="product" id="product" class="button button-primary" value="update" onclick="writeUserData()">
    </form>
</div>

<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>

<script type="text/javascript">
    
  var config = {
    apiKey: "AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE",
    authDomain: "task-dc988.firebaseapp.com",
    databaseURL: "https://task-dc988.firebaseio.com",
    projectId: "task-dc988",
    storageBucket: "task-dc988.appspot.com",
    messagingSenderId: "190470884732"
  };
  firebase.initializeApp(config);
    var database = firebase.database();

    function writeUserData() {
       
     Id =  document.getElementById('id').value;
    name = document.getElementById('name').value;
    description = document.getElementById('description').value;
    qty = document.getElementById('qty').value;
    price=document.getElementById('price').value;
     adaRef =  firebase.database().ref("product").child(Id);
     adaRef.child("id").set(Id)
     adaRef.child("name").set(name) 
     adaRef.child("description").set(description)     
     adaRef.child("qty").set(qty)
     adaRef.child("price").set(price)
   


}




</script>