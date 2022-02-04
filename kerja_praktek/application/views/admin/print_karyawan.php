<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link
            rel="stylesheet"
            href="<?= base_url()?>assets\front\css\bootstrap.min.css">
    </head>
    <body>

        <div class="row">
            <div class="col-sm-3" style="padding-top: 10px;">
                <img src="<?= base_url()?>uploads\logo\logo.jpeg" width="100px" alt="">
            </div>
            <div class="col-sm-9">
                <h1>Data Karyawan Arumanis Jadul Haji Ardi</h1>
            </div>
        </div>
        <br><br>
        <table border="1" class="table table-responsive text-center">
            <tr>
                <th>No.</th>
                <th>Nik</th>
                <th>Nama Karyawan</th>
                <th>Jenis Kelamin</th>
                <th>Jabatan</th>
                <th>Tanggal Masuk</th>
            </tr>
            <?php $no = 1 ; foreach($karyawan as $k) {?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $k->nik?></td>
                <td><?= $k->nama_karyawan?></td>
                <td><?= $k->jenis_kelamin?></td>
                <td><?= $k->jabatan?></td>
                <td><?= $k->tanggal_masuk?></td>
            </tr>
            <?php }?>
        </table>

        <div class="" align="right">
            <p>Mengetahui &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
            <br><br><br>
            <p>(........................) &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
        </div>
        <script>
            var css = '@page { size: landscape; }',
                head = document.head || document.getElementsByTagName('head')[0],
                style = document.createElement('style');

            style.type = 'text/css';
            style.media = 'print';

            if (style.styleSheet) {
                style.styleSheet.cssText = css;
            } else {
                style.appendChild(document.createTextNode(css));
            }

            head.appendChild(style);

            window.print();
        </script>

    </body>
</html>
