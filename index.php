<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <style>
        /* Gaya untuk mengatur tampilan kalkulator */
        body {
            display: flex;
            justify-content: center; /* Memusatkan konten secara horizontal */
            align-items: center;     /* Memusatkan konten secara vertikal */
            height: 100vh;          /* Mengatur tinggi body menjadi 100% dari viewport */
            margin: 20;              /* Menghapus margin default */
            background-color: #808080; /* Warna latar belakang */
            font-family: "'Fira Code', monospace"; /* Font untuk teks */
        }
        .calculator {
            background-color: #ffffff; /* Warna latar belakang kalkulator */
            padding: 30px;             /* Memberikan padding di dalam kalkulator */
            border-radius: 20px;       /* Membuat sudut kalkulator membulat */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Memberikan bayangan pada kalkulator */
            width: 300px;              /* Lebar kalkulator */
        }
        h2 {
            text-align: center;        /* Memusatkan teks heading */
            color: #8B4513;               /* Warna teks heading */
        }
        label {
            margin-top: 20px;         /* Memberikan jarak atas pada label */
            display: block;           /* Membuat label tampil sebagai blok */
        }
        input[type="number"], select {
            width: 90%;               /* Lebar input dan select 100% dari kontainer */
            padding: 10px;             /* Memberikan padding di dalam input dan select */
            margin: 10px 0 10px 0;      /* Margin untuk spasi antar elemen */
            border: 1px solid #ccc;    /* Border input */
            border-radius: 10px;        /* Sudut membulat pada input */
        }
        input[type="submit"] {
            width: 80%;               /* Lebar tombol submit 100% dari kontainer */
            padding: 10px;             /* Memberikan padding di dalam tombol */
            background-color: #8b4513; /* Warna latar belakang tombol */
            border: none;              /* Menghapus border pada tombol */
            border-radius: 10px;       /* Sudut membulat pada tombol */
            color: white;              /* Warna teks tombol */
            font-size: 16px;           /* Ukuran font tombol */
            cursor: pointer;           /* Mengubah kursor saat hover pada tombol */
        }
        input[type="submit"]:hover {
            background-color: #000; /* Mengubah warna saat tombol dihover */
        }
        .result {
            text-align: center;        /* Memusatkan teks hasil */
            margin-top: 20px;         /* Memberikan jarak atas pada hasil */
            align-items: center;      /* Mengatur konten agar berada di tengah secara vertikal */
            font-size: 18px;          /* Ukuran font untuk hasil */
            color: #555;              /* Warna teks hasil */ 
            align-items: center;      /* Mengatur konten agar berada di tengah secara vertikal */
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Kalkulator Sederhana</h2>
    <form method="post" action="">
        <label for="num1">Angka Pertama:</label>
        <input type="number" name="num1" id="num1" required>

        <label for="num2">Angka Kedua:</label>
        <input type="number" name="num2" id="num2" required>

        <label for="operation">Operasi:</label>
        <select name="operation" id="operation" required>
            <option value="add">Tambah (+)</option>
            <option value="subtract">Kurang (-)</option>
            <option value="multiply">Kali (*)</option>
            <option value="divide">Bagi (/)</option>
        </select>

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    // Memeriksa apakah tombol submit ditekan
    if (isset($_POST['submit'])) {
        // Mengambil nilai dari input
        $num1 = $_POST['num1']; // Angka pertama dari input
        $num2 = $_POST['num2']; // Angka kedua dari input
        $operation = $_POST['operation']; // Operasi yang dipilih pengguna
        $result = ""; // Inisialisasi variabel hasil

        // Melakukan operasi sesuai pilihan
        switch ($operation) {
            case "add":
                $result = $num1 + $num2; // Penjumlahan
                break;
            case "subtract":
                $result = $num1 - $num2; // Pengurangan
                break;
            case "multiply":
                $result = $num1 * $num2; // Perkalian
                break;
            case "divide":
                if ($num2 != 0) {
                    $result = $num1 / $num2; // Pembagian
                } else {
                    $result = "Kesalahan: Tidak dapat membagi dengan 0."; // Pesan kesalahan jika membagi dengan 0
                }
                break;
            default:
                $result = "Operasi tidak valid"; // Pesan kesalahan untuk operasi yang tidak valid
                break;
        }

        // Menampilkan hasil perhitungan
        echo "<div class='result'>Hasil: $num1 " . ($operation == "add" ? "+" : ($operation == "subtract" ? "-" : ($operation == "multiply" ? "*" : "/"))) . " $num2 = $result</div>";
    }
    ?>
</div>

</body>
</html>
 