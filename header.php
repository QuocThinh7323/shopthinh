<?php
    session_start();
    ob_start();
    ?>
<!DOCTYPE html>
<html>

<head>
    <title>ATN Shop</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Nếu như ko có dòng này thì kích thước ở đt sẽ ko đc thay đổi -->
    <meta name="viewport" content="width:device-width, initial-scale=1.0">
</head>
<style>
body {
    background-color: #DDDDDD;
}
</style>
<nav class="navbar navbar-expand-md" style="background-color:#555555">
    <div class="container-fluid">
        <a href="http://localhost:8080/simpleweb/homepage.php" class="navbar-brand">     <!-- Sửa ở đây -->
            <img src="../simpleweb/image/logoweb.jpeg" alt="" width="70px" height="50px"></a>

        <!-- tạo ra nút 3 gạch và khi nhấn vào nút 3 gạch thì 1 đường viền sẽ xuất hiện -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>

        <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        </style>

        <!-- Tạo Menu -->
        <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav fw-bold">
                <a class="nav-link active" href="Index.php">Home</a>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Manage</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="product_management.php">Product</a>
                        <a class="dropdown-item" href="category_management.php">Add Category</a>
                        <!-- <a class="dropdown-item" href="#">Order</a> -->
                    </div>
             
                </div>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" dta-bs-toggle="dropdown">Product Category</a>
                  
                    <div class="dropdown-menu">
                        <?php
                                include_once 'connect.php';
                                $c = new connect();
                                $dblink = $c->connectToMySQl();
                                $sql = "SELECT * FROM category";
                                $re = $dblink->query($sql);
                                while($row = $re->fetch_row()):
                            ?>
                        <a class="dropdown-item" href="?category_id=<?=$row[0]?>"><?=$row[1]?></a>
                        <?php
                                endwhile;
                            ?>

                    </div>
                </div>
                <a class="nav-link" href="cart.php"><i class="bi bi-cart4"></i></a>
            </div>

            <div class="navbar-nav ms-auto">
                <?php
                        // if(isset($_SESSION['user_name'])):
                        if(isset($_COOKIE['cc_username'])):
                    ?>
                <a href="#" class="nav-item nav-link">Welcome,<?=$_COOKIE['cc_username']?></a>
                <a href="logout.php" class="nav-item nav-link">Logout</a>

                <?php
                    else:
                    ?>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <a href="register.php" class="nav-item nav-link">Register</a>
                <?php
                    endif;
                    ?>
            </div>
        </div>
    </div>
</nav>