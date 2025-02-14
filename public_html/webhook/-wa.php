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

$wa_no = $number;
$wa_text0 = $message;
$wa_text = strtoupper($message);

if ($wa_no . $wa_text == ' ') { exit ; } 

$exp = explode(' ', $wa_text) ;
$text1 = $exp[0];
$text2 = $exp[1];
$text3 = $exp[2];
 
if ($text1 == 'INFO') { 
    
$msg = "_Halo ini whatsapp bot RSHK_ 🤖

Silahkan gunakan kata kunci berikut untuk informasi lain.

*ketik :*
*jadwal* _(untuk informasi jadwal dokter)_


_Terima kasih_. 🙏🏻";

     
    sendMessage($wa_no, $msg);
}

if ($text1 == 'JADWAL') { 
    
$msg = "Silahkan gunakan kata kunci berikut untuk informasi jadwal dokter.

 ================================
|          *Untuk cek jadwal berdasarkan hari*            |
 ================================
Ketik : Info-jadwal hari hari
Contoh : Info-jadwal hari senin

 ================================
|        *Untuk cek jadwal berdasarkan dokter*           |
 ================================
Ketik : Info-Jadwal dokter nama-dokter
Contoh : Info-Jadwal dokter cahyo

👇🏻_format penulisan dokter_👇🏻

*agus* = dr. Agus Sutanto, Sp.PD.M.Sc.FINASIM
*aswin* = ```dr. Aswin Boy Pratama, Sp.OG```
*betty* = ```dr. Betty Soedally, Sp.S```
*burhan* = ```dr. Burhanudin, Sp.B.MM```
*cahyo* = ```dr. Muhammad Nurcahyo, Sp.PD```
*fadilah* = ```drg. Fadilah Hepy Hapsari```
*jarot* = ```dr. Jarot Kunto Wibowo, Sp.T.H.T```
*kalis* = ```dr. Kalis Joko Purwanto, Sp.AM.Sc```
*novi* = ```dr. Novi Susilowaati, Sp. KJ```
*okayasa* = ```dr. I Nyoman Okayasa, Sp.OG```
*puspita* = ```drg. Puspita Ndaru Putrri, Sp. Ort```
*seruni* = ```dr. Seruni Era Lestari, Sp.M```
*syifa* = ```dr. Syifa Hidayati, Sp.Rad```
*wawan* = ```dr Mukhlis DermawanSp.OG```

_Terima kasih_. 🙏🏻";
     
    sendMessage($wa_no, $msg);
}

if ($text2 == 'DOKTER') { 
    
$result = (mysqli_query($conn,"SELECT jadwal.kd_dokter,dokter.nm_dokter,jadwal.hari_kerja,jadwal.jam_mulai,jadwal.jam_selesai,poliklinik.nm_poli,jadwal.kuota from jadwal
 inner join poliklinik inner join dokter on jadwal.kd_dokter=dokter.kd_dokter and jadwal.kd_poli=poliklinik.kd_poli
 WHERE jadwal.kd_dokter = '$text3'")) or die (mysqli_error($result));
        if(mysqli_num_rows($result) > 0){
          while ($row=mysqli_fetch_array($result)){
$msg .=  '
nm dokter: '.$row['nm_dokter'].'
Hari: '.$row['hari_kerja'].'
Poliklinik: '.$row['nm_poli'].'
Jam Mulai: '.$row['jam_mulai'].'
Jam Selesai: '.$row['jam_selesai'].
'
==================================
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
 WHERE hari_kerja = '$text3'")) or die (mysqli_error($result));
        if(mysqli_num_rows($result) > 0){
          while ($row=mysqli_fetch_array($result)){
$msg .=  '
nm dokter: '.$row['nm_dokter'].'
Hari: '.$row['hari_kerja'].'
Poliklinik: '.$row['nm_poli'].'
Jam Mulai: '.$row['jam_mulai'].'
Jam Selesai: '.$row['jam_selesai'].
'
==================================
';
            }
    } else {
        $msg .= 'Data tidak ditemukan';
    }
     
    sendMessage($wa_no, $msg);
}

if ($text2 == 'ISSN') { 
   
$result = (mysqli_query($conn,"SELECT * FROM biblio a left join biblio_author b on a.biblio_id=b.biblio_id left join mst_author c on b.author_id=c.author_id
 WHERE isbn_issn LIKE '%$text3%'")) or die (mysqli_error($result));
        if(mysqli_num_rows($result) > 0){
          while ($row=mysqli_fetch_array($result)){
$msg .= 'Title: '.$row['title'].'
Author: '.$row['author_name'].'
ISBN/ISSN: '.$row['isbn_issn'].'
Year: '.$row['publish_year'].'

';
            }
    } else {
        $msg .= 'Data tidak ditemukan';
    }
     
    sendMessage($wa_no, $msg);
}

function sendMessage($wa_no, $wa_text) {
    $url = 'https://app.whacenter.com/api/send';

    $ch = curl_init($url);
    
    $nohp= $wa_no;
    $pesan= $wa_text;
    
    $data = array(
        'device_id' => '607d7fe729c5e6c9c952a7a1ac54be60',
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
     
?>
