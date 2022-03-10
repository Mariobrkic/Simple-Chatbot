<?php 
     # connectiong to database
     $conn = mysqli_connect("localhost", "root", "", "bot") or die("Database Error");

     # getting user message throught ajax
    $getMesg = mysqli_real_escape_string($conn, $_POST["text"]);

     # checking user query to database query
     $check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
     $run_query = mysqli_query($conn, $check_data) or die ("Error");

     #if user query matched to database query we'll show the reply otherwise it goes to else
      if(mysqli_num_rows($run_query) > 0 ){

        # fetching replay from the database
        $fetch_data = mysqli_fetch_assoc($run_query);
        # storing replay to variable which we'll send to ajax
        $replay = $fetch_data['replies'];
        echo $replay;


      }else{
          
           echo "I'm sorry but seems like I'm unable to understand you!";

      }

    ?>