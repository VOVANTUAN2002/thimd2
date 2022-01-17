<?php
include_once('db.php');

$db = new db();

$connect = $db->connect();

$sql = 'SELECT * FROM products';

$query = $connect->prepare($sql);

$query->execute();

$products = array();

while ($result = $query->fetch(PDO::FETCH_OBJ)) {
    array_push($products, $result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Loại Hàng</h1>
        <table class="col-12 container">
            <tr>
                <td><label>Nhập tên hàng:</label>
                    <form action="search.php" method="POST">
                        <input name="search" type="text">
                        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
                    </form>
                </td>
                <td><br>
                    <a style="float: right" ; href="add.php" class="btn btn-primary">Thêm mặt hàng</a>
                </td>
            </tr>
        </table>
        <a href="add.php?action=add" class="btn btn-primary">Thêm mới</a>
        </table>
        <table class="table tale-boder" border="2px">
            <thead>
                <tr>
                    <b>
                        <td> ID </td>
                    </b>
                             
                    <b>
                        <td>Tên hàng</td>
                    </b>
                    <b>
                        <td>Loại hàng</td>
                    </b>

                </tr>
            </thead>
            <tbody>
                <!--kiểm tra nếu biến if(empty($customers)):  rỗng-->
                <?php if (count($products) === 0) : ?>
                    <!--kiểm tra nếu mảng rỗng-->
                    <tr>
                        <td>không có</td>
                    </tr>

                <?php endif;

                foreach ($products as $product) :
                ?>
        
                    <td><?= $product->mahang ?></td>
                    <td><?= $product->tenhang ?></td>
                    <td><?= $product->loaihang ?></td>
                    <td><a href="edit.php?mahang=<?php echo $product->mahang ?>" class="btn btn-primary">Sửa</a></td>
                    <td><a href="delete.php?mahang=<?php echo $product->mahang ?>" class="btn btn-danger" onclick="return confirm('Bạn tự tin với quyết định của mình?');">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>