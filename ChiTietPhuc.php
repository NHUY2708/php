<?php
include "ChiTietDon.php";

class ChiTietPhuc extends ChiTietMay {
    
    public $arrChiTietCon = [];
    private $soLuong;
    public function nhapChiTiet() {
        parent::nhapChiTiet();
        $this->soLuong = readline('Nhập số lượng chi tiết trong chi tiết phức: ');
        $chiTiet = [];
        for ($i = 0;$i < $this->soLuong;$i++) {
            $loaiCT = 0;

            $loaiCT = KiemTra::chonLoai($loaiCT);
            if ($loaiCT == 1) {
                $chiTiet = new ChiTietDon();
            } else {
                if ($loaiCT == 2) {
                    $chiTiet = new ChiTietPhuc();
                }
            }
            $chiTiet->nhapChiTiet();
            array_push($this->arrChiTietCon, $chiTiet);
        }
       
    }
    public function xuatChitiet() {
        parent::xuatChitiet();
        foreach ($this->arrChiTietCon as $ctCon) {
            $ctCon->xuatChitiet();
        }
    }
    public function timKiem() {
        foreach ($this->arrChiTietCon as $ctCon) {
            if (parent::timKiem() == $ctCon->maSo) {
                $this->xuatChiTiet();
                break;
            } else {
                echo 'Không tìm thấy chi tiết có mã số này !';
            }
        }
    }
    public function tinhTien() {
        $giaTien = 0;
        foreach ($this->arrChiTietCon as $ctCon) {
            $giaTien+= $ctCon->tinhTien();
        }
        return $giaTien;
    }
    public function tinhKhoiLuong() {
        $khoiLuong = 0;
        foreach ($this->arrChiTietCon as $ctCon) {
            $khoiLuong+= $ctCon->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
}