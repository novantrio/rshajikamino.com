<?php

define('DB_HOST', '10.147.17.3');
define('DB_PORT', '3306');
define('DB_NAME', 'online');
define('DB_USERNAME', 'sik');
define('DB_PASSWORD', 'hack_gak_selamat_dunia_akherat');

$conn = mysqli_connect(DB_HOST,DB_NAME,DB_PASSWORD,DB_USERNAME);
if (!$conn) {
	die ('Gagal terhubung MySQL: ' . mysqli_connect_error());
}

$data = json_decode(file_get_contents('php://input'), true); 

$number   = $data["from"];
$message  = $data["message"];

@$wa_no = $number;
@$wa_text0 = $message;
@$wa_text = strtoupper($message);

if ($wa_no . $wa_text == ' ') { exit ; }  
 
$exp = explode(' ', $wa_text) ;
$text1 = $exp[0];
$text2 = $exp[1];
$text3 = $exp[2];
//if ($text1 == 'TES') { //contoh tombol dengan keyword menggunakan karakter spasi
    
//$msg = "_Halo ini whatsapp bot RSHK_ 🤖

//Silahkan gunakan kata kunci berikut untuk informasi lain.

//*ketik :*
//*jadwal* _(untuk informasi jadwal dokter)_


//_Terima kasih_. 🙏🏻";
//$button = 'JADWAL DOKTER,DAFTAR';
//sendMessageButton($wa_no, $msg, $button);
//}
switch($wa_text) {
	
case 'PAGI':
$msg = "_Selamat pagi, ini adalah whatsapp bot RSHK_ 🤖

Silahkan pilih *TOMBOL* dibawah untuk informasi yang bisa bot kami layani.



_Terima kasih_. 🙏🏻";
$button = 'JADWAL-DOKTER,DAFTAR';
sendMessageButton($wa_no, $msg, $button);
break;

case 'INFO':
$msg = "_Assalamualaikum, ini adalah whatsapp bot RSHK_ 🤖

Silahkan ketik ⬇️ *FORMAT* ⬇️ dibawah untuk informasi yang bisa bot kami layani.
* JADWAL-DOKTER
* DAFTAR

apabila ingin mengetahui informasi tentang pendaftaran pasien balas dengan *DAFTAR*

_Terima kasih_. 🙏🏻";
//$button = 'JADWAL-DOKTER,DAFTAR';
sendMessage($wa_no, $msg);
break;

case 'JADWAL-DOKTER': 
    
$msg = "Silahkan gunakan kata kunci berikut untuk informasi jadwal dokter.


*Untuk cek jadwal berdasarkan hari*
 ==============================
Ketik : *jadwal hari _(nama-hari)_*
Contoh penulisan : *jadwal hari senin*


*Untuk cek jadwal berdasarkan dokter*
 ==============================
Ketik : *Jadwal dokter _(nama-dokter)_*
Contoh penulisan : *jadwal dokter wawan*

👇🏻_format penulisan nama dokter_👇🏻

_*silahkan ganti nama dokter dengan yg ada di daftar*_⬇️

*agus* = _dr. Agus Sutanto, Sp.PD,M.Sc,FINASIM_
*aswin* = _dr. Aswin Boy Pratama, Sp.OG_
*betty* = _dr. Betty Soedally, Sp.S_
*burhan* = _dr. Burhanudin, Sp.B,MM_
*cahyo* = _dr. Muhammad Nurcahyo, Sp.PD_
*fadilah* = _drg. Fadilah Hepy Hapsari_
*jarot* = _dr. Jarot Kunto Wibowo, Sp.T.H.T_
*kalis* = _dr. Kalis Joko Purwanto, Sp.A,M.Sc_
*novi* = _dr. Novi Susilowaati, Sp.KJ_
*okayasa* = _dr. I Nyoman Okayasa, Sp.OG_
*puspita* = _drg. Puspita Ndaru Putrri, Sp.Ort_
*seruni* = _dr. Seruni Era Lestari, Sp.M_
*syifa* = _dr. Syifa Hidayati, Sp.Rad_
*wawan* = _dr Mukhlis Dermawan, Sp.OG_

_Terima kasih_. 🙏🏻";
sendMessage($wa_no, $msg);
//$button = 'KEMBALI';
//sendMessageButton($wa_no, $msg, $button);
break;

case 'DAFTAR':
$msg = 'Silahkan ketik ⬇️ *FORMAT* ⬇️ dibawah untuk informasi lebih lanjut

*Untuk daftar pasien lama*
 ==============================
Ketik/balas : PASIEN LAMA
Contoh penulisan : PASIEN LAMA


*Untuk daftar pasien baru*
 ==============================
Ketik/balas : PASIEN BARU
Contoh penulisan : PASIEN BARU

';
//$button = 'PASIEN BARU,PASIEN LAMA';
//sendMessageButton($wa_no, $msg, $button);
sendMessage($wa_no, $msg);
break;

//case 'KEMBALI':
//$msg = "_Assalamualaikum, ini adalah whatsapp bot RSHK_ 🤖

//Silahkan pilih ⬇️ *TOMBOL* ⬇️ dibawah untuk informasi yang bisa bot kami layani.



//_Terima kasih_. 🙏🏻";
//$button = 'JADWAL-DOKTER,DAFTAR';
//sendMessageButton($wa_no, $msg, $button);
//break;

case 'PASIEN BARU':
$msg = 'Silahkan salin pesan ini, dan isi identitas sesuai dengan KTP
Daftar Untuk Tanggal :
Daftar Ke-Poliklinik : 

No KTP : 
Nama Lengkap : 
Tempat/Tgl Lahir : 
Jenis Kelamin : 
Alamat : 
 RT/RW : 
 Kel/Desa : 
 Kecamatan : 
 Kabupaten : 
 Provinsi : 
Agama : 
Status Perkawinan : 
Pekerjaan : 
Kewarganegaraan : 
Suku : 
Asuransi : BPJS
No Asuransi : 
Email : 
Penanggung Jawab : Ayah/Ibu/Istri/Suami/Saudara/Anak
Nama Penanggung Jawab : 
';
sendMessage($wa_no, $msg);
break;

case 'PASIEN LAMA':
$msg = 'Mohon maaf Bapak/Ibu untuk pendaftaran melalui pesan WhatsApp telah ditutup.

Silahkan melakukan pendaftaran melalui;
- *Aplikasi MJKN*
dengan download aplikasi melalui link di bawah https://play.google.com/store/apps/details?id=app.bpjs.mobile, atau melalui

- *E-pasien*
 dengan membuka alamat di bawah  https://epasien.rshajikamino.com

*Pastikan Anda telah memiliki password untuk melakukan  pendaftaran melalui E-pasien. Jika belum memiliki password, Anda bisa menghubungi kami melalui saluran telpon ke nomor 081272095786*';


//$button = 'DOWNLOAD MJKN';
//sendMessageButton($wa_no, $msg, $button);
sendMessage($wa_no, $msg);
break;

//case 'DOWNLOAD MJKN':
//$msg = 'Berikut link downlod aplikasi MJKN
//Silahkan simpan nomor kami agar bisa membuka link dibawah

//https://play.google.com/store/apps/details?id=app.bpjs.mobile';
//sendMessage($wa_no, $msg);
//break;

case 'BUKHARI':
    $acak = rand(1,6638);
    $file = file_get_contents("https://api.hadith.sutanlab.id/books/bukhari/".$acak);
    $json = json_decode($file, true);
    $hadits = $json['data']['contents']['id'];
    $nomor = $json['data']['contents']['number'];
    $dari = $json['data']['available'];
    $riwayat = $json['data']['name'];
    $msg = 'Hadits nomor '.$nomor.' dari '.$dari.' 
    
'.$hadits.'

'.$riwayat.'';
sendMessage($wa_no, $msg);
break;	

case 'MUSLIM':
    $acak = rand(1,4930);
    $file = file_get_contents("https://api.hadith.sutanlab.id/books/muslim/".$acak);
    $json = json_decode($file, true);
    $hadits = $json['data']['contents']['id'];
    $nomor = $json['data']['contents']['number'];
    $dari = $json['data']['available'];
    $riwayat = $json['data']['name'];
    $msg = 'Hadits nomor '.$nomor.' dari '.$dari.' 
    
'.$hadits.'

'.$riwayat.'';
sendMessage($wa_no, $msg);
break;	

case 'TIRMIDZI':
    $acak = rand(1,3625);
    $file = file_get_contents("https://api.hadith.sutanlab.id/books/tirmidzi/".$acak);
    $json = json_decode($file, true);
     $hadits = $json['data']['contents']['id'];
    $nomor = $json['data']['contents']['number'];
    $dari = $json['data']['available'];
    $riwayat = $json['data']['name'];
    $msg = 'Hadits nomor '.$nomor.' dari '.$dari.' 
    
'.$hadits.'

'.$riwayat.'';
sendMessage($wa_no, $msg);
break;	

case 'ID':
sendMessage($wa_no, "Your ID = $wa_no");
break;

case 'MACBOOK PRO M1':
    $msg = 'MACBOOK PRO M1 Harga Rp. 20.999.000';
    $file = "https://cdn.eraspace.com/pub/media/catalog/product/m/a/macbook_pro_m1_space_gray_1_2.jpg";
sendMessageImage($wa_no, $msg, $file);
break;


case 'SHOLAT':
  $kode = 157 ;
    $content = file_get_contents("http://jadwalsholat.pkpu.or.id/monthly.php?id=". $kode);
    $pecah = explode( '<tr class="table_highlight" align="center">' ,$content) ;
    $pecah2 = explode( '</tr>' ,$pecah[1] ) ;
    
    $fix = $pecah2[0] ;
    $fix =  str_replace('</td>' , '', $fix ) ; 
    $fix =  str_replace('</b>' , '', $fix ) ; 
    $pecah3 = explode( '<td>' , $fix ) ;
    
    //--------------------------------------------------
    @$pecah4 = explode( '<td colspan="7" align="center">' ,$content) ;
    @$pecah5 = explode( '</small>' , $pecah4[1]) ;
    @$fix2 = $pecah5[0];
    $fix2 =  str_replace('<b>' , '', $fix2 ) ; 
    $fix2 =  str_replace('</b>' , '', $fix2 ) ; 
    $fix2 =  str_replace('<br>' , '', $fix2 ) ;  
    $fix2 =  str_replace('<small>' , '', $fix2 ) ;  
     
    //-------------------------------------------------- 
$hasil = "*JADWAL SHOLAT WAY KANAN* 
Tanggal $pecah3[1] ". trim($fix2) . "
- Subuh : $pecah3[2]
- Dzuhur : $pecah3[3]
- Ashar : $pecah3[4]
- Maghrib : $pecah3[5]
- Isya : $pecah3[6]
" ;
    
    $hasil =  str_replace('<b>' , '', $hasil ) ;    
    $hasil =  str_replace('(' , '<br>(', $hasil ) ;    
    $msg = $hasil ;
    $msg = str_replace('<br>', '%0A', $msg );
//echo 	$msg ;
	sendMessage($wa_no, $msg);
    break; 
	

case 'QURAN':
 
 $surat = rand(1,114);
 
 $file1 = file_get_contents("https://api.quran.sutanlab.id/surah/".$surat);
 $getsurat = json_decode($file1, true);
 
 $nosurat = $getsurat['data']['numberOfVerses'];
 $namasurat = $getsurat['data']['name']['transliteration']['id'];
 
 $ayat = rand(1,$nosurat);
 
 $file = file_get_contents("https://api.quran.sutanlab.id/surah/".$surat."/". $ayat);
 $json = json_decode($file, true);

$a = $json['data']['text']['arab'];
$i = $json['data']['translation']['id'];

    $msg = 'Surat '.$namasurat.' ayat '.$ayat.' 
    
'.$a.'

'.$i.'';

   sendMessage($wa_no, $msg );
   break;
	
}
 
 


function sendMessageButton($wa_no, $wa_text, $button) {
	$url = 'https://app.whacenter.com/api/sendButton';

$ch = curl_init($url);

$data = array(
    'device_id' => 'f26f3339042516088d6b6626917d22a2',
    'number' => $wa_no,
    'message' => $wa_text,
    'button' => $button,
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}

if ($text2 == 'DOKTER') { 
    
$result = (mysqli_query($conn,"SELECT jadwal.kd_dokter,dokter.nm_dokter,jadwal.hari_kerja,jadwal.jam_mulai,jadwal.jam_selesai,poliklinik.nm_poli,jadwal.kuota from jadwal
 inner join poliklinik inner join dokter on jadwal.kd_dokter=dokter.kd_dokter and jadwal.kd_poli=poliklinik.kd_poli
 WHERE jadwal.kd_dokter = '$text3'")) or die (mysqli_error($result));
        if(mysqli_num_rows($result) > 0){
          while ($row=mysqli_fetch_array($result)){
$msg .=  '🩺dokter       : '.$row['nm_dokter'].'
📅Hari            : '.$row['hari_kerja'].'
🚪Poliklinik  : '.$row['nm_poli'].'
⏰Mulai         : '.$row['jam_mulai'].'
🎯Selesai      : '.$row['jam_selesai'].
'
==============================
';
            }
    } else {
        $msg .= 'Data tidak ditemukan';
    }
     
    sendMessage($wa_no, $msg);
}

if ($text2 == 'HARI') { 
    
$result = (mysqli_query($conn,"SELECT jadwal.kd_dokter,dokter.nm_dokter,jadwal.hari_kerja,jadwal.jam_mulai,jadwal.jam_selesai,poliklinik.nm_poli,jadwal.kuota from jadwal
 inner join poliklinik inner join dokter on jadwal.kd_dokter=dokter.kd_dokter and jadwal.kd_poli=poliklinik.kd_poli
 WHERE hari_kerja = '$text3' and jadwal.kd_dokter !='-'")) or die (mysqli_error($result));
        if(mysqli_num_rows($result) > 0){
          while ($row=mysqli_fetch_array($result)){
$msg .=  '🩺dokter       : '.$row['nm_dokter'].'
📅Hari            : '.$row['hari_kerja'].'
🚪Poliklinik  : '.$row['nm_poli'].'
⏰Mulai         : '.$row['jam_mulai'].'
🎯Selesai      : '.$row['jam_selesai'].
'
==============================
';
            }
    } else {
        $msg .= 'Data tidak ditemukan';
    }
     
    sendMessage($wa_no, $msg);
}

//if ($text2 == 'opname') { 
    
//$sql_update = "update user set stok_opname_obat='true' where id_user=AES_ENCRYPT('erma','nur')";
//        if(mysqli_query($conn,$sql_update)){
//$msg .=  ' Berhasil Buka Akses
//'      
//    } else {
//        $msg .= 'Tidak Berhasil';
//    }
     
//    sendMessage($wa_no, $msg);
//}




function sendMessage($wa_no, $wa_text) {

$url = 'https://app.whacenter.com/api/send';

$ch = curl_init($url);

$nohp= $wa_no;
$pesan= $wa_text;

$data = array(
    'device_id' => 'f26f3339042516088d6b6626917d22a2',
    'number' => $nohp,
    'message' => $pesan,
    //'file' => 'https://urlgamba-file',
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}

function sendMessageImage($wa_no, $wa_text, $file) {

$url = 'https://app.whacenter.com/api/send';

$ch = curl_init($url);

$nohp= $wa_no;
$pesan= $wa_text;

$data = array(
    'device_id' => 'f26f3339042516088d6b6626917d22a2',
    'number' => $nohp,
    'message' => $pesan,
    'file' => $file,
   
);
$payload = $data;
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
//echo $result;
}
 
?>
