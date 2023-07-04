<?php
    include_once('../connec.php');
?>
<?php
 
 if(isset($_GET['search'])){
    $search=$_GET['search'];
}else{
    $search="";
}
   
$sql="
        SELECT *
        FROM
            products
            WHERE
            products.product_name LIKE '%{$search}%'   
        
    ";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>pegemarket</title>
</head>
<body>
    <section>
        <form action="" method="GET">
            <label for="search">ค้นหา</label>
            <input type="text" name="search" id="search" value="<?php echo $search;?>">
        </form>
    </section>
<div class="frame">
        
        <?php
        
            foreach($result as $value){
                echo"              
                <div class='box'>
                   
                   ชื่อสินค้า : {$value['product_name']}<br>
                    <img  width='70%' src='./upload/image/{$value['product_image']}'alt=''><br>
                    ราคา {$value['product_price']} บาท<br>
                     
              
                    </div>
                ";

            }          
        ?>   
            
 </div>
</body>
</html>