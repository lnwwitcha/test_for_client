<?php
    include_once('../connec.php');
?>
<?php
    $sql="
        SELECT *
        FROM
            products
        
        
    ";
    $bag = $conn->query($sql);

    $result = $conn->query($sql);
    foreach($result as $value){
        $id = $value['id'];
        $pro_name = $value['product_name'];
        $pro_img = $value['product_image'];
        $pro_price = $value['product_price'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>หน้าหลัก</title>
</head>
<body>
    <section >
            <button ><a href="product_insert_form.php">เพิ่มสินค้า</a></button>
    </section>
   
 
    </div>
    <div class="frame">
        
            <?php
                foreach($bag as $value){
                    echo"              
                    <div class='box'>
                       
                       ชื่อสินค้า: {$value['product_name']}<br>
                        <img  width='70%' src='./upload/image/{$value['product_image']}'alt=''><br>
                        ราคา {$value['product_price']} บาท
                        <a class='a1' href='product_edit_form.php ? id={$value['id']}&action=edit'>แกไข</a>   
                        <a class='a2' href='r_form.php ? id={$value['id']}&action=delete'>ลบ</a>             
                        </div>
                    ";

                }          
            ?>   
                
     </div>
    
</body>
</html>