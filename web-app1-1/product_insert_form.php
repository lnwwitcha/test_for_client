<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product insert form</title>
</head>
<body>
    <section>
        <h1>product insert form</h1>
        <!-- เมื่อมีการส่งไฟล์input type="file"  formต้องใช้ enctype="multipart/form_data"-->
        <form action="r_form.php" method="POST" enctype="multipart/form-data">
            <label for="pro_name">ชื่อสินค้า</label><br>
            <input type="text" name="pro_name" id="pro_name"><br><br>

            <label for="pro_img">รูปสินค้า</label><br>
            <input type="file" name="pro_img" id="pro_img"><br><br>

            <label for="pro_price">ราคา</label><br>
            <input type="number" name="pro_price" id="pro_price"><br><br>

            <input type="submit" value="submit" value="submit">

        </form>
    </section>
    
</body>
</html>