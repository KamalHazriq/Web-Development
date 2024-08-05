<?php
 
$lecturers = array
  (
  array('id' => "A123456", 'name' => "Assoc. Prof. Dr. Mohammad Faidzul Nasrudin", 'room' => "BBB, Block A (Level 3)", 'tel' => "+603-89216670", 'email' => "mfn@ukm.edu.my"),
  array('id' => "K004901", 'name' => "Prof. Dr. Abdullah Mohd Zin", 'room' => "BD, Block G (Level 1)", 'tel' => "+603-89216173", 'email' => "amzftsm@ukm.edu.my"),
  array('id' => "K012964", 'name' => "Prof. Dr. Azuraliza Abu Bakar", 'room' => "BTDR, Blok G (Level 1)", 'tel' => "+603-89216177", 'email' => "azuraliza@ukm.edu.my"),
  array('id' => "K009683", 'name' => "Assoc. Prof. Dr. Haslina Arshad", 'room' => "BTDS, Block A (Ground Floor)", 'tel' => "+603-89216812", 'email' => "haslinarshad@ukm.edu.my"),
  array('id' => "K007915", 'name' => "Assoc. Prof. Dr. Mohd Juzaiddin Ab Aziz", 'room' => "BTDP, Blok A (Level 1)", 'tel' => "+603-89216183", 'email' => "juzaiddin@ukm.edu.my")
  );
 
if (isset($_GET['id']) && ($_GET['id'] != "")) {
 
  $id = $_GET['id'];
  $key = array_search($id, array_column($lecturers, 'id'));
   
}
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Week 4 Lab Deliverables</title>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body bgcolor= "#d4d4dc">
<table width="100%" border="0" cellpadding="20" cellspacing="1" align="center">
  <tr>
    <td colspan="2" bgcolor="#1d1e22">
      <h1><font color="#feda6a" face="verdana">Week 4 Lab Task</font></h1>
    </td>
  </tr>
  <tr>
  <td bgcolor="#feda6a" width="200" height="600">
       <object name="menu" type="text/html" data="menu.html" height="600" /> 
    </td>
<td width="*" valign="top">
<center><font size="6" face="Comic Sans MS, Comic Sans, cursive">Lecturer's Details</font></center><br>
<center> <table border="1" cellpadding="10" bgcolor="#feda6a"></center>
  <tr>
    <td colspan="2"><img src="<?php echo $lecturers[$key]['id']; ?>.jpg" width="300"></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo $lecturers[$key]['email']; ?></td>
  </tr>
  <tr>
    <td>Room</td>
    <td><?php echo $lecturers[$key]['room']; ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td><?php echo $lecturers[$key]['tel']; ?></td>
  </tr>
</table>

<br>
<!-- Button to go back to lecturers_list.php -->
<a href="lecturers_list.php"><button>Back to Lecturers List</button></a>


</tr>
  <td colspan="2" bgcolor="black" align="center">
      <footer style="color: #feda6a;font-family: Verdana;">
        TP2543 - WEB PROGRAMMING
      </footer>
    </td>


<audio preload="auto" src="elevator.mp3" loop="true" autobuffer>
    Your browser does not support the audio element.
</audio>
<script>
function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
    document.cookie = c_name + "=" + c_value;
}

function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}

var song = document.getElementsByTagName('audio')[0];
var played = false;
var tillPlayed = getCookie('timePlayed');

function update() {
    if (!played) {
        if (tillPlayed) {
            song.currentTime = tillPlayed;
            song.play();
            played = true;
        } else {
            song.play();
            played = true;
        }
    }
    setCookie('timePlayed', song.currentTime);
}

setInterval(update, 1000);
</script>
</body>
</html>