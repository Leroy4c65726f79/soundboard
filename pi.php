<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="style/normalize.css">
      <link rel="stylesheet" href="style/style.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <title>Sondboard</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
   </head>
   <body>
      <?php
         $path    = 'audio';
         $files = scandir($path);
         foreach ($files as &$value) {

           echo '<audio class="audioplayer" id="audiosoundeffect-'.$value.'" controls style="display:none">
                   <source src="https://soundboard.9k1.co/audio/'.$value.'/audiofile.mp3" type="audio/mpeg"> Your browser does not support the audio element.
                 </audio>';
           };
          ?>
      <h1>Soundboard</h1>
      <div class="info">
         Press Enter for Pause. Upload your own files now!
      </div>
      <script src="js/index.js"></script>
   </body>
</html>
