<div class="wrap">
    <h1><?php _e( 'Add new Order', 'wedevs' ); ?></h1>

    <?php $item = Order_get_order( $id ); ?>

    <form action="" method="post" id="form_produt">

        <table class="form-table">
            <tbody>
            <tr class="row-product-id">
                <th scope="row">
                    <label for="product_id"><?php _e( 'Product', 'wedevs' ); ?></label>
                </th>
                <td>
                    <select name="product_id" id="product_id" required="required">
<!--                        <option value="" --><?php //selected( $item->product_id, '' ); ?><!-->--><?php //echo __( '', 'wedevs' ); ?><!--</option>-->
                    </select>
                    <span class="description"><?php _e('Product', 'wedevs' ); ?></span>
                </td>
            </tr>
            <tr class="row-user-id">
                <th scope="row">
                    <label for="user_id"><?php _e( 'User', 'wedevs' ); ?></label>
                </th>
                <td>
                    <select name="user_id" id="user_id" required="required">
<!--                        <option value="" --><?php //selected( $item->user_id, '' ); ?><!-->--><?php //echo __( '', 'wedevs' ); ?><!--</option>-->
                    </select>
                    <span class="description"><?php _e('User', 'wedevs' ); ?></span>
                </td>
            </tr>
            <tr class="row-total">
                <th scope="row">
                    <label for="total"><?php _e( 'total', 'wedevs' ); ?></label>
                </th>
                <td>
                    <input type="text" name="total" id="total" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="<?php echo esc_attr( $item->total ); ?>" required="required" />
                    <span class="description"><?php _e('total', 'wedevs' ); ?></span>
                </td>
            </tr>
            </tbody>
        </table>

        <input type="hidden" name="field_id" value="<?php echo $item->id; ?>">

        <?php wp_nonce_field( 'order-new' ); ?>
        <?php submit_button( __( 'Update', 'wedevs' ), 'primary', 'submit_order' ); ?>

    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>

<script type="text/javascript">

    $( document ).ready(function() {
        var config = {
            apiKey: "AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE",
            authDomain: "task-dc988.firebaseapp.com",
            databaseURL: "https://task-dc988.firebaseio.com",
            projectId: "task-dc988",
            storageBucket: "task-dc988.appspot.com",
            messagingSenderId: "190470884732"
        };
        firebase.initializeApp(config);
//  var ref = firebase.database().ref("users/");
        // Now simply find the parent and return the name.
        firebase.database().ref('users/').once('value').then(function(snapshot) {
            snapshot.forEach(function(userSnapshot) {
                var id = '<?php echo $id ?>';
                var users = userSnapshot.val();
                $("#user_id").append("<option value='"+users.id+"'>" + users.name+ "</option>");

            });


        });

        firebase.database().ref('product/').once('value').then(function(snapshot) {
            snapshot.forEach(function(userSnapshot) {
                var product = userSnapshot.val();
                $("#product_id").append("<option value='"+product.id+"'>" + product.name+ "</option>");
            });
        });

        firebase.database().ref('order/').once('value').then(function(snapshot) {
            snapshot.forEach(function(userSnapshot) {
                var id = '<?php echo $id ?>';
                var order = userSnapshot.val();

                if(order.id == id){
                    $('#product_id').val(order.product_id);
                    $('#user_id').val(order.user_id);
                    return false;
                }

            });


        });


        $('#form_produt').submit(function(){
            var formP = $('#form_produt');

            formP.append($('<input type="hidden" name="prodcut_name">').val($('#product_id option:selected').text()))
            formP.append($('<input type="hidden" name="username">').val($('#user_id option:selected').text()))
        })


    });
</script>