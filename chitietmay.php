<?php
class KiemTra{
    public static function inputIn($giatri, $ten){
        do {
            $giatri = readline($ten);
        }
        while(!is_numeric($giatri));
		return $giatri;
    }
    public static function chonLoai($giatri){
        do {
            $giatri = readline('Vui lòng chọn 1 để nhập chi tiết đơn || 2 để nhập chi tiết phức: ');
        }
        while($giatri != 1 && $giatri != 2);
        return $giatri;
    }
}
abstract class ChiTietMay{

    protected $maSo;
    protected function nhapChiTiet(){
        $this->maSo = readline('Nhập mã số chi tiết: ');
    }
    protected function xuatChitiet(){
        echo "Mã số: ".$this->maSo . "\n";
    }
    protected function getMaSo(){
        return $this->maSo;
    }

    protected abstract function tinhTien();
    protected abstract function tinhKhoiLuong();
	protected function timKiem() {
        return $maCT = readline('Nhập mã số chi tiết bạn muốn tìm: ');
	}
	}

class ChiTietDon extends ChiTietMay{
    private $giaTien;
    private $khoiLuong;
    public function nhapChiTiet(){
        parent::nhapChiTiet();
        $this->giaTien = KiemTra::inputIn($this->giaTien,'Nhap gia tien: ');
        $this->khoiLuong = KiemTra::inputIn($this->giaTien,'Nhap khoi luong: ');
    }
    public function xuatChiTiet(){
        parent::xuatChitiet();
        echo 'Khoi Luong: ' . $this->khoiLuong . "\n";
        echo 'Gia Tien: ' . $this->giaTien . "\n";
    }
    public function tinhTien(){
        return $this->giaTien;
    }
    public function tinhKhoiLuong(){
        return $this->khoiLuong;
    }
	public function timKiem() {
		if(parent::timKiem() == $this->getMaSo())
		{
            echo '>>Kết quả tìm kiếm: ' . "\n";
			$this->xuatChiTiet();
        }
        else {
            echo 'Không tìm thấy chi tiết có mã số này ! ';
        }
	}
}
class ChiTietPhuc extends ChiTietMay {
    public $arrChiTietCon = [];
    private $soLuong;
    public function nhapChiTiet(){
        parent::nhapChiTiet();
        $this->soLuong = readline('Nhập số lượng chi tiết con: ');
        $chiTiet = [];
        for( $i=0 ; $i<$this->soLuong ; $i++){
            $loaiCT = 0;
            $loaiCT = KiemTra::chonLoai($loaiCT);
                if($loaiCT == 1){
                    $chiTiet = new ChiTietDon();
                }
                else {
                    if($loaiCT == 2) {
                        $chiTiet = new ChiTietPhuc();
                    }
                }
            }
            $chiTiet->nhapChiTiet();
            array_push($this->arrChiTietCon,$chiTiet);
        }
    public function xuatChitiet()
    {
        parent::xuatChitiet();
        foreach ($this->arrChiTietCon as $ctCon) {
            $ctCon->xuatChitiet();
        }
    }	
	public function timKiem(){
		foreach ($this->arrChiTietCon as $ctCon) {
            if(parent::timKiem() == $ctCon->maSo){
				$this->xuatChiTiet();
				break;
			}
			else {
				echo 'Không tìm thấy chi tiết có mã số này !';
			}
        }
	}

    public function tinhTien(){
        $giaTien = 0;
        foreach ($this->arrChiTietCon as $ctCon){
            $giaTien += $ctCon->tinhTien();
        }
        return $giaTien;
    }
    public function tinhKhoiLuong(){
        $khoiLuong = 0;
        foreach ($this->arrChiTietCon as $ctCon){
            $khoiLuong += $ctCon->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
}

class May {
    public $maSoMay;
    public $dsChiTiet = [];
    function nhapMay() {
        $this->maSoMay = readline('Nhập mã số máy: ');
        $soLuong = 0;
        $soLuong = readline('Nhập số lượng chi tiết của máy: ');
        for($i=1 ; $i <= $soLuong ; $i++){
            echo '>>>>>Nhập chi tiết số ' . $i . "\n";
            $nhapLoai = 0;
            $nhapLoai = KiemTra::chonLoai($nhapLoai);
            if($nhapLoai == 1){
                $chiTiet = new ChiTietDon();
            }
            else {
                $chiTiet = new ChiTietPhuc();
            }
            $chiTiet->nhapChiTiet();
            array_push($this->dsChiTiet, $chiTiet);
        }
    }
    function xuatChiTiet() {
        echo '<<<<<<<Xuất máy' . "\n";
        echo 'Mã số máy: ' . $this->maSoMay . "\n";
        echo 'Danh sách chi tiết trong máy: ' . "\n" ;
        foreach ($this->dsChiTiet as $dsCT) {
            $dsCT->xuatChiTiet();
        }
    }
    function tinhKhoiLuong(){
        $khoiLuong = 0;
        foreach ($this->dsChiTiet as $dsCT){
            $khoiLuong += $dsCT->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
    function  tinhTien(){
        $giaTien = 0;
        foreach ($this->dsChiTiet as $dsCT){
            $giaTien += $dsCT->tinhTien();
        }
        return $giaTien;
    }
}
class Kho {
    public $tenKho;
    public $soLuongMay;
    public $dsMay = [];
    function nhapKho(){
        $this->tenKho = readline('Nhập tên kho: ');
        $this->soLuongMay = readline('Nhập số lượng máy trong kho: ');
        for( $i=1; $i<=$this->soLuongMay; $i++){
            echo '>>>>>Nhập Máy số ' . $i . "\n";
            $may = new May();
            $may->nhapMay();
            array_push($this->dsMay, $may);
        }
    }
    function xuatKho(){
        echo 'Tên kho: ' . $this->tenKho;
        echo 'Số lượng máy trong kho: ' . $this->soLuongMay;
        echo 'Danh sách máy trong kho: ' . "\n";
        foreach ($this->dsMay as $may) {
            $may->xuatChiTiet();
        }
    }
    function tinhTien(){
        $giaTien = 0;
        foreach ($this->dsMay as $may){
            $giaTien += $may->tinhTien();
        }
        return $giaTien;
    }
    function tinhKhoiLuong(){
        $khoiLuong = 0;
        foreach ($this->dsMay as $may){
            $khoiLuong += $may->tinhKhoiLuong();
        }
        return $khoiLuong;
    }
	function timKiem(){
        $mayTim = readline( 'Nhập mã máy bạn muốn tìm: ' );
        $ketqua = false;
		foreach ($this->dsMay as $may){
			if($mayTim == $may->maSoMay){
                $may->xuatChiTiet();
                return $ketqua =true;
            }
        }
        if( !$ketqua ){
            echo 'Không tìm thấy máy có mã số bạn tìm !' . "\n";
        }
    }
}
function main($chiTietDon, $chiTietPhuc, $may, $kho){
    echo '-------------------------------------------------QUẢN LÝ CHI TIẾT MÁY ------------------------------------------------' . "\n";
    echo 'Mời bạn chọn chức năng muốn thực hiện: ' . "\n";
$chucNang = readline('1. Quản lý chi tiết máy || 2. Quản lý máy || 3. Quản lý kho || Nhập phím bất kì để thoát: ');

switch($chucNang){
case 1:
    $nhapLoai = 0;
    $nhapLoai = KiemTra::chonLoai($nhapLoai);

    if($nhapLoai == 1){
        $chiTietDon->nhapChiTiet();
        echo '>>>>>>>Xuất chi tiết' . "\n";
        $chiTietDon->xuatChiTiet();
        $chiTietDon->timKiem();
    }
    else {
        if($nhapLoai == 2){
            $chiTietPhuc->nhapChiTiet();
            $chiTietPhuc->xuatChitiet();
            echo 'Gia Tien Cua Chi Tiet May: ' . $chiTietPhuc->tinhTien() . "\n";
            echo 'Khoi Cua Chi Tiet May: ' . $chiTietPhuc->tinhKhoiLuong() ."\n";
        }
    }
    echo '-----------------------------------------------------------------------------------------------------------------' . "\n";
    main($chiTietDon, $chiTietPhuc, $may, $kho);
case 2:
    $may->nhapMay();
    $may->xuatChiTiet();
    echo 'Gia Tien Cua Chi Tiet May: ' . $may->tinhTien() . "\n";
    echo 'Khoi Cua Chi Tiet May: ' . $may->tinhKhoiLuong() ."\n";
    echo '-----------------------------------------------------------------------------------------------------------------' . "\n";
    main($chiTietDon, $chiTietPhuc, $may, $kho);
case 3:
$kho->nhapKho();
echo '-------------------------------------THỐNG KÊ KHO-----------------------------------------' . "\n";
$kho->xuatKho();
echo 'Tong tien cac may trong kho: ' . $kho->tinhTien() . "\n";
echo 'Tong khoi luong cac may trong kho ' . $kho->tinhKhoiLuong() ."\n";
$kho->timKiem();
echo '--------------------------------------------------------------------------------------------------------------------' . "\n";
main($chiTietDon, $chiTietPhuc, $may, $kho);
default:
        break;
}
}

$chiTietDon = new ChiTietDon();
$chiTietPhuc = new ChiTietPhuc();
$may = new May();
$kho = new Kho();

main($chiTietDon, $chiTietPhuc, $may, $kho);