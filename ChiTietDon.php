<?php
require_once "KiemTra.php";
include "ChiTietMay.php";

class ChiTietDon extends ChiTietMay {
    private $giaTien;
    private $khoiLuong;
    public function nhapChiTiet() {
        parent::nhapChiTiet();
        $this->giaTien = KiemTra::inputIn($this->giaTien, 'Nhap gia tien: ');
        $this->khoiLuong = KiemTra::inputIn($this->giaTien, 'Nhap khoi luong: ');
    }
    public function xuatChiTiet() {
        parent::xuatChitiet();
        echo 'Khoi Luong: ' . $this->khoiLuong . "\n";
        echo 'Gia Tien: ' . $this->giaTien . "\n";
    }
    public function tinhTien() {
        return $this->giaTien;
    }
    public function tinhKhoiLuong() {
        return $this->khoiLuong;
    }
    public function timKiem() {
        if (parent::timKiem() == $this->getMaSo()) {
            echo '>>Kết quả tìm kiếm: ' . "\n";
            $this->xuatChiTiet();
        } else {
            echo 'Không tìm thấy chi tiết có mã số này ! ';
        }
    }
}