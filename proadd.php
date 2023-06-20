<?php
include_once './header.php';
include_once 'connect.php';
if (isset($_POST['btnSubmit'])) {

    $pid = $_POST['pid'];
    $pname = $_POST['pname'];
    $status = $_POST['status'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $cat_id = $_POST['cat_id'];
    $supplier_id = $_POST['supplier_id'];
    $user_id = $_POST['user_id'];

    $img = str_replace(' ', '-', $_FILES['Pro_image']['name']); //tùy chỉnh hình ảnh
    $storedImange ="./image/"; //duobng792 dẫn lưu hình ảnh

    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $storedImange.$img); //lưu hình vào upload vào trong project

        $c = new Connect();
        $dblink = $c->connectToPDO(); //connectToMySQL();
        // $namep = $_GET['search'];//DÙng đối với PDO
        $sql = "INSERT INTO `product`(`pid`, `pname`, `price`, `status`, `description`, `quantity`, `cat_id`, `image`, `Supplier_id`, `user_id`) VALUES (?,?,?,?,?,?,?,?,?,?)"; //CONCAT('%',:namep,'%')'%..%' là thể hiện sự tìm kiếm
        // <1>
        $re = $dblink->prepare($sql); //query con trỏ chuột ở vị trí đầu tiên //prepare trong tìm kiếm: chuẩn bị
        // $re->bindParam(':namep',$namep, PDO::PARAM_STR);
        // $re->execute();//Chỉ dùng cho bindParam
        $stmt = $re->execute(array("$pid", "$pname", "$price", "$status", "$description", "$quantity", "$cat_id", "$img", $supplier_id, $user_id));

        if ($stmt == TRUE) {
            echo "Congrats!";
        } else {
            echo "Failed!!!";
        }

}
?>
<div id="main" class="container mt-4">
    <form class="form form-vertical" method="POST" enctype="multipart/form-data"> <!--upload được file cần có enctype -->
        <div class="form-body">
            <div class="row">

                <div class="col-12">

                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ProductId</label>
                    <input type="text" class="form-control" name="pid" id="exampleFormControlInput1" placeholder="pid">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ProductName</label>
                    <input type="text" class="form-control" name="pname" id="exampleFormControlInput1" placeholder="pname">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="text" class="form-control" name="price" id="exampleFormControlInput1" placeholder="price">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" id="exampleFormControlInput1" placeholder="status">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="description" id="exampleFormControlInput1" placeholder="description">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" name="quantity" id="exampleFormControlInput1" placeholder="quantity">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <input type="text" class="form-control" name="cat_id" id="exampleFormControlInput1" placeholder="cat_id">
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                    <input type="text" class="form-control" name="supplier_id" id="exampleFormControlInput1" placeholder="Supplier_id">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">UserID</label>
                    <input type="text" class="form-control" name="user_id" id="exampleFormControlInput1" placeholder="user_id">
                </div>
                <div class="col-12 d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div> <!--main-->