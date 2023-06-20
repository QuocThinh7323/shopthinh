<?php
include_once("connect.php");
if(isset($_POST['btnLogout'])){
    if(isset($_POST['txtPass'])&&isset($_POST['txtEmail'])){
        $pwd = $_POST['txtPass'];
        $email = $_POST['txtEmail'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM users WHERE email = ? and password = ?";
        $stmt = $dblink->prepare($sql);
        $re = $stmt->execute(array("$email","$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow==1){
            echo "Logout succsessfully";
            setcookie("cc_username",$row['fullname'],time()+60);
            setcookie("cc_id",$row['id'],time()-60);
            header("Location: Index.php");

        }
        else{
            echo "Something wrong with your info<br>";

        }
    }else{
        echo "Please enter your info";
     }
}
?>
<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
    integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" 
    integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Nếu như ko có dòng này thì kích thước ở đt sẽ ko đc thay đổi -->
    <meta name="viewport" content="width:device-width, initial-scale=1.0">
</head>

<div class="container">
    <h2 class="text-center">Member Login</h2>
    <form id="form1" name="form1" method="POST" action="login.php">

        <div class="row">
            <div class="form-group">
                <label for="txtEmail" class="col-sm-2 control-label">Email(*): </label>
                <div class="col-sm-10">
                    <input type="email" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email"
                        value="" />
                </div>
            </div>

            <div class="form-group">
                <label for="txtPass" class="col-sm-2 control-label">Password(*): </label>
                <div class="col-sm-10">
                    <input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password"
                        value="" />
                </div>
            </div>
            <div class="form-group pt-3">
                <div class="col-sm-2"></div>
                <div class="col-sm-10">
                    <input type="submit" name="btnLogin" class="btn btn-primary" id="btnLogin" value="Login" />
                    <input type="reset" name="btnCancel" class="btn btn-primary" id="btnCancel" value="Cancel" />
                </div>
            </div>
        </div>

    </form>
</div>