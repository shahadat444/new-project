$( document ).ready(function() {
    showData();
});
function Datainsert(){
    var cat_type_name = document.getElementById("username").value;
    var product_code = document.getElementById("password").value;
    // var error1 = "Please fill up both forms";
    var miss2 = "Please add product_name";
    var miss3 = "Please add product_code";
    if(product_name || product_code==''){
        if(product_name=='' && product_code==''){
            var miss1 = "Please fill up both forms";

            // document.getElementById("main_notification").innerHTML = miss1;
            // document.getElementById("main_notification").style.display ="block";
            // document.getElementById("main_notification").style.color ="red";

            document.getElementById("sub_notification").innerHTML = miss2;
            document.getElementById("sub_notification").style.display ="block";
            document.getElementById("sub_notification").style.color ="red";
            document.getElementById("sub_notification2").innerHTML = miss3;
            document.getElementById("sub_notification2").style.display ="block";
            document.getElementById("sub_notification2").style.color ="red";
            // document.getElementById("sub_notification").style.display ="none";
            // document.getElementById("sub_notification2").style.display ="none";
        }
        else if (product_name ==''){

            
            var miss2 = "Please add product_name";
            document.getElementById("sub_notification").innerHTML = miss2;
            document.getElementById("sub_notification").style.display ="block";
            document.getElementById("sub_notification").style.color ="red";
            document.getElementById("sub_notification2").style.display ="none";
            document.getElementById("main_notification").style.display ="none";
        }
        else if (product_code ==''){
            var miss3 = "Please add product_code";
            document.getElementById("sub_notification2").innerHTML = miss3;
            document.getElementById("sub_notification2").style.display ="block";
            document.getElementById("sub_notification2").style.color ="red";
            document.getElementById("sub_notification").style.display ="none";
            document.getElementById("main_notification").style.display ="none";
        }

        
    }
    else{
        $.ajax({
            method: "POST",
            url:"index.php",
            data: {
                name:product_name,
                code:product_code
            },
            success: function(data){
                //alert(data);
                showData();
            }
            
        });
        var success = "Successfully Inserted";
        document.getElementById("main_notification").innerHTML = success;
        document.getElementById("main_notification").style.display ="block";
        document.getElementById("main_notification").style.color ="green";
        document.getElementById("sub_notification").style.display ="none";
        document.getElementById("sub_notification2").style.display ="none";
    }
    
}
function showData(){
    $.ajax({
        method: "POST",
        url:"show.php",
        success: function(data){
            $('#show_data').html(data);
            // document.getElementById("show_table_div").style.display="block";
        }
        
    });  
}