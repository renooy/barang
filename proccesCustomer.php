<?php
require_once 'CostumerManager.php';
$customerManager = new CustomerManager();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $customerManager->tambahCustomer($nama, $email);
    header('Location: customer.php');
    exit;
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $customerManager->hapusCustomer($id);
    header('Location: customer.php');
    exit;
}