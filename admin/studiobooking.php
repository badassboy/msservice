<?php

include("products.php");
$ch = new Products();

if(isset($_POST['laliga'])){
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $amount = $_POST['amount'];
    $picture = $_FILES['photo']['name'];
    $description = $_POST['description'];
  // var_dump($picture);
  

  if(empty($title) || empty($brand)  || empty($amount) || empty($picture)){
    $msg = '<div class="alert alert-danger" role="alert">Please all fields are required</div>';
  }else {
    $laliga = $ch->ProductUpload($picture,$title,$amount,$brand,$description);
    if($laliga){
      $msg = '<div class="alert alert-success" role="alert">Upload Successful</div>';
    }else {
      $msg = '<div class="alert alert-danger" role="alert">Upload Failed</div>';
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
                <h3>MSSERVICE</h3>
            </div>

            <ul class="list-unstyled components">
                <p>PRODUCTS</p>


            <li>
                <a href="#" id="appointment" data-target="one" class="test">Upload Advert</a>
            </li>

            <li>
                <a href="#" id="event" data-target="two" class="test">All Products</a>
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

            <h4>Products</h4>

            <div class="container appointment show" id="one">
              <div id="message"></div>
              
                <h5>
                    <?php if (isset($msg)) {
                        echo $msg;
                    }?>
                </h5>
               <form method="post" id="appoint" enctype="multipart/form-data">

                <div class="form-row">

                    <div class="form-group col-md-6">
                         <label for="exampleFormControlInput1">Title/product name</label>
        <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Title" required>
                </div>

                 <div class="form-group col-md-6">
                         <label for="exampleFormControlInput1">Brand</label>
        <input type="text" name="brand" class="form-control" id="exampleFormControlInput1" placeholder="Title" required>
                </div>

                      
                    
                </div>

                <div class="form-row">

                   <div class="form-group col-md-6">
                <label for="exampleFormControlInput1">Amount</label>
    <input type="number" min="1" name="amount" class="form-control" id="exampleFormControlInput1" placeholder="Amount" required>
              </div>

          <div class="form-group col-md-6">
           <label>Picture</label>
                <input type="file" name="photo" class="form-control-file" id="upload" required>
          </div> 

                </div>

              <div class="form-group">

                    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                   </div>

                
                <button type="submit" class="btn btn-primary" name="laliga">Submit</button>
               </form> 
            </div>

                   


                

    
            


               


             <div class="container event" id="two">

               <table class="table">

            <thead>
              <tr>
                
                <th scope="col">Artiste</th>
                <th scope="col">Mobile</th>
                <th scope="col">Genre</th>
                <th scope="col">Title</th>
                <th scope="col">Track</th>
                <th scope="col">Amount</th>
                <th scope="col">Days</th>
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
 url:"advert_ajax.php",
 type:"get",
 dataType:"JSON",
 success:function(response){
   console.log(response);
     var len = response.length;
     for (var i = 0; i < len; i++) {

           var edit = response[i]['edit'];
         var my_delete  = response[i]["delete"];

         var action = edit.concat(" ", my_delete);

         var artiste = response[i]["artiste"];
         var mobile = response[i]["mobile"];
         var genre = response[i]["genre"];
         var title = response[i]["title"];

         var track = response[i]["track"];
       
         var  amount = response[i]["cost"];
         var  booking_date = response[i]["book_date"];

         var table_str = "<tr>" +
                      
                      
                      "<td>" + artiste + "</td>" +
                      "<td>" + mobile + "</td>" +
                      "<td>" + genre + "</td>" +
                      "<td>" + title + "</td>" +
                      "<td>" + track + "</td>" +
                    
                      "<td>" + amount + "</td>" +
                      "<td>" + booking_date + "</td>" +
                      "<td>" + action + "</td>" +
                      "</tr>";


              $(".table tbody").append(table_str);

            }
             
          },
          error:function(response){
            console.log("Error: "+ response);
          }
      
          });  

      });

    // var button = document.getElementById("upload");
    // button.addEventListener("click", function(){

    //     online = window.navigator.onLine;


    //     if (navigator.onLine) {
    //       // console("onLine");
    //     } else {
    //       alert("offline");
    //     }


    // });

  
              


        

           






        


    </script>
</body>

</html>