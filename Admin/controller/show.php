<?php 
    include_once '../model/db_config.php';

    $sql = "SELECT * FROM product_admin_panal";
    $execute = mysqli_query($link,$sql);
    if($execute->num_rows>0){
        while($row=$execute->fetch_assoc()){
            echo '<tr>';
                echo '<td>'.$row['product_name'].'</td>';
                echo '<td>'.$row['product_code'].'</td>';
                echo '<td>'.'Edit'.'</td>';
                echo '<td>'.'Delete'.'</td>';
            echo '</tr>';
            // $output[] = array ($row['product_name'],$row['product_code']);
        }
        // echo json_encode($output);
    }
?>