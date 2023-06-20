<?php
    include_once 'header.php';
?>
<div class="container px-4 py-5">
    <div class="row d-flex justify-content-center align-items-center p-3">

        <div class="col-md-8">

            <div class="search">
                <form class="example1" action="search.php">
                    <input type="text" class="form-control" placeholder="Search..." name="search" style="width: 500px;">
                    <button class="btn btn-primary" name="btnSearch"
                        style="position:absolute; top:140px; left: 800px;width: 100px;">Search</button>
                </form>
            </div>
        </div>
    </div>
    <h2>All product</h2>
    <div class="row">
        <?php
                //MySQLi
                include_once './connect.php';
                $c = new Connect();
                $dblink = $c->connectToMySQL();
                if(isset($_GET['category_id'])){
                    $catid = $_GET['category_id'];
                    $sql = "SELECT * FROM product WHERE cat_id='".$catid."'";
                }else{
                       $sql = "Select * From product";
                }
                //
                $re = $dblink->query($sql);
                // $row1=$re->fetch_row();
                // echo $row1[5];
                // echo"<br>";
                 // $re->data_seek(0);
                if($re->num_rows > 0):
                while($row=$re->fetch_assoc()):
                if($row['quantity']>0){
            ?>

        <div class="col-md-4 pb-3">
            <div class="card">
                <img src="./image/<?=$row['image']?>" class="card-img-top" alt="Product1>" style="margin: auto;
                        width: 300px;" />
                <div class="card-body">
                    <a href="detail.php?id=<?=$row['pid']?>" class="text-decoration-none">
                        <h5 class="card-title"><?=$row['pname']?></h5>
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span> <?=$row['price']?></h6>
                    <a href="detail.php?id=<?=$row['pid']?>" class="btn btn-primary"
                    class="text-decoration-none">Add To Cart <h5></h5>
                </a>

                </div>
            </div>
        </div>
        <?php
                }
            endwhile;
          
            else:
            echo "Not found";
            endif;
            ?>
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<?php
include_once 'footer.php';
?>