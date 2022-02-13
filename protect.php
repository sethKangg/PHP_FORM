<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) {
  unset($_SESSION["user"]);
}

// (C) REDIRECT TO LOGIN PAGE IF NOT LOGGED IN
if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
?>
<html>

<?php
function pre_r($a)
{
  // echo '<pre>';
  // print_r($a);
  // echo '</pre>';
}
?>

<body>
  <h1>Welcome</h1>

  <?php
  foreach ($_SESSION['AdminAr'] as $x => $y) {
    echo 'index: ' . $x . ' value: ' . $y;
    echo '<br>';
  }
  echo '<br>';
  foreach ($_SESSION['StudentAr'] as $x => $y) {
    echo 'index: ' . $x . 'value: ' . $y;
    echo '<br>';
  }
  echo '<br>';
  ?>
  <?php
  echo '<pre>';
  if (isset($_POST['username']) && $_POST['username'] !== '') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $date = $_POST['date'];
    $date = strtotime($date);
    $date = date('d/m/Y', $date);

    $ta = $_SESSION['AdminAr'];
    $id = count($ta) + 1;
    $duplicate = false;
    //check duplicate
    for ($i = 0; $i < count($ta); $i++) {
      $tb = array();
      $tb = explode(',', $ta[$i]);

      if ($tb[3] === $username) { //duplicate
        echo $tb[3];
        $duplicate = true;
        $duplicate_class = "duplicate";
      }
    }

    if (!$duplicate) {
      $txt = $id . ', ' . $fullname . ', ' . $date . ', ' . $username . ', ' . $password . ", 1";
      file_put_contents('adminsample.txt', $txt . PHP_EOL, FILE_APPEND | LOCK_EX);
      $message = "Add successfully";
      echo "<script type='text/javascript'>alert('$message');</script>";
      $script = "http://localhost/no_db/login.php";
      echo "<script>window.location.replace('$script');</script>";
    }
  }

  echo '</pre>';

  ?>
  <form action="protect.php" method="POST">
    <input type="text" name="fullname" value="" required placeholder="Full Name">
    <br>
    <input type="text" name="username" value="" required placeholder="Username">
    <span class="
    <?= $duplicate_class ?? "" ?>">
      <br>
      <?= $duplicate_class ?? "Duplicate username alr." ?>
    </span>
    <br>
    <input type="password" name="pass" value="" required placeholder="Password">
    <br>
    <input type="date" name="date" value="" required placeholder="Date">
    <br>
    <button type="submit" name="submit" value="Submit">Submit</button>
  </form>
  <form method="post">
    <input type="hidden" name="logout" value="1" />
    <input type="submit" value="logout" />
  </form>
</body>

</html>