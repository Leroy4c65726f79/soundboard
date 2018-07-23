
function audio() {
  var x = event.keyCode;
  var key = String.fromCharCode(x);
  console.log(key);

  if (x === 13) {
    console.log("stop");
    var audios = document.getElementsByTagName('audio');
      for(var i = 0, len = audios.length; i < len;i++){
          if(audios[i] != x.target){
              audios[i].pause();
          }
      }

  } else {
    document.getElementById('audiosoundeffect-'+key+'').currentTime = 0;
    document.getElementById('audiosoundeffect-'+key+'').play();

  }

};


document.addEventListener('keydown', function(e) {
  audio();
});
$( ".key" ).click(function() {
  audio();
});






//---------- Start Animation
$(document).ready(function(){
  var keyboard=[
    {
      offset:20,
      keys:['q','w','e',{letter:'r',x:0.4,y:0.2},'t','y','u',{letter:'i',x:0,y:0},'o','p']
    },
    {
      offset:40,
      keys:['a','s',{letter:'d',x:0.2,y:0},{letter:'f',y:0,x:0.4},'g',{letter:'h',x:0.2,y:0},{letter:'j',x:0.6,y:0},'k',{letter:'l',y:0,x:0.6}]
    },
    {
      offset:0,
      shift:true,
      keys:['z','x','c','v','b','n',{letter:'m',x:0,y:0.2}]
    }
  ]
  function renderKeyboard(){
    keyboard.forEach(function(row){
      var $row=$("<div/>")
        .addClass("key-row")
        .css({
          marginLeft:row.offset+"px"
        })
        .appendTo(".keyboard");

      if(row.shift){
        var $shift=$("<button/>")
          .addClass("key key-shift key-shift-neverpressed")
          .text("shift")
          .appendTo($row)
      }
      row.keys.forEach(function(keyLetter){
        var letter=keyLetter;
        var sxd=0.2;
        var syd=0.2;
        if(typeof keyLetter=="object"){
          letter=keyLetter.letter;
          sxd=typeof keyLetter.x=="number"?keyLetter.x:sxd;
          syd=typeof keyLetter.y=="number"?keyLetter.y:sxd;
        }
        var $key=$("<div/>")
          .addClass("key key-letter")
          .data("scale-x-delta",sxd)
          .data("scale-y-delta",syd)
          .attr("data-letter",letter)
          .appendTo($row);



        var $lower=$("<div/>")
          .addClass("letter letter-lowercase")
          .text(letter)
          .appendTo($key);

        var $upper=$("<div/>")
          .addClass("letter letter-uppercase")
          .text(letter.toUpperCase())
          .appendTo($key);
      })
    })
  }
  renderKeyboard();


  var keys=[];
  $(".key-letter").each(function(i){

    var $key=$(this);
    var $upper=$key.children(".letter-uppercase");
    var $lower=$key.children(".letter-lowercase");
    var scaleXD=$key.data("scale-x-delta");
    var scaleYD=$key.data("scale-y-delta");
    var upperSX=1-scaleXD;
    var upperSY=1-scaleYD;
    var lowerSX=1+scaleXD;
    var lowerSY=1+scaleYD;

    function setKeyUpperCase(){
      $upper.css({
        transform:"scale(1,1) rotateY(0)",
        opacity:1
      });
      $lower.css({
        transform:"scale("+lowerSX+","+lowerSY+") rotateY(0)",
        opacity:0
      });
    }

    function setKeyLowerCase(){
      $lower.css({
        transform:"scale(1,1) rotateY(0)",
        opacity:1
      });
      $upper.css({
        transform:"scale("+upperSX+","+upperSY+") rotateY(0)",
        opacity:0
      });
    }

    /*var duration=92;
    var delay=i*1.5;
    $key.children(".letter").css({
      transitionDuration:(duration/2)+"ms, "+duration+"ms",
      transitionDelay:delay+"ms"
    });*/

    setKeyLowerCase();

    keys.push({
      key:$key,
      setLowerCase:setKeyLowerCase,
      setUpperCase:setKeyUpperCase
    });
  });

  function callForAllKeys(fName){
    keys.forEach(function(key){
      key[fName]();
    });
  }
  function setLowerCase(){
    callForAllKeys("setLowerCase");
  }
  function setUpperCase(){
    callForAllKeys("setUpperCase");
  }
  var shiftPressed=false;
  function shift(){
    shiftPressed=true;
    setUpperCase();
    $(".key-shift").addClass("key-pressed");
    $(".key-shift-neverpressed").removeClass("key-shift-neverpressed");
  }
  function unshift(){
    shiftPressed=false;
    setLowerCase();
    $(".key-shift").removeClass("key-pressed");
  }
  function toggleShift(){
    shiftPressed?unshift():shift();
  }
  $(document).keydown(function(event){
    if(event.keyCode==16){
      shift();
    }else{
      var char=String.fromCharCode(event.keyCode);
      if(char!=""){
        $(".key-letter[data-letter="+char.toLowerCase()+"]").addClass("key-pressed");
      }
    }
  });
  $(document).keyup(function(event){
    if(event.keyCode==16){
      unshift();
    }else{
      var char=String.fromCharCode(event.keyCode);
      if(char!=""){
        $(".key-letter[data-letter="+char.toLowerCase()+"]").removeClass("key-pressed");
      }
    }
  });
  $(".key-shift").click(function(){
    toggleShift();
  })


});
