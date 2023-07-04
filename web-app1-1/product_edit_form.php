<?php include_once('../connec.php');?><br>
<?php
//ทดสอบการรับค่า
    echo $_GET['id'];
    echo $_GET['action'];
//รับค่า
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $action = isset($_GET['action']) ? $_GET['action'] : '';

    $sql="
        SELECT *
        FROM
            products
        WHERE
            products.id = '$id'
     ";
     $result = $conn->query($sql);
     //เอาของออกจากกระเป๋า$resultทีละชิ้น
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
    <title>product edit form</title>
</head>
<body>
    <section>
        <h1>product edit form</h1>
        <form action="r_form.php?id=<?php echo $id; ?>&action=edit" method="POST" enctype="multipart/form-data">
            <label for="pro_name">ชื่อสินค้า</label><br>
            <input type="text" name="pro_name" id="pro_name"value="<?php echo isset($pro_name) ? $pro_name :''; ?>"><br><br>

            <label for="pro_img">รูปสินค้า</label><br>
            <input type="file" name="pro_img" id="pro_img"><br><br>
            <input type="hidden" name="hidden_pro_img" id="hidden_pro_img" value="<?php echo isset($pro_img) ?  $pro_img : ''; ?>">
            <img width="250px" src="./upload/image/<?php echo $pro_img; ?>" alt=""><br>

            <label for="pro_price">ราคาสินค้า</label><br>
            <input type="number" name="pro_price" id="pro_price"value="<?php echo isset( $pro_price) ?  $pro_price :''; ?>"><br><br>

            <input type="submit" name="submit"  value="submit">



        </form>

    </section>
</body>
</html>