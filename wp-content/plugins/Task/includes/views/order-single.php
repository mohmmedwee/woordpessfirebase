<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>





<div class="container" style="margin-top: 145px;">
    <div class="row">
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">User</th>
                <th scope="col">Total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row" id="row">1</th>
                <td id="product">Mark</td>
                <td id="username">Otto</td>
                <td id="total">@mdo</td>
            </tr>
            </tbody>
        </table>
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
        // Now simply find the parent and return the name
firebase.database().ref('order/').once('value').then(function(snapshot) {
snapshot.forEach(function(userSnapshot) {
var id = '<?php echo $id ?>';
var order = userSnapshot.val();

if(order.id == id){
    console.log(order);
    document.getElementById("row").innerHTML = JSON.stringify(order.id, undefined, 2)
    document.getElementById("product").innerHTML = JSON.stringify(order.product_name, undefined, 2)
    document.getElementById("username").innerHTML = JSON.stringify(order.username, undefined, 3)
    document.getElementById("total").innerHTML = JSON.parse(order.total, undefined, 4);}

});


});


    });

</script>