<!-- --><?php //
//    if ( $wpdb->delete( $table_name, array( 'id' => $id ) ) ) {
//      return wp_redirect($template);
//                }
//
//  ?>


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

var id = <?php echo $id?>;
alert(id);
// var ref = firebase.database().ref('/users/');

var ref = firebase.database().ref('/users'); //root reference to your data


  ref.child(id).remove();

</script>