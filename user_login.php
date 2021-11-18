<!DOCTYPE HTML>
<html>

<head>
  <title>e-comerse</title>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="design.css">

</head>



<body class="login">

  <div>

    <?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "institute";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";

    // define variables and set to empty values
    $nameErr = $emailErr = $passErr = $genderErr = $websiteErr = $BdateErr = "";
    $name = $email = $pass = $gender = $comment = $website = $Bdate = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = test_input($_POST["name"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
      }
      if (empty($_POST["website"])) {
        $website = "";
      } else {
        $website = test_input($_POST["website"]);
        // check if URL address syntax is valid
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $website)) {
          $websiteErr = "Invalid URL";
        }
      }

      if (empty($_POST["pass-in"])) {
        $passErr = "password is required";
      } else {
        $pass = test_input($_POST["pass-in"]);
      }

      if (empty($_POST["comment"])) {
        $comment = "";
      } else {
        $comment = test_input($_POST["comment"]);
      }

      if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
      } else {
        $gender = test_input($_POST["gender"]);
      }
      if (empty($_POST["B-date"])) {
        $BdateErr = "Date is required";
      } else {
        $Bdate = test_input($_POST["B-date"]);
      }

      if (empty($nameErr) && empty($emailErr) && empty($genderErr) && empty($websiteErr) && empty($BdateErr)) {
        $sql = "INSERT INTO user (Name, Email, Password, Gender, BirthDate) VALUES ('$name', '$email', 
        '$pass', '$gender', '$Bdate')";

        if ($conn->query($sql) === TRUE) {
          echo "<br> new record added ";
           
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
      }
    }

    function test_input($data)
    {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    ?>
  </div>

  <h2>Sign Up</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Name:<br> <input type="text" name="name">
    <span class="error">* <?php echo $nameErr; ?></span>
    <br><br>
    E-mail:<br> <input type="text" name="email">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    Password :<br> <input type="password" name="pass-in">
    <span class="error">* <?php echo $passErr; ?></span>
    <br><br>
    Birth Date:<br><input type="date" name="B-date">
    <span class="error"><?php echo $BdateErr; ?></span>
    <br><br>
    Website: <br><input type="text" name="website">
    <span class="error"><?php echo $websiteErr; ?></span>
    <br><br>
    Comment: <br><textarea name="comment" rows="5" cols="40"></textarea>
    <br><br>
    Gender:
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="other">Other
    <span class="error">* <?php echo $genderErr; ?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit" class="btn btn-info">
  </form>

  <?php
  echo "<h2>Your Input:</h2>";
  echo $name;
  echo "<br>";
  echo $email;
  echo "<br>";
  echo $pass;
  echo "<br>";
  echo $Bdate;
  echo "<br>";
  echo $website;
  echo "<br>";
  echo $comment;
  echo "<br>";
  echo $gender;

  ?>

</body>

</html>