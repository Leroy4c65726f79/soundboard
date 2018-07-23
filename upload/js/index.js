document.addEventListener('keydown', function(e) {
  var x = event.keyCode;
  var key = String.fromCharCode(x);
  console.log(key);
  $("#transmiter").val(""+key+"");
  $(".uploadkeycode").html("Your Upload Key: " + key);

  if (x === 13) {
    console.log("enter");
    alert("Sorry Enter is for Pause!");

  } else {
    $("#upload").css('display', 'block');
    $("#submit").css('display', 'block');

  }

});
