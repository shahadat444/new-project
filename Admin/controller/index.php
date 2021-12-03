<?php include_once '../model/db_config.php'; ?>

<?php
    $miss1=$miss2=$miss3=$success="";
    $product_name=$product_code="";
    if($_SERVER['REQUEST_METHOD']=="POST"){
        // $product_name =trim($_POST['product_name']);
        // $product_code =trim($_POST['product_code']);
        $product_name =trim($_POST['name']);
        $product_code =trim($_POST['code']);
        echo $product_name;
        //$obj = json_encode($_POST["name"]);
        //header('Content-Type: application/json');
        //echo($obj->name);
        if(empty($product_name) || empty($product_code)){
            if(empty($product_name) && empty($product_code)){
                echo "sadsad";
                $miss1 = "Please fill up both forms";
            }
            else if (empty($product_name)){

                $miss2 = "Please add product_name";
                echo $miss2;
            }
            else if (empty($product_code)){
                $miss3 = "Please add product_code";
            }

            
        }
        else{
            
            $sql = "INSERT INTO product_admin_panal (product_name, product_code) VALUES (?, ?)";
            $sql_statment = mysqli_prepare($link,$sql);
            if ($sql_statment){
                // print_r('ssssss');
                mysqli_stmt_bind_param($sql_statment, "ss", $input1,$input2);
                $input1=$product_name;
                $input2 = $product_code;
                echo $input1;
                $execute = mysqli_stmt_execute($sql_statment);
                if($execute){
                    $success = "Successfully Inserted";
                    //header("location: index.php");

                }
                else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
            // echo "1";
            
        }
        
    }
        
?>
<!DOCTYPE html>
<html>

<?php include '../view/layout/header.php'; ?>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        
        <?php include '../view/layout/side_nevbar.php'; ?>
        <!-- Page Content Holder -->
        <div id="content">
            <?php include '../view/layout/content_menu.php'; ?>
            <div class="container mt-5">
    <div class="row ">
        <div class="col-md-6">
            <div class="mb-3">
                <h3>product_add_form</h3>
                <span id="main_notification" style="display:none;"></span>
                <?php 
                    if(!empty($success)){
                        echo '<span style="color:green;">'.$success.'</span>';
                    }
                    else{
                        echo '<span style="color:red;">'.$miss1.'</span>';
                    }
                ?>
                
            </div>
            <form class="shadow p-4" method="POST">                  
                <div class="mb-3">
                    <label for="product_name">product_name</label>
                    
                    <input value="<?php echo $product_name;?>" type="text" class="form-control" name="product_name"  id="username" placeholder="product_name">
                    <span id="sub_notification" style="display:none;"></span>
                    <?php 
                        if(!empty($miss2)){

                            echo '<span style="color:red;">'.$miss2.'</span>';
                        }
                        
                    ?>
                    <span id="error2" style="display:none;"></span>
                </div>

                <div class="mb-3">
                    <label for="product_code">product_code</label>
                    <input value="<?php echo $product_code;?>" type="text" class="form-control" name="product_code" id="password" placeholder="product_code">
                    <span id="sub_notification2" style="display:none;"></span>
                    <?php 
                        if(!empty($miss3)){

                            echo '<span style="color:red;">'.$miss3.'</span>';
                        }
                    ?>
                </div>

                <div class="mb-3">
                    <button type="button" class="btn btn-primary" onclick="Datainsert();">product_add_form</button>
                </div>
                
            </form>
        </div>
        <div class="col-md-6" id="show_table_div">
            <div class="mb-3">
                <h3>Show Data</h3>
                
            </div>
            <table class="table" id="tableData" class="table table-striped table-bordered table-sm">
            <thead>
                <tr>
                    <th scope="col">product_name</th>
                    <th scope="col">product_code</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
                <tbody id="show_data" >
                    
                </tbody>
            </table>
            <div id="pagination"></div>
        </div>
    </div>
</div>
            
            
        </div>
    </div>

    <?php include '../view/layout/js_lib.php'; ?>
</body>

</html>