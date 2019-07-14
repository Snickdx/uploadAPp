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
        }
    </style>
  </head>
  <body>
        
  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="index.php">Home</a>
    <a class="navbar-brand" href="form.php">Upload</a>
  </nav>


     <main role="main" class="container">
      <div class="jumbotron">
        <h1>Upload Form</h1>
        <h2>
          <?php 
            if(isset($_GET['upload']))
              echo 'Upload Successful!';
          ?>
        </h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload File</label>
            <input type="file" class="form-control-file" name="file" id="exampleFormControlFile1">
            <input type="submit" class="btn btn-primary" value="Upload Image" name="submit">
          </div>
        </form>
      </div>
    </main>
   
</form>

    
    
    <script>
        var source = new EventSource("emitter.php");
        source.onmessage = function(event) {
          document.getElementById("result").innerHTML += event.data + "Uploads";
          console.log(event);
        };
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  </body>
</html>