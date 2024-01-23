<?php

namespace App\Models;

use PDO;

class BaseModel
{
    protected $conn;
    protected $sqlBuilder = "";
    protected $tableName;
    public function __construct()
    {
        $host = HOSTNAME;
        $dbname = DBNAME;
        $username = USERNAME;
        $password = PASSWORD;
        try {
            $this->conn = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Lỗi kết nối dữ liệu: " . $e->getMessage();
        }
    }

    //Phương thức lấy ra toàn bộ dữ liệu của bảng
    public static function all()
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName";
        //Chuẩn bị
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //Thực thi
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Phương thức find: dùng để tìm dữ liệu theo id
    public static function find($id)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE id=:id";
        //Chuẩn bị
        $stmt = $model->conn->prepare($model->sqlBuilder);
        //Thực thi
        $stmt->execute(['id' => $id]);
        //lấy dữ liệu
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        if ($result) {
            return $result[0]; //Làm gọn lại mảng khi lấy
        }
        return $result;
    }

    /**
     * Xử lý câu lệnh có điều kiện
     * $column là tên cột
     * $codition điều kiện (>, <, =, ...)
     * $value giá trị
     * */

    public static function where($column, $codition, $value)
    {
        $model = new static;
        $model->sqlBuilder = "SELECT * FROM $model->tableName WHERE `$column` $codition '$value' ";
        return $model;
    }
    //Thêm điều kiện and cho hàm trên
    public function andWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " AND `$column` $codition '$value'";
        return $this;
    }
    public function orWhere($column, $codition, $value)
    {
        $this->sqlBuilder .= " OR `$column` $codition '$value'";
        return $this;
    }
    //Thực thi câu lệnh điều kiện
    public function get()
    {
        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    //Xóa dữ liệu
    public static function delete($id)
    {
        $model = new static;
        $model->sqlBuilder = "DELETE FROM $model->tableName WHERE id=:id";
        $stmt = $model->conn->prepare($model->sqlBuilder);
        $stmt->execute(['id' => $id]);
    }

    //Thêm dữ liệu
    public function insert($data)
    {
        $this->sqlBuilder = "INSERT INTO $this->tableName(";

        //Lưu lại value của câu lệnh SQL
        $values = " VALUES(";
        //lặp để lấy key (tên cột của bảng) trong data
        foreach ($data as $column => $value) {
            $this->sqlBuilder .= "`{$column}`, ";
            $values .= ":$column, ";
        }
        //Đi xóa dấu ", " ở bên phải của chuỗi
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        $values = rtrim($values, ", ");
        //Nối chuỗi sql với values
        $this->sqlBuilder .= ") " . $values . ")";

        $stmt = $this->conn->prepare($this->sqlBuilder);
        $stmt->execute($data);
        //Trả lại cái giá trị của id mới thêm vào
        return $this->conn->lastInsertId();
    }

    /**
     * Method update: dùng để cập nhật dữ liệu
     * @$id: giá trị của khóa chính
     * @$data: mảng dữ liệu cần cập nhật, phải được thiết kế có key và value
     * key phải là tên cột
     */
    public function update($id, $data)
    {
        $this->sqlBuilder = "UPDATE $this->tableName SET ";
        foreach ($data as $column => $value) {
            $this->sqlBuilder .= "`{$column}`=:$column, ";
        }
        //Xóa, loại bỏ dấu ", "
        $this->sqlBuilder = rtrim($this->sqlBuilder, ", ");
        //Nối câu lệnh điều kiện
        $this->sqlBuilder .= " WHERE id=:id";

        $stmt = $this->conn->prepare($this->sqlBuilder);
        //Đưa id vào trong mảng data
        $data['id'] = $id;
        return $stmt->execute($data);
    }
}
