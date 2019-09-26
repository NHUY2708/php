<?php

class Kho {
    public $tenKho;
    public $soLuongMay;
    public $dsMay = [];
    function nhapKho() {
        $this->tenKho = readline('Nhập tên kho: ');
        $this->soLuongMay = readline('Nhập số lượng máy trong kho: ');
        for ($i = 1;$i <= $this->soLuongMay;$i++) {
            echo '>>>>>Nhập Máy số ' . $i . "\n";
            $may = new May();
            $may->nhapMay();
            array_push($this->dsMay, $may);
        }
    }
    function xuatKho() {
        echo 'Tên kho: ' . $this->tenKho;
        echo 'Số lượng máy trong kho: ' . $this->soLuongMay;
        echo 'Danh sách máy trong kho: ' . "\n";
        foreach ($this->dsMay as $may) {
            $may->xuatChiTiet();
        }
    }
    function tinhTien() {
        $giaTien = 0;
        foreach ($this->dsMay as $may) {
            $giaTien+= $may->tinhTien();
        }
        return $giaTien;
    }
    function tinhKhoiLuong() {
        $khoiLuong = 0;
        foreach ($this->dsMay as $may) {
            $khoiLuong+= $may->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
    function timKiem() {
        $mayTim = readline('Nhập mã máy bạn muốn tìm: ');
        $ketqua = false;
        foreach ($this->dsMay as $may) {
            if ($mayTim == $may->maSoMay) {
                $may->xuatChiTiet();
                return $ketqua = true;
            }
        }
        if (!$ketqua) {
            echo 'Không tìm thấy máy có mã số bạn tìm !' . "\n";
        }
    }
}