<?php

include("../functions.php");
$ch = new Activities();

if(isset($_POST['laliga'])){
    $first_name = $ch->testInput($_POST['first_name']);
    $last_name = $ch->testInput($_POST['last_name']);
    $email = $ch->testInput($_POST['email']);
    $product = $ch->testInput($_POST['product']);
    $mobile = $ch->testInput($_POST['mobile']);
    $venue = $ch->testInput($_POST['venue']);

    // generate random values
    $bytes = random_bytes(5);
    $random = bin2hex($bytes);



   
  
  

  if(empty($venue)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $laliga = $ch->tracking($random,$first_name,$last_name,$email,$product,$mobile,$venue);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Upload Successful.Tracking number generated automatically</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Failed in uploading advert</div>';
    }
  }

}
// end of laliga news



?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS-->
    <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.css">

    

    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/sidestyle.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="../font-awesome/css/font-awesome.css">

    <style type="text/css">

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .appointment{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .event{
                background-color:rgb(255, 255, 255);
                height: 500px;
                padding-top: 3%;
                display: none;
            }

        .counselling{

            background-color:rgb(255, 255, 255);
            height: 350px;
            padding-top: 3%;
            display: none;
        }

        .show {
          display: block;
        }


    </style>
    

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>ATSPO</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Advertisement</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Upload Advert</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Advert</a>
            </li>

         
           
           


            </ul>

           

        </nav>
        <!-- end of sidebar -->

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fas fa-align-left"></i>
                    <span>Toggle Sidebar</span>
                </button>
                
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-align-justify"></i>
                </button>

                    
                </div>
            </nav>

            <h2>Advertisement</h2>

            <div class="container appointment show" id="one">
              <!-- <div id="message"></div> -->
              <?php
                if(isset($msg)){
                  echo $msg;
                }
              ?>
                <h5>Advertisement</h5>
               <form method="post" id="appoint">
                <div class="row">

                    <div class="col">
                                        <div class="form-group">
                      <label for="exampleFormControlInput1">Customer FirstName</label>
          <input type="text" name="first_name" class="form-control" id="exampleFormControlInput1" placeholder="FirstName" required>
                    </div>
                    </div>

                    <div class="col">
                       
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Customer LastName</label>
          <input type="text" name="last_name" class="form-control" id="exampleFormControlInput1" placeholder="Last Name" required>
                    </div> 
                    </div>
                </div>



                <div class="row">

                    <div class="col">
                         <div class="form-group">
                      <label for="exampleFormControlInput1">Customer Email</label>
          <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
                    </div>
 
                    </div>

                     <div class="col">
                         <div class="form-group">
                      <label for="exampleFormControlInput1">Product to send</label>
          <input type="text" name="product" class="form-control" id="exampleFormControlInput1" placeholder="Product" required>
                    </div>
 
                    </div>
                    
                </div>


                    




                  
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Customer Mobile</label>
          <input type="text" name="mobile" class="form-control" id="exampleFormControlInput1" placeholder="Mobile" required>
                    </div>





                

                  <div class="form-group">
                      <label for="exampleFormControlInput1">Venue</label>
          <input type="text" name="venue" class="form-control" id="exampleFormControlInput1" placeholder="Venue" required>
                    </div>

              





                

               
                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>

                   


                

    
            


               


             <div class="container event" id="two">
                <div id="response"></div>

               <table class="table" id="myTable">

            <thead>
              <tr>
                
                <th scope="col">FirstName</th>
                <th scope="col">LastName</th>
                <th scope="col">phone</th>
                <th scope="col">email</th>
                <th scope="col">Code</th>
                <th scope="col">Venue</th>
               
                <th scope="col">Action</th>
              </tr>
            </thead>

            <tbody></tbody>

            </table>
              
            </div>
               
             

            <!-- end of div -->

        </div>
        <!-- end of  content -->
           
    </div>
    <!-- end of wrapper -->

                


           

          

    <!-- jQuery CDN  -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   
    <!-- Bootstrap JS -->
   <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });

        // creating an array-like based of child nodes on a specified class name
        var links = document.getElementsByClassName("test");

     //attach click handler to each
        for (var i = 0; i < links.length; i++) {
            links[i].onclick = toggleVisible;
        }

        function toggleVisible(){
                //hide currently shown item
               document.getElementsByClassName('show')[0].classList.remove('show');
               // getting info from custom data-target  set on the element
               var id = this.dataset.target;
               // showing div
               document.getElementById(id).classList.add('show');
        }

        // display all featured news
        $(document).ready(function(){

$.ajax({
 url:"tracking_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var firstName = response[i]["first"];
         var lastNme = response[i]["last"];
         var phone = response[i]["phone"];
         var email = response[i]["email"];
         var track = response[i]["track"];

         var location = response[i]["venue"];
       
         

         var table_str = "<tr>" +
                      
                      
                      "<td>" + firstName + "</td>" +
                      "<td>" + lastNme+ "</td>" +
                      "<td>" + phone + "</td>" +
                      "<td>" + email + "</td>" +
                      "<td>" + track + "</td>" +
                      "<td>" + location + "</td>" +
                    
                      "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          }); 

           //delete post using ajax
           // my_delete.addEventListener("click",function(id){
            
           // $.ajax({
           //   type:"GET",
           //   url:"delete_track.php",
           //   data:{deleteId:id}
           // })

           // .done(function(data){
           //   $("#response").html(data);
           //   console.log("hello");
           // })

           // .fail(function(data){
           //   $("#response").html(data);
           //   console.log("hi");
           // });



           // });


      });

    var button = document.getElementById("upload");
    button.addEventListener("click", function(){

        online = window.navigator.onLine;


        if (navigator.onLine) {
          // console("onLine");
        } else {
          alert("offline");
        }


    });

  
              


        

           






        


    </script>
</body>

</html>