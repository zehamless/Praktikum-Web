<?php
function process_post($param)
{
    if ((count($param) == 1) and ($param[0] == 'apitambah' or $param[0] == 'tambah')) {

        $dataNama = (isset($_POST['nama_barang'])) ? $_POST['nama_barang'] : null;
        $dataJumlah = (isset($_POST['jumlah'])) ? $_POST['jumlah'] : null;
        $dataKode = (isset($_POST['kode_barang'])) ? $_POST['kode_barang'] : null;
        $dataTanggal = (isset($_POST['tanggal_masuk'])) ? $_POST['tanggal_masuk'] : null;

        try {
            require_once 'config.php';
            $handle = $conn->prepare('INSERT INTO barangs (nama_barang, jumlah, kode_barang, tanggal_masuk) VALUES (:nama_barang, :jumlah, :kode_barang, :tanggal_masuk)');
            $handle->bindParam(':nama_barang', $dataNama, PDO::PARAM_STR);
            $handle->bindParam(':jumlah', $dataJumlah, PDO::PARAM_INT);
            $handle->bindParam(':kode_barang', $dataKode, PDO::PARAM_STR);
            $handle->bindParam(':tanggal_masuk', $dataTanggal, PDO::PARAM_STR);
            $handle->execute();
            if ($handle->rowCount()) {
                $status = 'Berhasil';
                if ($param[0] == 'tambah') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status, 'data' => array('nama_barang' => $dataNama, 'jumlah' => $dataJumlah, 'kode_barang' => $dataKode, 'tanggal_masuk' => $dataTanggal));
                    echo json_encode($arr);
                }
            } else {
                $status = 'Gagal';
                if ($param[0] == 'tambah') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status, 'data' => array('nama_barang' => $dataNama, 'jumlah' => $dataJumlah, 'kode_barang' => $dataKode, 'tanggal_masuk' => $dataTanggal));
                    echo json_encode($arr);
                }
            }
        } catch (PDOException $pe) {
            die(json_encode($pe->getMessage()));
        }
    } elseif ((count($param) == 2) and ($param[0] == 'edit')) {
        process_put($param);
    } elseif ((count($param) == 2) and ($param[0] == 'delete')) {
        process_delete($param);
    }
}
function process_put($param)
{
    if ((count($param) == 2) and $_SERVER['CONTENT_TYPE'] == 'application/x-www-form-urlencoded') {
        if (($param[0] == 'edit')) {
            $dataNama = (isset($_POST['nama_barang'])) ? $_POST['nama_barang'] : null;
            $dataJumlah = (isset($_POST['jumlah'])) ? $_POST['jumlah'] : null;
            $dataKode = (isset($_POST['kode_barang'])) ? $_POST['kode_barang'] : null;
            $dataTanggal = (isset($_POST['tanggal_masuk'])) ? $_POST['tanggal_masuk'] : null;
        }
        if ($param[0] == "apiedit") {
            parse_str(file_get_contents('php://input'), $data);
            $dataNama = $data['nama_barang'];
            $dataJumlah =  $data['jumlah'];
            $dataKode = $data['kode_barang'];
            $dataTanggal = $data['tanggal_masuk'];
        }
        try {
            require_once 'config.php';
            $handle = $conn->prepare('UPDATE barangs SET nama_barang = :nama_barang, jumlah = :jumlah, kode_barang = :kode_barang, tanggal_masuk = :tanggal_masuk WHERE id = :id');
            $dataId = $param[1];
            $handle->bindParam(':id', $dataId, PDO::PARAM_INT);
            $handle->bindParam(':nama_barang', $dataNama, PDO::PARAM_STR);
            $handle->bindParam(':jumlah', $dataJumlah, PDO::PARAM_INT);
            $handle->bindParam(':kode_barang', $dataKode, PDO::PARAM_STR);
            $handle->bindParam(':tanggal_masuk', $dataTanggal, PDO::PARAM_STR);
            $handle->execute();
            if ($handle->rowCount()) {
                $status = 'Berhasil';
                if ($param[0] == 'edit') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status, 'data' => array('nama_barang' => $dataNama, 'jumlah' => $dataJumlah, 'kode_barang' => $dataKode, 'tanggal_masuk' => $dataTanggal));
                    echo json_encode($arr);
                }
            } else {
                $status = 'Gagal';
                if ($param[0] == 'edit') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status, 'data' => array('nama_barang' => $dataNama, 'jumlah' => $dataJumlah, 'kode_barang' => $dataKode, 'tanggal_masuk' => $dataTanggal));
                    echo json_encode($arr);
                }
            }
        } catch (PDOException $pe) {
            die(json_encode($pe->getMessage()));
        }
    }
}
function process_get($param)
{
    if ((count($param) == 1) and ($param[0] == 'barangs')) {
        require_once 'config.php';
        try {
            require_once 'config.php';
            $handle = $conn->prepare('SELECT * FROM barangs');
            $handle->execute();
            $result = $handle->fetchAll(PDO::FETCH_ASSOC);
            $arr = array('status' => 'Berhasil', 'data' => $result);
            echo json_encode($arr);
        } catch (PDOException $pe) {
            die(json_encode($pe->getMessage()));
        }
    }
}

function process_delete($param)
{
    if ((count($param) == 2) and $param[0] == 'apidelete' or $param[0] == 'delete') {
        try {
            require_once 'config.php';
            $handle = $conn->prepare('DELETE FROM barangs WHERE id = :id');
            $dataId = $param[1];
            $handle->bindParam(':id', $dataId, PDO::PARAM_INT);
            $handle->execute();
            if ($handle->rowCount()) {
                $status = 'Berhasil';
                if ($param[0] == 'delete') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status);
                }
            } else {
                $status = 'Gagal';
                if ($param[0] == 'delete') {
                    header('Location: /index.php');
                } else {
                    $arr = array('status' => $status);
                }
            }

            echo json_encode($arr);
        } catch (PDOException $pe) {
            die(json_encode($pe->getMessage()));
        }
    }
}
//function option
function process_options($param)
{
    if ((count($param) == 1) and $param[0] == 'barangs') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type');
        header('Access-Control-Max-Age: 86400');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
    }
}
