<div class="wrap">
    <h1><?php _e( 'Add new ', 'wedevs' ); ?></h1>

    <form action="" method="post">

        <table class="form-table">
            <tbody>
                <tr class="row-name">
                    <th scope="row">
                        <label for="name"><?php _e( 'name', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="name" id="name" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-phone">
                    <th scope="row">
                        <label for="phone"><?php _e( 'phone', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="phone" id="phone" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-email">
                    <th scope="row">
                        <label for="email"><?php _e( 'email', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="email" id="email" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" required="required" />
                    </td>
                </tr>
                <tr class="row-website">
                    <th scope="row">
                        <label for="website"><?php _e( 'website', 'wedevs' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="website" id="website" class="regular-text" placeholder="<?php echo esc_attr( '', 'wedevs' ); ?>" value="" />
                    </td>
                </tr>

        <input type="hidden" name="id" id="id" value="<?php echo $id+1?>">
             </tbody>
        </table>

        <input type="hidden" name="field_id" value="0">

        <?php wp_nonce_field( 'user-new' ); ?>
<input onclick="writeUserData()" type="submit" name="submit_user" id="submit_user" class="button button-primary" value="Add new">
    </form>
</div>
<!-- <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>

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
       
     Id = document.getElementById('id').value;
    name = document.getElementById('name').value;
    phone = document.getElementById('phone').value;
    email = document.getElementById('email').value;
    website=document.getElementById('website').value;
     adaRef =  firebase.database().ref("users").child(Id);
     adaRef.child("id").set(Id)
     adaRef.child("name").set(name)   
     adaRef.child("phone").set(phone)
     adaRef.child("website").set(website)
     adaRef.child("email").set(email)


}




</script> -->