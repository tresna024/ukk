<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicons -->
    <link href="<?= base_url(); ?>assets/style/img/icon.png" rel="icon">
    
    <style>
        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }
        }
    </style>
    <title>Laporan <?= $title ?></title>
</head>

<body>
    <h1 style="text-align: center;">Cetak Laporan <?= $title ?></h1>
    <table id="example" class="table table-striped" border="1px" cellspacing="0px" style="width:100%">
        <thead class="p-3 bg-gray-500 text-white">
            <tr>
                <th>No</th>
                <th>Tanggal Pengaduan</th>
                <th>Nama Pelapor</th>
                <th>Isi Laporan</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($print_selesai as $ps) {
                echo '<tr>
                    <td>' .  $no++ . '</td>
                    <td>' . $ps['tgl_pengaduan'] . '</td>
                    <td>' . $ps['nama'] . '</td>
                    <td>' . $ps['isi_laporan'] . '</td>
                    <td>' . $ps['status'] . '</td>
                </tr>';
            }
            ?>

        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            window.print();
        });
    </script>
</body>

</html>