<!DOCTYPE html>
<html>
<head>
    <title>Program PHP Sederhana</title>
</head>
<body align=center>
    <h1>Form Input</h1>
    <h3>Masukkan data diri Anda<h3>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        Nama: <input type="text" name="nama"><br><br>
        Tanggal Lahir: <input type="date" name="tgl_lahir"><br><br>
        Pekerjaan: 
        <select name="pekerjaan">
            <option value="Programmer">Programmer</option>
            <option value="Designer">Designer</option>
            <option value="Marketing">Marketing</option>
            <option value="Office Boy">Office Boy</option>
            <option value="Security">Security</option>
        </select><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
        // Cek apakah form sudah di-submit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Ambil nilai dari form
            $nama = $_POST["nama"];
            $tgl_lahir = $_POST["tgl_lahir"];
            $pekerjaan = $_POST["pekerjaan"];

            // Menghitung umur berdasarkan tanggal lahir
            $tgl_lahir_timestamp = strtotime($tgl_lahir);
            $umur = date("Y") - date("Y", $tgl_lahir_timestamp);

            // Menentukan gaji berdasarkan pekerjaan
            switch ($pekerjaan) {
                case "Programmer":
                    $gaji = 15000000;
                    break;
                case "Designer":
                    $gaji = 8000000;
                    break;
                case "Marketing":
                    $gaji = 6000000;
                    break;
                case "Office Boy":
                    $gaji = 2000000;
                    break;
                case "Security":
                    $gaji = 3500000;
                    break;
                default:
                    $gaji = 0;
                    break;
            }

            // Menampilkan output
            echo "<h2>Output</h2>";
            echo "Nama: " . $nama . "<br>";
            echo "Tanggal Lahir: " . $tgl_lahir . "<br>";
            echo "Umur: " . $umur . " tahun<br>";
            echo "Pekerjaan: " . $pekerjaan . "<br>";
            echo "Gaji: Rp " . number_format($gaji, 0, ",", ".") . "<br>";
        }
    ?>
</body>
</html>
