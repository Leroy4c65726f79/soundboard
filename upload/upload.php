<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Upload</title>
  </head>
  <body>


    <?php


    $dirnametemp = $_POST['kay'];

    $target_dir = "../audio/".$dirnametemp."/";
    $target_file = $target_dir . basename($_FILES["myFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // echo $dirnametemp;
    // echo $target_dir;
    // echo $target_file;
    // echo $imageFileType;
    // Check if image file is a actual image or fake image
    //if(isset($_POST["submit"])) {

        // $check = getDuration($_FILES["myFile"]["tmp_name"]);
        // if($check !== false) {
        //     echo "File is an audio - " . $check["mime"] . ".";
        //     $uploadOk = 1;
        // } else {
        //     echo "File is not an audiofile.";
        //     $uploadOk = 0;
        // }
    // }
    //Check if file already exists
    if (file_exists("".$target_dir."audiofile.mp3")) {
        echo "<script>console.warn('file_exists')</script>";
        array_map('unlink', glob("".$target_dir."audiofile.mp3"));
        echo "<script>console.log('file_del')</script>";
        if (file_exists($target_file)) {
            echo "<script>alert('Cant Del File!')</script>";
            $uploadOk = 0;
            logg("Cant Del File","$dirnametemp");
        } else {
          $uploadOk = 1;
        }

    }
    // Check file size
    if ($_FILES["myFile"]["size"] > 50000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
        logg("Too Large","$dirnametemp");
    }
    //  Allow certain file formats
      if($imageFileType != "mp3") {
          echo "Sorry, only mp3 files are allowed. <br>";
          $uploadOk = 0;
          logg("No MP3","$dirnametemp");
      } elseif ($imageFileType == "mp3") {
        echo "<script>console.log('Your File is a MP3!')</script>";

      } else {$uploadOk = 0;};


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.  <br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["myFile"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["myFile"]["name"]). " has been uploaded. It's now on the $dirnametemp key! <br>";
            rename($target_file, "".$target_dir."audiofile.mp3");
            echo "<script>console.log('renamed in audiofile.mp3')</script>";


                  //loggfile
                    $state = "Succsess!";
                    $ip = $_SERVER['REMOTE_ADDR'];
                    $file = "../Loggfiles.txt";
                    $buffer = " ". date('d-m-Y G-i-s') . ": IP des Loggins: ".$ip." Hotkey: ".$dirnametemp." State: ".$state." \n";

                    if (file_exists($file)) {
                      $obuffer = file_get_contents($file);
                      $buffer = $obuffer . $buffer;
                      file_put_contents($file, $buffer);
                    }
        } else {
            echo "Sorry, there was an error uploading your file.  <br>";
            logg("Unknown error","$dirnametemp");
        }
    }





function logg($state='', $dirnametemp='') {
  //loggfile
    $ip = $_SERVER['REMOTE_ADDR'];
    $file = "../Loggfiles.txt";
    $buffer = " ". date('d-m-Y G-i-s') . ": IP des Loggins: ".$ip." Hotkey: ".$dirnametemp." State: ".$state." \n";

    if (file_exists($file)) {
      $obuffer = file_get_contents($file);
      $buffer = $obuffer . $buffer;
      file_put_contents($file, $buffer);
    }

}



     ?>


     <a href="https://soundboard.9k1.co">
       <div class="back">
         Go Back to soundboard
       </div>
     </a>

<style media="screen">
html, body {
  margin: 0px;
  padding-top: 20px;
  text-align: center;
}
a {
  margin-top: 40px;
  text-decoration: none;
  color: rgba(0,0,0,0.7);
  text-align: center;
  height: 25px;

}
.back {
  margin-top: 40px;
  height: 65px;
  background-color: rgba(0,0,0,0.15);
  line-height: 4;
}
</style>
  </body>
</html>
