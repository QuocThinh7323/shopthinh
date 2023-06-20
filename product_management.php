<?php
include_once 'header.php';

?>

<body>
    <!-- Sidebar -->
    <!-- div content -->
    <div id="main" class="container">
        <div className="page-heading pb-2 mt-4 mb-2 ">
            <h1>Product </h1>
        </div>
        <form name="frm" method="post" action="">

            <p>
                <a href="proadd.php" class="text-decoration-none"> Add</a>
            </p>
            <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><strong>ProductId</strong></th>
                        <th><strong>Product Name</strong></th>
                        <th><strong>Price </strong></th>
                        <th><strong>Status</strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Quantity</strong></th>
                        <th><strong>Cat Id</strong></th>
                        <th><strong>Image</strong></th>
                        <th><strong>Supplier</strong></th>
                        <th><strong>User Id</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                include_once 'connect.php';
                $conn = new Connect();
                $db_link = $conn->connectToMySQL();
                $sql = "select * from product";
                $re = $db_link->query($sql);
                while($row = $re->fetch_assoc()):
                ?>
                    <tr>
                        <td><?=$row['pid']?></td>
                        <td><?=$row['pname']?></td>
                        <td><?=$row['price']?></td>
                        <td><?=$row['status']?></td>
                        <td><?=$row['description']?></td>
                        <td><?=$row['quantity']?></td>
                        <td><?=$row['cat_id']?></td>
                        <td><?=$row['image']?></td>
                        <td><?=$row['Supplier_id']?></td>
                        <td><?=$row['user_id']?></td>
                        <td style='text-align:center'><a href="proadd.php?id=<?=$row['pid']?>"
                                class="text-decoration-none"> Edit</a></td>
                        <td style='text-align:center'><a href="delete_product.php?id=<?=$row['pid']?>"
                                class="text-decoration-none"> Delete</a></td>
                    </tr>
                    <?php
                endwhile;
            ?>
                </tbody>
            </table>
        </form>
    </div>

</body>

</html>