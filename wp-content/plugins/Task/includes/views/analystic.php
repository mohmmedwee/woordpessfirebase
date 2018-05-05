<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
<link rel="stylesheet"
      href="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/css/bootstrap-datetimepicker.min.css">
<script src="https://rawgit.com/Eonasdan/bootstrap-datetimepicker/master/build/js/bootstrap-datetimepicker.min.js"></script>




















<div class="container" style="margin-top: 145px;">
    <div class="row">


        <div class='col-sm-6'>
            <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" id="date"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>
        </div>


        <script>
            $('#datetimepicker1').datetimepicker({
                defaultDate: new Date(),
                format: 'YYYY-MM-DD',

            });
        </script>

        <button onclick="myFunction()" class="btn btn-submit" style="height: 35px;">Click me</button>


        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Number of user</th>
                <th scope="col">Number of product</th>
                <th scope="col">Number of order</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td id="users">0</td>
                <td id="product">0</td>
                <td id="order">0</td>
            </tr>
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/4.13.0/firebase.js"></script>

    <script type="text/javascript">




        function myFunction() {


            var date =document.getElementById("date").value.toString();
            var config = {
                apiKey: "AIzaSyA7fdVz1F66p5BQ83hPB2XbaxO8vXoSqgE",
                authDomain: "task-dc988.firebaseapp.com",
                databaseURL: "https://task-dc988.firebaseio.com",
                projectId: "task-dc988",
                storageBucket: "task-dc988.appspot.com",
                messagingSenderId: "190470884732"
            };

            if (!firebase.apps.length) {
                firebase.initializeApp(config);

            }


            var counter  = 0;
            var counter1  = 0;
            var counter2  = 0;

            firebase.database().ref('users/').once('value').then(function(snapshot) {
                snapshot.forEach(function(userSnapshot) {
                    var users = userSnapshot.val();

                    var x = users.id;

            var ref = firebase.database().ref('users/');
            ref .orderByKey().startAt(x.toString()).endAt(x.toString())
                .once('value', function(snap) {
                    snap.forEach(function(data) {
                        var data = data.val();


                        if(data.date == date){
                            counter++;

                            document.getElementById("users").innerHTML = JSON.stringify(counter, undefined, 2)

                        }else{

                            document.getElementById("users").innerHTML = JSON.stringify(counter, undefined, 2)


                        }
                    });

                });

                });
            });


            firebase.database().ref('product/').once('value').then(function(snapshot) {
                snapshot.forEach(function(userSnapshot) {
                    var users = userSnapshot.val();

                    var x = users.id;

                    var ref = firebase.database().ref('product/');
                    ref .orderByKey().startAt(x.toString()).endAt(x.toString())
                        .once('value', function(snap) {
                            snap.forEach(function(data) {
                                var data = data.val();

                                if(data.date == date){
                                    counter1++;

                                    document.getElementById("product").innerHTML = JSON.stringify(counter1, undefined, 2)

                                }else{

                                    document.getElementById("product").innerHTML = JSON.stringify(counter1, undefined, 2)

                                }
                            });

                        });

                });
            });




            firebase.database().ref('order/').once('value').then(function(snapshot) {
                snapshot.forEach(function(userSnapshot) {
                    var users = userSnapshot.val();

                    var x = users.id;

                    var ref = firebase.database().ref('order/');
                    ref .orderByKey().startAt(x.toString()).endAt(x.toString())
                        .once('value', function(snap) {
                            snap.forEach(function(data) {
                                var data = data.val();

                                if(data.date == date){
                                    counter2++;

                                    document.getElementById("order").innerHTML = JSON.stringify(counter2, undefined, 2)

                                }else{

                                    document.getElementById("order").innerHTML = JSON.stringify(counter2, undefined, 2)


                                }
                            });

                        });

                });
            });












        }








    </script>