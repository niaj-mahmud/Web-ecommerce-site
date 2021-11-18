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
        $productnameErr = $priceErr = $imgErr ="";
        $productname = $price =$img = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name-p"])) {
                $productnameErr = "Name is required";
            } else {
                $productname = test_input($_POST["name-p"]);
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/", $productname)) {
                    $productnameErr = "Only letters and white space allowed";
                }
            }


            if (empty($_POST["price-p"])) {
                $priceErr = "price is required";
            } else {
                $price = test_input($_POST["price-p"]);
            }

            if (empty($_FILES["photo"])) {
                $imgErr = "image is required";
            } else {
                $img = time()."_". basename($_FILES["photo"]["name"]);
            }
            //inset data to database
            if (empty($productnameErr) && empty($priceErr)) {
                $sql = "INSERT INTO products (pname, pprice,productimg) VALUES ('$productname', '$price','$img')";

                if ($conn->query($sql) === TRUE) {
                    echo "<br>New record created successfully";
                    $target_dir = "uploads/";
                    $target_file = $target_dir . $img;
                    echo $target_file;
                    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
                      } else {
                        echo "Sorry, there was an error uploading your file.";
                      }


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
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        Product Name:<br> <input type="text" name="name-p">
        <span class="error">* <?php echo $productnameErr; ?></span>
        <br><br>
        Product Price:<br> <input type="number" name="price-p">
        <span class="error">* <?php echo $priceErr; ?></span>
        <br><br>
        Photo: <input type="file" name="photo">
        <span class="error">* <?php echo $imgErr; ?></span>
        <br><br>
        <input type="submit" name="submit" value="Submit" class="btn btn-info">

    </form>
        <h3>your input check</h3>
    <?php
    
    echo $productname;
    echo '<br>';
    echo $price;
    echo '<br>';
    echo $img;

    ?>




</body>

</html>