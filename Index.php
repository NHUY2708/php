<?php
include "ChiTietPhuc.php";
include "May.php";
include "Kho.php";


function index($chiTietDon, $chiTietPhuc, $may, $kho) {
    echo '-----------------------------     QUẢN LÝ CHI TIẾT MÁY ---------------------' . "\n";
    echo 'Mời bạn chọn chức năng muốn thực hiện: ' . "\n";
    $chucNang = readline('1. Quản lý chi tiết máy || 2. Quản lý máy || 3. Quản lý kho || Nhập phím bất kì để thoát: ');
    switch ($chucNang) {
        case 1:
            $nhapLoai = 0;
            $nhapLoai = KiemTra::chonLoai($nhapLoai);
            if ($nhapLoai == 1) {
                $chiTietDon->nhapChiTiet();
                echo '>>>>>>>>>>>>>>>>>>>>>Xuất chi tiết' . "\n";
                $chiTietDon->xuatChiTiet();
                $chiTietDon->timKiem();
            } else {
                if ($nhapLoai == 2) {
                    $chiTietPhuc->nhapChiTiet();
                    $chiTietPhuc->xuatChitiet();
                    echo 'Giá tiền của chi tiết máy: ' . $chiTietPhuc->tinhTien() . "\n";
                    echo 'Khối lượng của chi tiết máy: ' . $chiTietPhuc->tinhKhoiLuong() . "\n";
                }
            }
            echo '--------------------------------------------------------------------------------------' . "\n";
            index($chiTietDon, $chiTietPhuc, $may, $kho);
        case 2:
            $may->nhapMay();
            $may->xuatChiTiet();
            echo 'Giá tiền của chi tiết máy: ' . $may->tinhTien() . "\n";
            echo 'Khối lượng của chi tiết máy: ' . $may->tinhKhoiLuong() . "\n";
            echo '--------------------------------------------------------------------------------------' . "\n";
            index($chiTietDon, $chiTietPhuc, $may, $kho);
        case 3:
            $kho->nhapKho();
            echo '-------------------------------------THỐNG KÊ KHO-------------------------------------' . "\n";
            $kho->xuatKho();
            echo 'Tổng tiền các máy trong kho: ' . $kho->tinhTien() . "\n";
            echo 'Tổng khối lượng các máy trong kho: ' . $kho->tinhKhoiLuong() . "\n";
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