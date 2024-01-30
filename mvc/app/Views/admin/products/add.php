<form action="<?= ROOT_PATH ?>product/create" method="post" enctype="multipart/form-data">
    Tên sản phẩm
    <input type="text" name="name" id="">
    <br>
    Chọn danh mục
    <select name="cate_id" id="">
        <?php foreach ($categories as $cate) : ?>
            <option value="<?= $cate->id ?>">
                <?= $cate->cate_name ?>
            </option>
        <?php endforeach ?>
    </select>
    <br>
    Hình ảnh
    <input type="file" name="image" id="">
    <br>
    Giá <input type="number" name="price" id="">
    <br>
    Chi tiết sản phẩm
    <textarea name="detail" id="" cols="100" rows="10"></textarea>
    <br>
    <button type="submit">Thêm</button>
</form>