<?php
session_start();
// $fullname = $_POST['fullname'];
// $username = $_POST['username'];
// $password = $_POST['pass'];
// $date = $_POST['date'];
// $date = strtotime($date);
// $date = date('d/m/Y', $date);
// $ta = $_SESSION['AdminAr'];
// $duplicate = false;
// for ($i = 0; $i < count($ta); $i++) {
//     $tb = array();
//     $tb = explode(',', $ta[$i]);
//     if ($tb[4] === $username) {
//         $duplicate = true;
//         $duplicate_class = "duplicate";
//     }
// }
echo isset($_POST['username']);
