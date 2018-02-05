<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'Sukarno','nipd'=>'111','alamat'=>'Cupu','mata_kuliah'=>'Fisika'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'Hatta','nipd'=>'222','alamat'=>'Ranca kasiat','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Parantos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tabut = jurusan::create(array(
         	'nama_jurusan'=>'Tata Busana'
         ));
        $this->command->info('Jurusan Parantos Diisi !');

        $utun = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Karman','nis'=>'00001','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));

        $wakwaw = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Lado','nis'=>'00002','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));
        $romlah = mahasiswa::create(array(
        'nama_mahasiswa'=> 'Lida','nis'=>'00003','id_dosen'=>$dosen2->id,'id_jurusan'=> $tabut->id
        ));

        $this->command->info('Mahasiswa Parantos Diisi!');

        wali::create(array(
        'nama'=>'Bpk. Usman',
        'alamat'=>'Cilebak',
        'id_mahasiswa'=>$utun->id
        ));
        wali::create(array(
        'nama'=>'Bpk. Mimin',
        'alamat'=>'rencong',
        'id_mahasiswa'=>$wakwaw->id
        ));
        wali::create(array(
        'nama'=>'Bpk. Oman',
        'alamat'=>'baleendah',
        'id_mahasiswa'=>$romlah->id
        ));

		$this->command->info('Wali Parantos Diisi !');

		$fisika = matkul::create(array('nama_matkul'=>'Fisika','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$utun->matkul()->attach($fisika->id);
		$utun->matkul()->attach($kimia->id);
		$wakwaw->matkul()->attach($kimia->id);
		$romlah->matkul()->attach($fisika->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Parantos Diisi !'); 
    }
}
