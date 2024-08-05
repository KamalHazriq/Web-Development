<?php

$univ = array(
  array("name" => "Universiti Putra Malaysia", "abb" => "UPM"),
  array("name" => "Universiti Kebangsaan Malaysia", "abb" => "UKM"),
  array("name" => "Universiti Malaya", "abb" => "UM"),
  array("name" => "Universiti Sains Malaysia", "abb" => "USM"),
  array("name" => "Universiti Teknologi Malaysia", "abb" => "UTM")
);

$record = array
  (
  'name' => "Muhammad Kamal Hazriq bin Mohammad Aswan",
  'age' => 21,
  'sex' => "male",
  'address' => "K14X , Kolej Ibrahim Yaakub, UKM",
  'email' => "a189646@siswa.ukm.edu.my",
  'dob' => "2002-04-10",
  'height' => 175,
  'phone' => "+6019-2634050",
  'color' => "FF0000",
  'fbtwig' => "https://www.instagram.com/kamalhazriq/",
  'univ' => "UKM",
  'matricnum' => "a189646"
  );

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
      <center><font size="6" face="Comic Sans MS, Comic Sans, cursive">Biodata Form</font></center>
      <hr>
      <br>
<form action="validate_biodata.php" method="post">
 <center> <table border="1" cellpadding="10" bgcolor="#feda6a"></center>
    <tr>
      <td>Name:</td>
        <td><input type="text" name="name" placeholder="Insert your name" autofocus value="<?php echo $record['name']; ?>"></td>
    </tr>
    <tr>
      <td>Age:</td>
       <td><input type="number" name="age" min="0" max="100" step="1" value="<?php echo $record['age']; ?>"></td>
    </tr>
    <tr>
      <td>Sex:</td>
      <td>
         <input type="radio" name="sex" value="male" <?php if($record['sex'] == "male") echo "checked"; ?>>Male<br>
        <input type="radio" name="sex" value="female" <?php if($record['sex'] == "female") echo "checked"; ?>>Female
      </td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><textarea name="address" cols="50" rows="5" placeholder="Insert your address"><?php echo $record['address']; ?></textarea></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><input type="email" name="email" placeholder="Insert your email" value="<?php echo $record['email']; ?>"></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td><input type="date" name="dob" value="<?php echo $record['dob']; ?>"></td>
    </tr>
    <tr>
      <td>Height:</td>
      <td><input type="range" name="height" id="heightId" min = "100" max = "200" oninput="outputId.value = heightId.value" value="<?php echo $record['height']; ?>">
      <output id="outputId"><?php echo $record['height']; ?></output>cm</td>
    </tr>
    <tr>
      <td>Tel:</td>
       <td><input type="tel" name="phone" pattern="\+60\d{2}-\d{7}" placeholder="+60##-#######" value="<?php echo $record['phone']; ?>"></td>
    </tr>
    <tr>
      <td>My Favorite Color:</td>
      <td><input type="color" name="color" value="<?php echo $record['color']; ?>"></td>
    </tr>
    <tr>
      <td>Fb/TW/IG:</td>
      <td><input type="url" name="fbtwig" placeholder="Insert the URL" value="<?php echo $record['fbtwig']; ?>"></td>
    </tr>
    <tr>
      <td>My University:</td>
      <td>
        <select name="university">
          <option value="" selected>Select</option>

          <?php
          foreach ($univ as $u) {
            if ($u['abb'] == $record['univ'])
              echo "<option value=".$u['abb']." selected>".$u['name']."</option>";
            else 
              echo "<option value=".$u['abb'].">".$u['name']."</option>";
          }
          ?>

        </select>
      </td>
    </tr>
  </table>
<hr>
<input type="hidden" name="matricnum" value="a189646">
<input type="submit" name="biodata_form" value="Submit My Biodata">
<input type="reset">
</form>
    </td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="black" align="center">
      <footer style="color: #feda6a;font-family: Verdana;">
        TP2543 - WEB PROGRAMMING
      </footer>
    </td>
  </tr>
</table>  

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