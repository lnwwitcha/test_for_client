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
    <link rel="stylesheet" href="styletest2.css">
    <title>pegemarket2</title>
</head>
<body>
    <section>
        <form action="" method="GET">
            <label for="search">ค้นหา</label>
            <input type="text" name="search" id="search" value="<?php echo $search;?>">
        </form>
    </section>
<div class="frame">
        

 <div class="frame2" >
 <?php
 foreach($result as $value){
                echo" 
    <div class='box_products'>

    <div class='image'>
        <img class='img_product'  src='./upload/image/{$value['product_image']}' alt=''>
    
    </div>
    <p class='product_name'>{$value['product_name']}</p>
    <div class='detail_ather'>
        <div class='unit'><p>หน่วย</p></div>
        <div class='price'><p>ราคา (บ.)</p></div><br>
        <div class='unit_value'></div>
        <div class='price_value'>{$value['product_price']}</div>
    </div>
    <div class='box_input_amount'>
        <input class='input_amount' type='number' name='' id=''>
    </div>
    </div>";
 }
?>
</div>
</body>
</html>