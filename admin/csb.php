<?php

	require("../config/config.default.php");

	require("../config/config.function.php");

	require("../config/dis.php");

?>

<table style="border:1px solid; padding:2px; text-align: center; cell-padding:1px;">

	<thead>

		<tr style="border:1px solid">

			<td style="border:1px solid;">No_Daftar</td>

			<td style="border:1px solid;">Kode Jalur</td>

			<td style="border:1px solid;">kode_asal_sekolah</td>

			<td style="border:1px solid;">sekolah_lainnya</td>

			<td style="border:1px solid;">nik</td>

			<td style="border:1px solid;">nisn</td>

			<td style="border:1px solid;">nama</td>

			<td style="border:1px solid;">jenis_kelamin</td>

			<td style="border:1px solid;">tempat_lahir</td>

			<td style="border:1px solid;">tanggal_lahir</td>

			<td style="border:1px solid;">agama</td>

			<td style="border:1px solid;">anak_ke</td>

			<td style="border:1px solid;">saudara</td>

			<td style="border:1px solid;">tinggi</td>

			<td style="border:1px solid;">berat</td>

			<td style="border:1px solid;">kebutuhan_khusus</td>

			<td style="border:1px solid;">alamat</td>

			<td style="border:1px solid;">rt</td>

			<td style="border:1px solid;">rw</td>

			<td style="border:1px solid;">dusun</td>

			<td style="border:1px solid;">kelurahan</td>

			<td style="border:1px solid;">kecamatan</td>

			<td style="border:1px solid;">kota</td>

			<td style="border:1px solid;">provinsi</td>

			<td style="border:1px solid;">kode_pos</td>

			<td style="border:1px solid;">jenis_tinggal</td>

			<td style="border:1px solid;">alat_transportasi</td>

			<td style="border:1px solid;">jarak</td>

			<td style="border:1px solid;">waktu_tempuh</td>

			<td style="border:1px solid;">hp</td>

			<td style="border:1px solid;">email</td>

			<td style="border:1px solid;">skhun</td>

			<td style="border:1px solid;">nopes_ujian</td>

			<td style="border:1px solid;">no_ijazah</td>

			<td style="border:1px solid;">no_kps</td>

			<td style="border:1px solid;">nama_ayah</td>

			<td style="border:1px solid;">tahun_lahir_ayah</td>

			<td style="border:1px solid;">pendidikan_ayah</td>

			<td style="border:1px solid;">pekerjaan_ayah</td>

			<td style="border:1px solid;">penghasilan_ayah</td>

			<td style="border:1px solid;">nohp_ayah</td>

			<td style="border:1px solid;">nama_ibu</td>

			<td style="border:1px solid;">tahun_lahir_ibu</td>

			<td style="border:1px solid;">pendidikan_ibu</td>

			<td style="border:1px solid;">pekerjaan_ibu</td>

			<td style="border:1px solid;">penghasilan_ibu</td>

			<td style="border:1px solid;">nohp_ibu</td>

			<td style="border:1px solid;">nama_wali</td>

			<td style="border:1px solid;">tahun_lahir_wali</td>

			<td style="border:1px solid;">pendidikan_wali</td>

			<td style="border:1px solid;">pekerjaan_wali</td>

			<td style="border:1px solid;">penghasilan_wali</td>

			<td style="border:1px solid;">angkatan</td>

			

			<td style="border:1px solid;">daftar_ulang</td>

			<td style="border:1px solid;">status_bayar</td>

			<td style="border:1px solid;">kode status</td>

			<td style="border:1px solid;">jenis_daftar</td>

			<td style="border:1px solid;">tgl_daftar</td>

		</tr>

	</thead>

	<tbody>

	<tr style="border:1px solid">

			<?php

		$datas=mysqli_query($koneksi,"SELECT * FROM daftar");

		$sekolah=mysqli_query($koneksi,"select * from mou where kode_mou='$datas[asal_sekolah]'");

		

		while ($csb=mysql_fetch_assoc($datas)):

		

		?>

		<td style="border:1px solid;"><?=$csb['no_daftar']?></td>

		<td style="border:1px solid;"><?=$csb['jurusan']?></td>

		<td style="border:1px solid;"><?=$csb['asal_sekolah']?></td>

		<td style="border:1px solid;"><?=$csb['sekolah_lain']?></td>

		<td style="border:1px solid;"><?=$csb['nik']?></td>

		<td style="border:1px solid;"><?=$csb['nisn']?></td>

		<td style="border:1px solid;"><?=$csb['nama']?></td>

		<td style="border:1px solid;"><?=$csb['jenis_kelamin']?></td>

		<td style="border:1px solid;"><?=$csb['tempat_lahir']?></td>

		<td style="border:1px solid;"><?=$csb['tanggal_lahir']?></td>

		<td style="border:1px solid;"><?=$csb['agama']?></td>

		<td style="border:1px solid;"><?=$csb['anak_ke']?></td>

		<td style="border:1px solid;"><?=$csb['saudara']?></td>

		<td style="border:1px solid;"><?=$csb['tinggi']?></td>

		<td style="border:1px solid;"><?=$csb['berat']?></td>

		<td style="border:1px solid;"><?=$csb['kebutuhan_khusus']?></td>

		<td style="border:1px solid;"><?=$csb['alamat']?></td>

		<td style="border:1px solid;"><?=$csb['rt']?></td>

		<td style="border:1px solid;"><?=$csb['rw']?></td>

		<td style="border:1px solid;"><?=$csb['dusun']?></td>

		<td style="border:1px solid;"><?=$csb['kelurahan']?></td>

		<td style="border:1px solid;"><?=$csb['kecamatan']?></td>

		<td style="border:1px solid;"><?=$csb['kota']?></td>

		<td style="border:1px solid;"><?=$csb['provinsi']?></td>

		<td style="border:1px solid;"><?=$csb['kode_pos']?></td>

		<td style="border:1px solid;"><?=$csb['jenis_tinggal']?></td>

		<td style="border:1px solid;"><?=$csb['alat_transportasi']?></td>

		<td style="border:1px solid;"><?=$csb['jarak']?></td>

		<td style="border:1px solid;"><?=$csb['waktu_tempuh']?></td>

		<td style="border:1px solid;"><?=$csb['hp']?></td>

		<td style="border:1px solid;"><?=$csb['email']?></td>

		<td style="border:1px solid;"><?=$csb['skhun']?></td>

		<td style="border:1px solid;"><?=$csb['nopes_ujian']?></td>

		<td style="border:1px solid;"><?=$csb['no_ijazah']?></td>

		<td style="border:1px solid;"><?=$csb['no_kps']?></td>

		<td style="border:1px solid;"><?=$csb['nama_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['tahun_lahir_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['pendidikan_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['pekerjaan_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['penghasilan_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['nohp_ayah']?></td>

		<td style="border:1px solid;"><?=$csb['nama_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['tahun_lahir_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['pendidikan_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['pekerjaan_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['penghasilan_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['nohp_ibu']?></td>

		<td style="border:1px solid;"><?=$csb['nama_wali']?></td>

		<td style="border:1px solid;"><?=$csb['tahun_lahir_wali']?></td>

		<td style="border:1px solid;"><?=$csb['pendidikan_wali']?></td>

		<td style="border:1px solid;"><?=$csb['pekerjaan_wali']?></td>

		<td style="border:1px solid;"><?=$csb['penghasilan_wali']?></td>

		<td style="border:1px solid;"><?=$csb['angkatan']?></td>

		

		<td style="border:1px solid;"><?=$csb['daftar_ulang']?></td>

		<td style="border:1px solid;"><?=$csb['status_bayar']?></td>

		<td style="border:1px solid;"><?=$csb['baju']?></td>

		<td style="border:1px solid;"><?=$csb['jenis_daftar']?></td>

		<td style="border:1px solid;"><?=$csb['tgl_daftar']?></td>



	</tr>

		<?php endwhile;

		?>

	</tbody>

</table>