<?php include_once('../connec.php'); ?>
<?php
//ใช้สำหรับตรวจสอบค่าที่ส่งมา
    // print_r($_POST);
    // print_r($_FILES);

//รับค่ามาเก็บที่ตัวแปร
    $pro_name = isset($_POST['pro_name']) ?$_POST['pro_name']:'';        
    $pro_price =isset($_POST['pro_price']) ? $_POST['pro_price'] :'';
    $pro_img = isset($_FILES['pro_img']['name']) ? $_FILES['pro_img']['name']:'';
    $temp = isset($_FILES['pro_img']['tmp_name']) ? $_FILES['pro_img']['tmp_name']:'';

    //รับเพิ่มจากหน้า edit
    $id=isset($_GET['id'])?$_GET['id']:'';
    $action=isset($_GET['action'])?$_GET['action']:'';
    $hidden_pro_img=isset($_POST['hidden_pro_img'])?$_POST['hidden_pro_img']:'';
//ADD
//ถ้าไม่มี id าินค้าส่งเข้ามา ให้เข้ามาทำในนนี้
    if(isset($_GET['id'])==''){
        //มีการ upload file มาด้วยไหม
        if(is_uploaded_file($temp)){
            move_uploaded_file($temp,'upload/image/'.$pro_img);

        }else{//แต่ถ้าไม่มีการ upload รูปมาก็ให้ชื่อรูปว่า none
            $pro_img='none.png';
        }

    
    $sql_insert = "
        INSERT INTO products(
            products.product_name,
            products.product_image,
            products.product_price
            
            
        )VALUE(
            '$pro_name',
            '$pro_img',
            '$pro_price'
            
            
        )
    
    ";
    $result = $conn->query($sql_insert);
    echo"<h1>บันทึกข้อมูลเรียบรอยแล้ว</h1>";
    echo"<button ><a href='index.php'>กลับไปหน้าหลัก</a></button>";
}
    // Edit
    if(isset($_GET['id']) && $_GET['action']=='edit'){
        if(is_uploaded_file($temp)){
            move_uploaded_file($temp,'upload/image/'.$pro_img);
            if($hidden_pro_img != 'none.png'){
                @unlink('upload/image/'.$hidden_pro_img);
            }
            

        }else{
            $pro_img = $hidden_pro_img;
        }
        $sql_update ="
            UPDATE products SET
                products.product_name = '$pro_name',
                products.product_image = '$pro_img',
                products.product_price = '$pro_price'
            WHERE
                products.id='$id'
        ";
        $result = $conn->query($sql_update);
        echo"<h1>แก้ไขข้อมมูลเรียบร้อยแล้ว</h1>";
        echo"<a href='index.php'>กลับไปหน้าหลัก</a>";
    }

    //delete
    if(isset($_GET['id']) && $_GET['action']=='delete'){
        $sql_delete = "
        DELETE
        FROM
            products
        WHERE
            products.id='$id'
        ";
        $result = $conn->query($sql_delete);
        echo "<h1>ลบข้อมูลเรียบร้อยแล้ว</h1>";
        echo "<a href='index.php'>กลับหน้าหลัก</a>";
    }
?>