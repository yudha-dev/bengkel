<?php

error_reporting(0);

// ==== BEGIN / variabel must be adjusted ====

$token = "bot" . "1582780453:AAHJMqxlgXYpAIf8IQ1H1rrQtYirx_2Xds4";
$proxy = "";
$mysql_host = "localhost";
$mysql_user = "root";
$mysql_pass = "";
$mysql_dbname = "bengkel";
// $chat_id = "830306491";

// ==== END / variabel must be adjusted ====


$db = mysqli_connect("localhost", "root", "", "bengkel") or die("Database tidak tersedia");
// $lht =  "SELECT * FROM tb_telegram";
// $cek = mysqli_query($db, $lht);
// $c = mysqli_fetch_array($cek);
// $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_pass);
// if (!$conn) {
// 	die('Could not connect: ' . mysqli_error($conn));
// }

// $db_selected = mysqli_select_db($conn, $mysql_dbname);
// if (!$db_selected) {
// 	die('Can\'t use foo : ' . mysqli_error($db_selected) . '<br>');
// }


$updates = file_get_contents("php://input");

$updates = json_decode($updates, true);
$pesan = $updates[message][text];
$chat_id = $updates[message][chat][id];

$pesan = strtoupper($pesan);
if (strpos($pesan, "AFTAR#") > 0) {
    $datas = explode("#", $pesan);
    $pemilik = $datas[1];
    $namabengkel = $datas[2];
    $telephone = $datas[3];
    $lht =  "SELECT * FROM bengkel where pemilik='$pemilik' AND namabengkel='$namabengkel' AND telephone='$telephone'";
    $cek = mysqli_query($db, $lht);
    $c = mysqli_fetch_array($cek);

    $bengkel = "UPDATE bengkel SET chat_id='$chat_id' WHERE pemilik='$pemilik' AND namabengkel='$namabengkel' AND telephone='$telephone'";

    $user = "UPDATE user SET username='$c[email]', password='12345' WHERE nama='$pemilik'";
    if ($lht == null) {
        $pesan_balik = "Data yang anda masukkan tidak tersedia..!";
    } elseif ($c['status'] == 'EVALUASI') {
        $pesan_balik = "Mohon Tunggu Konfirmasi Untuk Pengaktifan Akun Bengkel Anda";
    } else {
        // $pesan_balik = "Data pemilik : " . $pemilik . ",Nama bengkel : " . $namabengkel . ",telephone: " . $telephone . ",email: " . $c['email'];

        if (mysqli_query($db, $bengkel) && mysqli_query($db, $user)) {
            $pesan_balik = urlencode("Terimakasih telah mendaftarkan bengkel anda pada aplikasi BENGKELKU.\nSilahkan Login Akun dengan username dan password sebagai berikut:\n\nUsername : $c[email]\nPassword : 12345\n\nSetelah anda Login Akun, anda dapat melengkapi data bengkel dan mengubah password demi keamanan akun anda.\n\n Hormat Kami Bengkelku");
        } else {
            $pesan_balik = "Data gagal disimpan silahkan coba lagi";
        }
    }
} else
    $pesan_balik = urlencode("Mohon maaf format yang Anda kirim salah, silahkan kirim ulang dengan Format :\n\nDAFTAR#[NAMA PEMILIK]#[NAMA BENGKEL]#[TELEPHONE], \n\nContoh :\nDaftar#HARTANTO#GAS ONE#082223456756");
// $pesan_balik = "Chat Id pemilik : " . $chat_id . " Pesan : " . $pesan;


$url = "https://api.telegram.org/$token/sendMessage?parse_mode=markdown&chat_id=$chat_id&text=$pesan_balik";

$ch = curl_init();

if ($proxy == "") {
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CAINFO => "C:\cacert.pem"
    );
} else {
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_PROXY => "$proxy",
        CURLOPT_CAINFO => "C:\cacert.pem"
    );
}

curl_setopt_array($ch, $optArray);
$result = curl_exec($ch);

$err = curl_error($ch);
curl_close($ch);

if ($err <> "") echo "Error: $err";
else echo "Pesan Terkirim";
