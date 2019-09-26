<?php

class May {
    public $maSoMay;
    public $dsChiTiet = [];
    function nhapMay() {
        $this->maSoMay = readline('Nhập mã số máy: ');
        $soLuong = 0;
        $soLuong = readline('Nhập số lượng chi tiết của máy: ');
        for ($i = 1 ; $i <= $soLuong ; $i++) {
            echo '>>>>>Nhập chi tiết số ' . $i . "\n";
            $nhapLoai = 0;
            $nhapLoai = KiemTra::chonLoai($nhapLoai);
            if ($nhapLoai == 1) {
                $chiTiet = new ChiTietDon();
            } else {
                $chiTiet = new ChiTietPhuc();
            }
            $chiTiet->nhapChiTiet();
            array_push($this->dsChiTiet, $chiTiet);
        }
    }
    function xuatChiTiet() {
        echo '<<<<<<<Xuất máy' . "\n";
        echo 'Mã số máy: ' . $this->maSoMay . "\n";
        echo 'Danh sách chi tiết trong máy: ' . "\n";
        foreach ($this->dsChiTiet as $dsCT) {
            $dsCT->xuatChiTiet();
        }
    }
    function tinhKhoiLuong() {
        $khoiLuong = 0;
        foreach ($this->dsChiTiet as $dsCT) {
            $khoiLuong+= $dsCT->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
    function tinhTien() {
        $giaTien = 0;
        foreach ($this->dsChiTiet as $dsCT) {
            $giaTien+= $dsCT->tinhTien();
        }
        return $giaTien;
    }
}