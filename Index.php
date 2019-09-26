<?php
include "ChiTietPhuc.php";
include "May.php";
include "Kho.php";

function index($chiTietDon, $chiTietPhuc, $may, $kho) {
    echo '------------------------QUẢN LÝ CHI TIẾT MÁY -------------' . "\n";
    echo 'Mời bạn chọn chức năng muốn thực hiện: ' . "\n";
    $chucNang = readline('1. Quản lý chi tiết máy || 2. Quản lý máy || 3. Quản lý kho || Nhập phím bất kì để thoát: ');
    switch ($chucNang) {
        case 1:
            $nhapLoai = 0;
            $nhapLoai = KiemTra::chonLoai($nhapLoai);
            if ($nhapLoai == 1) {
                $chiTietDon->nhapChiTiet();
                echo '>>>>>>>Xuất chi tiết' . "\n";
                $chiTietDon->xuatChiTiet();
                $chiTietDon->timKiem();
            } else {
                if ($nhapLoai == 2) {
                    $chiTietPhuc->nhapChiTiet();
                    $chiTietPhuc->xuatChitiet();
                    echo 'Gia Tien Cua Chi Tiet May: ' . $chiTietPhuc->tinhTien() . "\n";
                    echo 'Khoi Cua Chi Tiet May: ' . $chiTietPhuc->tinhKhoiLuong() . "\n";
                }
            }
            echo '--------------------------------------------------------------------------------------' . "\n";
            index($chiTietDon, $chiTietPhuc, $may, $kho);
        case 2:
            $may->nhapMay();
            $may->xuatChiTiet();
            echo 'Gia Tien Cua Chi Tiet May: ' . $may->tinhTien() . "\n";
            echo 'Khoi Cua Chi Tiet May: ' . $may->tinhKhoiLuong() . "\n";
            echo '--------------------------------------------------------------------------------------' . "\n";
            index($chiTietDon, $chiTietPhuc, $may, $kho);
        case 3:
            $kho->nhapKho();
            echo '-------------------------------------THỐNG KÊ KHO-------------------------------------' . "\n";
            $kho->xuatKho();
            echo 'Tong tien cac may trong kho: ' . $kho->tinhTien() . "\n";
            echo 'Tong khoi luong cac may trong kho ' . $kho->tinhKhoiLuong() . "\n";
            $kho->timKiem();
            echo '---------------------------------------------------------------------------------------' . "\n";
            index($chiTietDon, $chiTietPhuc, $may, $kho);
        default:
            break;
    }
}
$chiTietDon = new ChiTietDon();
$chiTietPhuc = new ChiTietPhuc();
$may = new May();
$kho = new Kho();
index($chiTietDon, $chiTietPhuc, $may, $kho);