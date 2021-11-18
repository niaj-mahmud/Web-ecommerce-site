<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
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

<body>
    <div class="jumbotron text-center">
        <div class="logo">
            <a href="index.php"> <img src="pictures\logo.png" width="100" height="100"></a>
        </div>

        <p class="text-white-50 bg-dark"> Welcome to Mr.<?php echo $_SESSION["admin_user"] ?></p>
        <?php include 'menu.php'; ?>


        <h2>Cart</h2>


        <div class="wrapper">
            <table>
                <tr>
                    <th>item</th>
                    <th>Price</th>
                    <th>Unit</th>
                    <th>Total Price</th>

                </tr>
                <tr>
                    <td>Peter</td>
                    <td>Griffin</td>
                    <td>$100</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>Lois</td>
                    <td>Griffin</td>
                    <td>$150</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>Joe</td>
                    <td>Swanson</td>
                    <td>$300</td>
                    <td>$100</td>
                </tr>
                <tr>
                    <td>Cleveland</td>
                    <td>Brown</td>
                    <td>$250</td>
                    <td>$100</td>

                </tr>
                <tr>
                    <td>Total</td>


                    <td></td>
                    <td></td>
                    <td></td>

                </tr>
            </table>
        </div>



        <div class="container ">
            <div class="vertical-center">
                <button type="button" class="btn btn-primary">Pay Bill</button>
            </div>
        </div>

</body>

</html>