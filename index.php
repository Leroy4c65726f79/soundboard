<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- .................................sheets.................................-->
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.min.css?ts=<?php echo time(); ?>">
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

    <?php



    //array for key code and Fodlernames
    $foldername = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "1", "2", "3", "4", "5", "6", "7", "8", "9");
    foreach ($foldername as &$value) {
      $filename = 'audio/'.$value.'';


        if (file_exists($filename)) {
            //echo "<script> console.log('Dieses File giebt es: ".$filename."');</script>";
        } else {
            echo "<script> console.log('Dieses File giebt es NICHT: ".$filename."');</script>";
            mkdir('audio/'.$value.'', 0777, true);
            echo "<script> console.log('".$filename." Wurde nun erstellt!');</script>";
        }
    };


// Generate audio files

    $path    = 'audio';
    $files = scandir($path);
    //print_r($files);

    foreach ($files as &$value) {

      echo '<audio class="audioplayer" id="audiosoundeffect-'.$value.'" controls style="display:none">
              <source src="https://soundboard.9k1.co/audio/'.$value.'/audiofile.mp3" type="audio/mpeg"> Your browser does not support the audio element.
            </audio>';
      };
     ?>

    <h1>Soundboard</h1>

      <div class="keyboard"></div>
      <a href="https://soundboard.9k1.co/upload">
        <div class="upload">
          upload audio files!
        </div>
      </a>

      <div class="info">
        Press Enter for Pause. Upload your own files now!
      </div>



      <script src="js/index.js?ts=<?php echo time(); ?>"></script>
  </body>
</html>
