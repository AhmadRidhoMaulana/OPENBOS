package Praktikum43;

import java.util.Scanner;
public class Main {
	public static void main(String [] args) {
		Scanner get = new Scanner(System.in);
		System.out.print("Nama Mahasiswa :");
		String nama = get.nextLine();
		System.out.print("NIP Mahasiswa :");
		String nip = get.nextLine();
		System.out.print("Prodi Mahasiswa :");
		String prodi = get.nextLine();
		System.out.print("Nama Ornawa :");
		String ornawa = get.nextLine();
		FITMahasiswa ma = new FITMahasiswa();
		ma.setNama(nama);
		ma.setNip(Integer.parseInt(nip));
		ma.setProdi(prodi);
		ma.daftarOrmawa(ornawa);
		ma.printIdentitas();
		ma.kegiatanOrmawa();
		
	}
}
