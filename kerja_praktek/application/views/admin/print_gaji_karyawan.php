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
            <div class="col-sm-2" style="padding-top: 10px;">
                <img src="<?= base_url()?>uploads\logo\logo.jpeg" width="100px" alt="">
            </div>
            <div class="col-sm-9">
                <h3>Data Gaji Karyawan Arumanis Jadul Haji Ardi</h3>
            </div>
        </div>
        <br><br>
        <table border="1" class="table table-responsive ">
            <tr>
                <th>No.</th>
                <th>Nama Karyawan</th>
                <th>Bulan</th>
                <th>Jabatan</th>
                <th>Kehadiran</th>
                <th>Gaji</th>
            </tr>
            <?php $no = 1 ; foreach($karyawan as $k) {?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $k->nama_karyawan?></td>
                <td><?= $k->bulan?> - <?= $k->tahun?></td>
                <td><?= $k->jabatan?></td>
                <td>
                    Hadir : <?= $k->hadir?> <br> 
                    Sakit : <?= $k->sakit?> <br> 
                    Alpa : <?= $k->alpa?></td>
                <td>
                Gaji Pokok : Rp.<?php $angka=number_format($k->gaji_pokok); $uang = str_replace(',', '.', $angka); echo $uang?><br>
                Tunjangan  : Rp.<?php $angka=number_format($k->tunjangan_jabatan); $uang = str_replace(',', '.', $angka); echo $uang?><br>
                Potongan   :  
                Rp.<?php 
                $s = $k->sakit*$sakit['jumlah_potongan']; 
                $a = $k->alpa*$alpa['jumlah_potongan']; 
                $pot = number_format($s+$a);
                $pot = str_replace(',', '.', $pot) ; 
                echo $pot ?><br>

                Total : 
                Rp.<?php $s = $k->sakit*$sakit['jumlah_potongan']; 
                $a = $k->alpa*$alpa['jumlah_potongan']; 
                $pot = $s+$a ; 
                $total = $k->gaji_pokok + $k->tunjangan_jabatan - $pot ; 
                $total = number_format($total);
                $total = str_replace(',', '.', $total);
                echo $total ?>

                </td>
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
