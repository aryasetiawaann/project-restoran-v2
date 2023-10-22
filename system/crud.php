<?php 
session_start();
require_once("db.php");

function createData(){
    global $db;

    if(!isset($_POST['nama']) || $_POST['nama'] == ""){
        header('Location: ../admin/create_admin.php?error=Mohon untuk mengisi nama menu!&id=');
        exit();
    }else if(!isset($_POST['kategori']) || $_POST['kategori'] == ""){
        header('Location: ../admin/create_admin.php?error=Mohon untuk memilih kategori');
        exit();
    }else if(!isset($_POST['deskripsi']) || $_POST['deskripsi'] == ""){
        header('Location: ../admin/create_admin.php?error=Mohon untuk menulis deskripsi');
        exit();
    }else if(!isset($_POST['harga']) || $_POST['harga'] == ""){
        header('Location: ../admin/create_admin.php?error=Mohon untuk memasukan harga');
        exit();
    }

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $filename = $_FILES['foto']['name'];
    $path_file = $_FILES['foto']['tmp_name'];

    $file_ext = explode('.', $filename);
    $file_ext = end($file_ext);
    $file_ext = strtolower($file_ext);

    switch($file_ext){
        case 'jpg':
        case 'jpeg':
        case 'png':
        case 'svg':
        case 'webp':
        case 'bmp':
        case 'gif':
            move_uploaded_file($path_file, "../_photos/{$filename}");
            break;
        case '':
            header('Location: ../admin/create_admin.php?error=Mohon pilih file foto.');
            exit();
            break;
        default:
            header('Location: ../admin/create_admin.php?error=Mohon untuk hanya mengupload file foto.');
            exit();
            break;
    }

    $sql = "INSERT INTO menu(nama, detail, harga, foto, kategori)
            VALUES(?, ?, ?, ?, ?)";

    $stmt = $db->prepare($sql);
    $data = [$nama, $deskripsi, $harga, $filename, $kategori];
    $stmt->execute($data);

    header('Location: ../admin/home_admin.php');
    exit();
}

function editData(){
    global $db;
    $id = $_POST['id'];

    if(!isset($_POST['nama']) || $_POST['nama'] == ""){
        header('Location: ../admin/edit_admin.php?error=Mohon untuk mengisi nama menu!&id=' . $id);
        exit();
    }else if(!isset($_POST['kategori']) || $_POST['kategori'] == ""){
        header('Location: ../admin/edit_admin.php?error=Mohon untuk memilih kategori&id=' . $id);
        exit();
    }else if(!isset($_POST['deskripsi']) || $_POST['deskripsi'] == ""){
        header('Location: ../admin/edit_admin.php?error=Mohon untuk menulis deskripsi&id=' . $id);
        exit();
    }else if(!isset($_POST['harga']) || $_POST['harga'] == ""){
        header('Location: ../admin/edit_admin.php?error=Mohon untuk memasukan harga&id=' . $id);
        exit();
    }

    $nama = $_POST['nama'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];

    if($_FILES['foto']['name'] != null){

        $filename = $_FILES['foto']['name'];
        $path_file = $_FILES['foto']['tmp_name'];
    
        $file_ext = explode('.', $filename);
        $file_ext = end($file_ext);
        $file_ext = strtolower($file_ext);
    
        switch($file_ext){
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'svg':
            case 'webp':
            case 'bmp':
            case 'gif':
                unlink("../_photos/{$_SESSION['foto_awal']}");
                unset($_SESSION['foto_awal']);
                move_uploaded_file($path_file, "../_photos/{$filename}");
                break;
            case '':
                header('Location: ../admin/edit_admin.php?error=Mohon pilih file foto.&id=' . $id);
                exit();
                break;
            default:
                header('Location: ../admin/edit_admin.php?error=Mohon untuk hanya mengupload file foto.&id=' . $id);
                exit();
                break;
        }
    
        $sql = "UPDATE menu
                SET nama = ?, detail = ?, harga = ?, foto = ?, kategori = ?
                WHERE id = ?";
    
        $stmt = $db->prepare($sql);
        $data = [$nama, $deskripsi, $harga, $filename, $kategori, $id];
        $stmt->execute($data);
    }else{
        $sql = "UPDATE menu
                SET nama = ?, detail = ?, harga = ?, kategori = ?
                WHERE id = ?";
    
        $stmt = $db->prepare($sql);
        $data = [$nama, $deskripsi, $harga, $kategori, $id];
        $stmt->execute($data);
    }

    header('Location: ../admin/home_admin.php');
    exit();
}

function deleteData(){
    global $db;
    $id = $_POST['id'];
    $foto = $_POST['foto'];

    $sql = "DELETE FROM menu WHERE id = ?";

    $data = [$id];
    $stmt = $db->prepare($sql);
    $hasil = $stmt->execute($data);

    unlink("../_photos/{$_POST['foto']}");
    header('Location: ../admin/home_admin.php');
    exit();
}

function addCart(){
    global $db;
    
    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ''){
        header('Location: ../login.php');
    }else{
        $id = $_GET['add-id'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO cart(id_menu, id_user)
                VALUES(?, ?)";

        $data = [$id, $user_id];   
        $stmt = $db->prepare($sql);
        $stmt->execute($data);

        header('Location: ../keranjang.php');
    }
}

function deleteCart(){
    global $db;
    
    if(isset($_SESSION['user_id'])){
        
        $id = $_GET['delete-id'];
        $user_id = $_SESSION['user_id'];

        $sql = "DELETE FROM cart WHERE id_menu = ? AND id_user = ?";

        $data = [$id, $user_id];   
        $stmt = $db->prepare($sql);
        $stmt->execute($data);

        header('Location: ../keranjang.php');
    }

    exit();
}

if(isset($_POST['addData'])){
    createData();
}else if(isset($_POST['editData'])){
    editData();
}else if(isset($_POST['deleteData'])){
    deleteData();
}else if(isset($_GET['add-id'])){
    addCart();
}else if(isset($_GET['delete-id'])){
    deleteCart();
}

?>