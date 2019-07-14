<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">

    <title>Upload App</title>
    <style type="text/css">
        /* Show it is fixed to the top */
        body {
          min-height: 75rem;
          padding-top: 4.5rem;
        }
    </style>
  </head>
  <body>
      
      
    <main role="main" class="container">
      <div class="jumbotron">
        <h1>Upload Monitor</h1>
         <h2 id="result">
            <?php
                echo json_decode(file_get_contents("state.json"))->num_uploads;
              ?> Files Uploaded
          </h2>
        <p id="counter"></p>
      </div>
    </main>
    
    
    <script>
    
        let server = "https://ba0a92b556de4033bb81b78cc5537931.vfs.cloud9.us-west-2.amazonaws.com";
        
        function startTimer(){
           let time = 5;//5 secs
           let interval = setInterval(()=>{
             time--;
             
             if(time === 0){
               document.querySelector("#counter").innerHTML = `Refreshing`;
               refresh();
               time = 5;
             }else{
               document.querySelector("#counter").innerHTML = `Refreshing in ${time} seconds`;
             }
           }, 1000);
        }
        
        async function refresh(){
          console.log('refreshing');
            let resp = await fetch(`${server}/state.json`);
            if(resp.status === 200){
              let state = await resp.json();
              document.getElementById("result").innerHTML = state.num_uploads + " Files Uploaded"
            }
        }
        
        //startTimer();
        // let source = new EventSource("emitter.php");
        // source.onmessage = function(event) {
        //   document.getElementById("result").innerHTML = event.data + " Files Uploaded";
        //   console.log(event);
        // };
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>