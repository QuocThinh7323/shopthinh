<?php
include_once 'header.php';
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
<body>
    <!-- Sidebar -->
    <!-- div content -->
    <div id="main" class="container">
        <div className="page-heading pb-2 mt-4 mb-2 ">
            <h1>Product Category</h1>
        </div>
        <?php
           require_once 'connect.php';
           $conn = new Connect();
           $db_link = $conn->connectToPDO();
           if(isset($_POST['txtID']) && isset($_POST['txtName'])):
           $cid = $_POST['txtID'];
           $cname = $_POST['txtName'];
        if(isset($_POST['btnAdd']))://add action
                $sqlInsert = "INSERT INTO `category`(`cat_id`, `catName`) VALUE (?, ?)";
                $stmt = $db_link->prepare($sqlInsert);
                $execute = $stmt->execute(array("$cid","$cname"));
                if($execute){
                        header("Location: category_management.php");
                } else{
                        echo "Failed".$execute;
                }
        endif;
endif;
        ?>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category ID(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Category ID"
                        value='<?php echo isset($_GET["cid"])?($_GET["cid"]):"";?>'>
                </div>
            </div>
            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Category Name"
                        value="<?php echo isset($catName)?($catName):"";?>">
                </div>
            </div>


            <div class="form-group pb-3">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary"
                        name="<?php echo isset($_GET["cid"])?"btnEdit":"btnAdd";?>" id="btnAction"
                        value='<?php echo isset($_GET["cid"])?"Edit":"Add new";?>' />
                    <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Back to list"
                        onclick="window.location.href='category_management.php'" />

                </div>
            </div>
        </form>
    </div>
    <!--main-->
</body>

</html>