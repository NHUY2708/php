<?php
class KiemTra {
    public static function nhapKhoiLuong($giatri) {

        do {
            $giatri = readline('Nhập khối lượng chi tiết: ');
        
        } while ((int)$giatri <= 0 || !is_numeric($giatri));
        return $giatri;
    }
    public static function nhapGiaTien($giatri) {
        do {
            $giatri = readline('Nhập giá tiền chi tiết: ');
        
        } while (( (int)$giatri <= 0 || is_float($giatri) || is_numeric($giatri) && ((float) $giatri != (int) $giatri)));
        return $giatri;
    }
    public static function chonLoai($giatri) {
        var_dump("a");
        do {
           
            $giatri = readline('Vui lòng chọn 1 để nhập chi tiết đơn || 2 để nhập chi tiết phức: ');
            var_dump($giatri);
        } while ($giatri != 1 && $giatri != 2);
        return $giatri;
    }
}