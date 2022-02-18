<?php
$json = json_decode(file_get_contents('http://localhost/trackit/api/indexBMI.json'));

if ($_POST) {
    $tinggi = $_POST["tinggi"];
    $berat = $_POST["berat"];
    if ($tinggi > 0 && $berat > 0) {
    }

    $BMI = number_format(($berat / (($tinggi * $tinggi) / 10000)), 2, '.', "");
    if ($BMI < 18.5) {
        $spec = 0;
        $color = 'lowIndex';
    } else if ($BMI > 18.5 && $BMI < 22.9) {
        $spec = 1;
        $color = 'idealIndex';
    } else if ($BMI > 22.9 && $BMI < 24.9) {
        $spec = 2;
        $color = 'ObesityIndex';
    } else if ($BMI > 25 && $BMI < 29.9) {
        $spec = 3;
        $color = 'ObesityIndex1';
    } else if ($BMI > 30) {
        $spec = 4;
        $color = 'ObesityIndex2';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/seccond.css">
    <title>BMI Calc</title>
</head>

<body>
    <nav class="nav">
        <div class="menu">
            <div class="Menu-group">
                <a href="" class="logo">BMI <span>Calc</span><span style="color: #d35400;">.</span></a>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (!$_POST) { ?>
            <div class="jumbotron">
                <h1>For your informartion</h1>
                <p>Body Mass Index (BMI) atau Indeks Massa Tubuh (IMT) adalah angka yang menjadi penilaian standar untuk menentukan apakah berat badan Anda tergolong normal, kurang, berlebih, atau obesitas.</p>
                <p>yang 2 parameter yang dibutuhkan untuk mengukur bmi yaitu tinggi dan berat badan.</p>
            </div>
        <?php } ?>
        <?php if ($_POST) { ?>
            <div class="jumbotron-result <?= $color ?>">
                <h2><?= $json[$spec]->title ?></h2>
                <div class="rows">
                    <div class="index">
                        <h3>Index BMI</h3>
                        <h1><?= $BMI ?></h1>
                        <span><?= $json[$spec]->index_mass ?></span>
                    </div>
                    <div class="detail">
                        <table>
                            <tr>
                                <td>Tinggi</td>
                                <td> : <?= $tinggi ?> Cm</td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>: <?= $berat ?> Kg</td>
                            </tr>
                        </table>
                        <p><?= $json[$spec]->deskripsi ?></p>
                    </div>
                </div>
            </div>
        <?php } ?>
        <form class="form-controll" target="" method="POST">
            <h3>Kalkulator BMI</h3>
            <div class="form-controll-input">
                <label for="">Tinggi (cm)</label>
                <input type="number" name="tinggi" id="tinggi" placeholder="Tinggi" require>
            </div>
            <div class="form-controll-input">
                <label for="">Berat Badan (Kg)</label>
                <input type="number" name="berat" id="berat" placeholder="Berat badan" require>
            </div>
            <button class="btn-input" >Hitung</button>
        </form>
    </div>
</body>

</html>