<?php
    include_once 'connect.php';
    // include_once 'header.php'
    // ini_set('display_errors', 1);
    //  ini_set('display_startup_errors', 1);
    //  error_reporting(E_ALL);
    if(isset($_POST['register'])){
        $gender = $_POST['grpGender'];
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $email = $_POST['txtEmail'];
        $phone = $_POST['phone'];
        $dateBirthday = date('Y-m-d',strtotime($_POST['txtBirth']));
        $c = new Connect();
        // $db = $c->connectToMySQL();
        // $sql = 'INSERT INTO `user`( `email`, `username`, `gender`, `address`, `password`, `role`, `phone`, `birthday`)
        //  VALUES ("$email","$usrname",$gender,"Cantho","$pass","user","$phone","$dateBirthday")';
        // $stmt = $db->query($sql);
       try{ $dblink = $c->connectToPDO();
        $sql = "INSERT INTO `users`(`email`, `fullname`, `gender`, `address`, `password`, `role`, 
        `phone`, `birthday`) VALUES(?,?,?,?,?,?,?,?)";    
        $re = $dblink->prepare($sql); 
        
        $stmt = $re->execute(array("$email","$username",$gender,"Cantho","$pass","user","$phone","$dateBirthday"));
        if ($stmt == TRUE){
            echo "Congrats!";
           // header("Location: homepage.php");
        } else {
            echo "Failed! ".$stmt;
        }
    }catch(Exception $e) {
        echo 'Exception -> ';
        var_dump($e->getMessage());
    }
    }    
?>
<div class="container px-4 py-5">
    </p>
    <!DOCTYPE html>
    <html>

    <head>
        <title>QT_store</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
            integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
            integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <meta name="viewport" content="width:device-width, initial-scale =1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
            integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <!--thanh điều hướng thu vào mở ra và kích cỡ bảng-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand"> LOGO</a>

            <!-- toggler menu-->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <style>
            .dropdown:hover .dropdown-menu {
                display: block;
            }
            </style>
            <div class="collapse navbar-collapse" id="navbarMain">
                <div class="navbar-nav ">
                    <a class="nav-link active" href="Index.php">Home</a>  <!-- sửa ở đây-->
                    <a class="nav-link" href="cart.php">Cart</a>
                    <div class="dropdown">
                        <a href="Product.php" class="nav-link
                dropdown-toggle" data-bs-toggler="dropdown">
                            Manage
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Product</a>
                            <a class="dropdown-item" href="#">Account</a>
                            <a class="dropdown-item" href="#">Order</a>
                        </div>
                    </div>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="" class="nav-item nav-link">Welcome, Thinnh</a>
                    <a href="" class="nav-item
                nav-link"> Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <body>
        <div class="container">
            <h2> Registration </h2>
            <form action="" id="form1" name="form1" method="POST" class="needs-validation">
                <div class="row pb-3">
                    <label for="username" class="col-md-2 
                 col-form-label">
                        Username(*):
                    </label>
                    <div class="col-md-10">
                        <input type="text" name="username" id="username" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="password" class="col-md-2 col-form-label">
                        Password(*):
                    </label>
                    <div class="col-md-10">
                        <input type="password" name="pass" id="password" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="password" class="col-md-2 col-form-label">
                        confirm Password(*):
                    </label>
                    <div class="col-md-10">
                        <input type="password" name="pass2" id="password" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="phone" class="col-md-2 
                     col-form-label">
                        Phone(*):
                    </label>
                    <div class="col-md-10">
                        <input type="phones" name="phone" id="phone" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="email" class="col-md-2 
                 col-form-label">
                        Email(*):
                    </label>
                    <div class="col-md-10">
                        <input type="text" name="txtEmail" id="email" required class="form-control" />
                    </div>
                </div>
                <div class="row pb-3">
                    <label for="gender" class="col-md-2 
                         col-form-label">
                        Gender(*):
                    </label>
                    <div class="col-md-10 d-flex">
                        <div class="form-check pe-3">
                            <input type="radio" name="grpGender" value="0" id="maleRd" checked
                                class="form-check-input" />
                            <label for="maleRd" class="form-check-label">Male</label>
                        </div>
                        <div class="form-check">
                            <div class="form-check my-auto">
                                <input type="radio" name="grpGender" value="1" id="femaleRd" class="form-check-input" />
                                <label for="femaleRd" class="form-check-laber">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="country" class="col-md-2 
                                 col-form-label">
                            Country(*):
                        </label>
                        <div class="col-md-10 ms-auto">
                            <select id="country" class="form-select">
                                <option selected>
                                    choose your country
                                </option>
                                <option value="vn">Vietnam</option>
                                <option value="uk">UK</option>
                            </select>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="birthday" class="col-md-2 col-form-label">
                            Birthday:
                        </label>
                        <div class="col-md-10 ms-auto">
                            <input type="date" name="txtBirth" id="birthday" required class="form-control" />
                        </div>
                    </div>
                    <div class="row pb-3">
                        <div class="col-md-10 ms-auto">
                            <input type="submit" value="Register" class="btn btn-primary" name="register" id="register">
                        </div>
                    </div>
            </form>
        </div>

    </body>

    </html>
    <?php
include_once 'footer.php';
       ?>