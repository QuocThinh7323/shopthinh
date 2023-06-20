<?php
    include_once 'header.php';
    include_once 'connect.php';

    $c = new connect();
    $dblink = $c->connectToPDO();
    if(isset($_COOKIE['cc_username'])){
        $user =$_COOKIE['cc_username'];
        $user_id =$_COOKIE['cc_id'];
    if(isset($_GET['pid'])){
        $p_id = $_GET['pid'];
        $sqlSelect1="SELECT pid FROM cart WHERE user_id=? AND pid=?";
        $re= $dblink->prepare($sqlSelect1);
        $re->execute(array("$user_id","$p_id"));


        if($re->rowCount()== 0){
            $query = "InSERT INTO cart(user_id, pid, pCount, date) VALUES(?,?,1,CURDATE())";

        }else{
            $query ="UPDATE cart SET pcount = pCount +1 where user_id =? and pid=?";
        }
        $stmt = $dblink->prepare($query);
        $stmt->execute(array("$user_id","$p_id"));

    }else if(isset($_GET['del_id'])){
        $cart_del = $_GET['del_id'];
        $query =" DELETE FROM cart WHERE cart_id=?";
        $stmt = $dblink->prepare($query);
        $stmt->execute(array($cart_del));

    }
        $sqlSelect = "SELECT * from cart c, product p where c.pid = p.pid and user_id=?";
        $stmt1 = $dblink->prepare($sqlSelect);
        $stmt1->execute(array($user_id));
        $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
    }
    else{
         header("Location: login.php");

    }
?>
    <div class="container">
        <h1 class="fw-bol mb-0 text-blank">Shopping Cart</h1>
        <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
     <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    <?php
        $totalallprice = 0;
        foreach($rows as $row){
        $total = 0;
        $Price = $row['pCount'] * $row['price'];
        $total = $total + $Price;
        $totalallprice+=$total;
    ?>
        <tr>
            <td><?=$row['pname']?></td>
            <td> <input id="form1" min="0" name="Quantity" value="<?=$row['pCount']?>" type="number"
                    class="form-control form-control-sm" /></td>
            <td>
                <h6 class="mb-0"><span>&#8363;</span><?=$total?></h6>
            </td>
            <td><a href="cart.php?del_id=<?=$row['cart_id']?>" class="text-muted text-decoration-none">X</a></td>
        </tr>

        <?php    
    }
?>
        <tr>
            <td colspan="2"> Total all price</td>
            <td style="background-color: #CCC;"><?=$totalallprice;?></td>
            <td></td>
        </tr>
    </table>
    <hr class="my-4">

    <div class="pt-5">
        <h6 class="mb-0"><a href="homepage.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to
                shop</a></h6>
    </div>