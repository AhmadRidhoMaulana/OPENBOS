<?php 

class Koneksi
{
	var $conn;
	function __construct()
	{
		session_start();
		$servername = "localhost";
		$username = "root";
		$password = "";
		$databasename = "form"; 
		$this->conn = mysqli_connect($servername, $username, $password, $databasename);
	}
	public function select_data()
	{
		$sql = "SELECT * FROM datadiri JOIN kelamin ON datadiri.kelamin=kelamin.id JOIN barang ON datadiri.barang= barang.id JOIN layanan ON  datadiri.layanan= layanan.id" ;
		return $this->conn->query($sql);
	}

    public function proses_daftar()
    {
        if($_POST['pass'] != $_POST['pass']){
            echo "<script> alert('Pastikan password sama');</script>";
            echo "<script> location='daftar.php';</script>";
        }
        $username = $_POST['username'];
        $password = md5(($_POST['pass']));
        $nama = ($_POST['nama']);
        $sql = "SELECT * FROM `login` WHERE username = '$username' ";
        $result = $this->conn->query($sql);
        if ($result->fetch_assoc() > 0){
            echo "<script> alert('Username telah terpakai, silahkan registrasi kembali');</script>";
            echo "<script> location= 'daftar.php';</script>";
        } else{
            $sql = "INSERT INTO `login`(`username`, `pass`,`nama`) VALUES ('$username','$password','$nama')";
            $this->conn->query($sql);
            echo "<script> alert('Anda Berhasil Terdaftar');</script>";
            echo "<script> alert('Silahkan Login');</script>";
            echo "<script> location= 'user.php';</script>";
        }
    }
    public function proses_login()
    {
		$username =strtolower( $_POST['username']);
		$pass = md5($_POST['pass']);
		
		$sql = "SELECT * FROM login WHERE username = '$username' AND pass = '$pass'";
		$result = $this->conn->query($sql);
		
		if ($result->fetch_assoc() > 0){
			$_SESSION['masuk'] = 'masuk';
			header("location: home.php");
		} else{
			echo "<script> alert('Username atau Password salah');</script>";
			echo "<script> location= 'user.php';</script>";
		}
    }
    public function proses_logout()
	{
		session_destroy();
		echo "<script> alert('Anda berhasil logout');</script>";
		echo "<script> location= 'user.php'; </script>";
	}
	// public function insert_denda()
	// {
	// 	$tanggal_sewa=$_POST['tanggal_sewa'];
	// 	$tanggal_pengembalian=$_POST['tanggal_pengembalian'];
	// 	$terlambat=$_POST['terlambat'];
	// 	$bayar=$_POST['bayar'];
	// 	$sql="INSERT INTO `denda`( `tanggal_sewa`, `tanggal_pengembalian`, `terlambat`, `bayar`) VALUES ('$tanggal_sewa','$tanggal_pengembalian','$terlambat','$bayar')";
	// 	$this->conn->query($sql);
	// 	echo "<script> alert('Form Denda Berhasil di isi');</script>";
	// 	header("location: index.php");

	// }

	public function insert_Datadiri()
	{
		$Nama = $_POST['Nama'];
		$Hp = $_POST['Hp'];
		$Alamat = $_POST['Alamat'];
		$Tanggal = $_POST['Tanggal'];
		$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
		$kelamin = $_POST['kelamin'];
		$barang = $_POST['barang'];
		$bayar = $_POST['bayar'];
		$folder='./asset/foto/';
		$ktp=$_FILES['foto']['name'];
		$sumber=$_FILES['foto']['tmp_name'];
		move_uploaded_file($sumber,$folder.$ktp);
		$layanan = $_POST['layanan'];
		$sql = "INSERT INTO `datadiri`(`Nama`, `Hp`, `Alamat`, `Tanggal`,`tanggal_pengembalian`, `kelamin`, `barang`,`bayar`, `foto`, `layanan`) VALUES ('$Nama','$Hp','$Alamat','$Tanggal','$tanggal_pengembalian','$kelamin','$barang','$bayar','$ktp','$layanan')";
		$this->conn->query($sql);
		echo "<script> alert('Penyewaan berhasil');</script>";
		header("location: Home.php");
	}
	// insert_beli
	public function insert_beli()
	{
		$nama = $_POST['nama'];
		$barang = $_POST['barang'];
		$layanan = $_POST['layanan'];
		$bayar= $_POST['bayar'];
		$Alamat= $_POST['Alamat'];
		$sql = "INSERT INTO `beli`( `nama`, `barang`, `layanan`, `bayar`, `Alamat`) VALUES ('$nama','$barang','$layanan','$bayar','$Alamat')";
		$this->conn->query($sql);
		echo "<script> alert('Berhasil');</script>";
		header("location: produk.php");
	}
	// kelamin
	public function select_kelamin()
	{
		$sql  = "SELECT * FROM `kelamin`";
		return $this->conn->query($sql);
	}
	// barang
    public function select_barang()
	{
		$sql = "SELECT * FROM `barang`";
		return $this->conn->query($sql);
	}
	// layanan
    public function select_layanan()
	{
		$sql = "SELECT * FROM `layanan`";
		return $this->conn->query($sql);
	}
	// bayar
    public function select_bayar()
	{
		$sql = "SELECT * FROM `bayar`";
		return $this->conn->query($sql);
	}

        
}
$koneksi = new Koneksi();

if (isset($_GET['proses_login'])) {
	$koneksi->proses_login();
}
if (isset($_GET['insert_Datadiri'])) {
	$koneksi->insert_Datadiri();
}
if (isset($_GET['insert_beli'])) {
	$koneksi->insert_beli();

}
// if (isset($_GET['insert_denda'])) {
// 	$koneksi->insert_denda();
// }
if (isset($_GET['proses_logout'])) {
	$koneksi->proses_logout();
}
if (isset($_GET['proses_daftar'])) {
	$koneksi->proses_daftar();
}

?>