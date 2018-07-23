<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- .................................sheets.................................-->
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="../style/style.min.css?ts=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- .................................Fonts .................................-->
    <!-- <link href="https://fonts.googleapis.com/css?family=EB+Garamond" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,400i,500,700" rel="stylesheet"> -->
    <!-- .................................Meta Tags.................................-->
    <title>Sondboard</title>
    <meta name="Janis Wanger" content="Janis Wanger">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta name="author" content="Janis Wanger">

    <!--.................................favicon.................................-->
  </head>
  <!--.................................start Body.................................-->
  <body>
    <div class="uploadkeycode">
    </div>
    <div class="uploadkey">
      Press a button for upload a MP3 File!
    </div>


      <form action="upload.php" method="post" enctype="multipart/form-data">
          <input id="upload" name="myFile" type="file" style="display: none;">
          <input id="transmiter" type="text" required name="kay" style="display: none;">
          <input id="submit" type="submit" name="Absenden" value="Absenden" style="display: none;">
      </form>





      <script src="js/index.js?ts=<?php echo time(); ?>"></script>
      <style media="screen">
        .uploadkey {
          margin-top: 49vh;
          text-align: center;
          width: 100%;
        }
        #upload, #submit {
          position: relative;
          display: block;
          margin : 15px auto;
        }
        .uploadkeycode {
          position: absolute;
          font-size: 50px;
          color: rgba(0,0,0,0.3);
          /* margin-left: 49vw; */
          margin-top: 200px;
          text-align: center;
          width: 100%;

        }



      </style>
  </body>
</html>
