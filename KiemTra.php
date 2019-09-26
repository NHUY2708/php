<?php
class KiemTra {
    public static function inputIn($giatri, $ten) {
        do {
            $giatri = readline($ten);
        } while (!is_numeric($giatri));
        return $giatri;
    }
    public static function chonLoai($giatri) {
        do {
            $giatri = readline('Vui lòng chọn 1 để nhập chi tiết đơn || 2 để nhập chi tiết phức: ');
        } while ($giatri != 1 && $giatri != 2);
        return $giatri;
    }
}