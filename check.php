<?php
// (A) START SESSION
session_start();

//Admin
$myArray = array();
$file1 = fopen("adminsample.txt", "r");
$line1 = "";
while (!feof($file1)) {
  $line1 = fgets($file1);
  if ($line1 != '') {
    array_push($myArray, $line1);
  }
}
$_SESSION['AdminAr'] = $myArray;

//Student 
$StudentAr = array();
$file2 = fopen("studentsample.txt", "r");
$line2 = "";
while (!feof($file2)) {
  $line2 = fgets($file2);
  if ($line2 != '') {
    array_push($StudentAr, $line2);
  }
}
$_SESSION['StudentAr'] = $StudentAr;
// (B) HANDLE LOGIN
if (isset($_POST["user"]) && !isset($_SESSION["user"])) {
  // (B1) USERS & PASSWORDS - SET YOUR OWN !

  // set post user
  for ($i = 0; $i < count($myArray); $i++) {
    $ta = array();
    $ta = explode(',', $myArray[$i]);
    $users[$ta[3]] = $ta[4];
  }
  // (B2) CHECK & VERIFY
  if (isset($users[$_POST["user"]])) {
    if ($users[$_POST["user"]] == $_POST["password"]) {
      $_SESSION["user"] = $_POST["user"];
    }
  }

  // (B3) FAILED LOGIN FLAG
  if (!isset($_SESSION["user"])) {
    $failed = true;
  }
}

// (C) REDIRECT USER TO HOME PAGE IF SIGNED IN
if (isset($_SESSION["user"])) {
  header("Location: protect.php"); // SET YOUR OWN HOME PAGE!
  exit();
}
