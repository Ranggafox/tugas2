<?php

$folders = [
    'bootstrap/cache',
    'storage/framework/cache',
    'storage/framework/sessions',
    'storage/framework/views',
];

echo "🚀 Mulai pengecekan folder Laravel...\n\n";

foreach ($folders as $folder) {
    if (!is_dir($folder)) {
        echo "❗ Folder belum ada: $folder -> Membuat...\n";
        mkdir($folder, 0777, true); // Buat folder dan parent-nya
    } else {
        echo "✅ Folder sudah ada: $folder\n";
    }

    // Cek permission tulis
    if (!is_writable($folder)) {
        echo "⚠️  Folder tidak writable: $folder\n";
        echo "    Coba ubah permission...\n";
        @chmod($folder, 0777);
        if (is_writable($folder)) {
            echo "    ✅ Sekarang sudah writable!\n";
        } else {
            echo "    ❌ Gagal ubah permission. Coba ubah manual di file explorer.\n";
        }
    } else {
        echo "🟢 Folder bisa ditulis: $folder\n";
    }
}

echo "\n🎉 Selesai cek folder dan permission!\n";
