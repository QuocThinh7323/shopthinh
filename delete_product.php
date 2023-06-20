<?php
    require_once 'connect.php';
    $conn = new Connect();
    $db_link = $conn->connectToPDO();
if (isset($_GET['id'])):
    $value = $_GET['id'];
    $sqlSelect = "DELETE FROM `product` WHERE pid = ?";
    $stmt = $db_link->prepare($sqlSelect);
    $execute = $stmt->execute(array("$value"));
    if($execute){
        header("Location: product_management.php");
    }else{
        echo "Fail".$execute;
    }
endif;
?>