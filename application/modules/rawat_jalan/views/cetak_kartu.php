<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Pasien - <?= $title ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- JsBarcode -->
    <script src="https://cdn.jsdelivr.net/npm/jsbarcode/dist/JsBarcode.all.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            width: 9cm;
            height: 5.6cm;
            margin: 20px;
            border-radius: 15px;
            overflow: hidden;
            background: url('<?= base_url(); ?>assets/img/bg.jpg') no-repeat center center;
            color: white;
            position: relative;
        }

        .card-header {
            padding: 15px;
            text-align: left;
            font-size: 1.1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
        }

        .card-header img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
        }

        .card-body {
            padding: 15px;
        }

        .card-body h5 {
            margin: 0 0 5px;
            font-size: 1rem;
            font-weight: 400;
        }

        .card-body p {
            margin: 0;
            font-size: 0.800rem;
            font-weight: 400;
        }

        .card-footer {
            padding: 15px;
            text-align: left;
            font-size: 0.800rem;
            font-weight: 400;
            display: flex;
            align-items: center;
        }

        .barcode {
            margin-left: auto;
            width: 100px;
            /* Lebar barcode */
            height: 40px;
            /* Tinggi barcode */
        }
    </style>
</head>

<body>
    <div class="card">
        <div class="card-header">
            <img src="https://www.rsudkabupatensorong.co.id/_nuxt/logo-sorong2-1.f2aaf0e1.png" alt="Logo Rumah Sakit">
            Rumah Sakit Upaya Sehat
        </div>
        <div class="card-body">
            <h5><?= $nama ?></h5>
            <p><?= $mrn ?></p>
            <p>Bandung Barat</p>
        </div>
        <div class="card-footer">
            <?= $tanggal ?>
            <svg class="barcode" id="barcode"></svg>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        JsBarcode("#barcode", "<?= $mrn ?>", {
            format: "CODE128",
            displayValue: false
        });
    </script>
</body>

</html>