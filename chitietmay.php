<?php

abstract class ChiTietMay {
    protected $maSo;
    protected function nhapChiTiet() {
        $this->maSo = readline('Nhập mã số chi tiết: ');
    }
    protected function xuatChitiet() {
        echo "Mã số chi tiết: " . $this->maSo . "\n";
    }
    protected function getMaSo() {
        return $this->maSo;
    }
    protected abstract function tinhTien();
    protected abstract function tinhKhoiLuong();
    protected function timKiem() {
        return $maCT = readline('Nhập mã số chi tiết bạn muốn tìm: ');
    }
}