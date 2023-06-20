<?php
include_once 'header.php';
?>

<body>
    <!-- Sidebar -->
    <!-- div content -->
    <div id="main" class="container">
        <div className="page-heading pb-2 mt-4 mb-2 ">
            <h1>Product Category</h1>
        </div>
        <form name="frm" method="post" action="">

            <p>
                <a href="add_category.php" class="text-decoration-none"> Add</a>
            </p>
            <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><strong>Category ID</strong></th>
                        <th><strong>Category Name</strong></th>
                        <th><strong>Edit</strong></th>
                        <th><strong>Delete</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                include_once 'connect.php';
                $conn = new Connect();
                $db_link = $conn->connectToMySQL();
                $sql = "select * from category";
                $re = $db_link->query($sql);
                while($row = $re->fetch_assoc()):
                ?>
                    <tr>
                        <td><?=$row['cat_id']?></td>
                        <td><?=$row['catName']?></td>
                        <td style='text-align:center'><a href="add_category.php?cid=<?=$row['cat_id']?>"
                                class="text-decoration-none"> Edit</a></td>
                        <td style='text-align:center'><a href="delete_category.php?cid=<?=$row['cat_id']?>"
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