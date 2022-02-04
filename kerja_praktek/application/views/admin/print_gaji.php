<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Slip Gaji
        </title>

        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #eee;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }

            .invoice-box table {
                width: 100%;
                line-height: inherit;
                text-align: left;
            }

            .invoice-box table td {
                padding: 5px;
                vertical-align: top;
            }

            .invoice-box table tr td:nth-child(2) {
                text-align: right;
            }

            .invoice-box table tr.top table td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.top table td.title {
                font-size: 45px;
                line-height: 45px;
                color: #333;
            }

            .invoice-box table tr.information table td {
                padding-bottom: 40px;
            }

            .invoice-box table tr.heading td {
                background: #eee;
                border-bottom: 1px solid #ddd;
                font-weight: bold;
            }

            .invoice-box table tr.details td {
                padding-bottom: 20px;
            }

            .invoice-box table tr.item td {
                border-bottom: 1px solid #eee;
            }

            .invoice-box table tr.item.last td {
                border-bottom: none;
            }

            .invoice-box table tr.total td:nth-child(2) {
                border-top: 2px solid #eee;
                font-weight: bold;
            }

            @media only screen and (max-width: 600px) {
                .invoice-box table tr.top table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }

                .invoice-box table tr.information table td {
                    width: 100%;
                    display: block;
                    text-align: center;
                }
            }

            /** RTL **/
            .invoice-box.rtl {
                direction: rtl;
                font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            }

            .invoice-box.rtl table {
                text-align: right;
            }

            .invoice-box.rtl table tr td:nth-child(2) {
                text-align: left;
            }
        </style>
    </head>

    <body>
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    <img
                                        src="<?= base_url('uploads/logo/logo.jpeg')?>"
                                        style="width: 100%; max-width: 200px"/>
                                </td>
                                <td>
                                    Laporan Gaji
                                    <br/>
                                    Dibuat :
                                    <?= date('d - m - y') ?><br/>
                                    Nama :
                                    <?= $kehadiran['nama_karyawan'] ?>
                                    <br>
                                    Jabatan :
                                    <?= $kehadiran['nama_jabatan']?>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <?php 
				?>
                <tr class="heading">
                    <td>Jenis Gaji</td>

                    <td>Jumlah</td>
                </tr>

                <tr class="item">
                    <td>Gaji Pokok</td>

                    <td>Rp.
                        <?php $angka=number_format($gaji['gaji_pokok']); $uang = str_replace(',', '.', $angka); echo $uang?></td>
                </tr>

                <tr class="item">
                    <td>Tunjangan</td>

                    <td>Rp.
                        <?php $angka=number_format($gaji['tunjangan_jabatan']); $uang = str_replace(',', '.', $angka); echo $uang?></td>
                </tr>

                <tr class="item last">
                    <td>Potongan</td>

                    <td>Rp.
                        <?= $potongan ?></td>
                </tr>

                <tr class="total">
                    <td></td>

                    <td>Total: Rp.
                        <?php $angka = $gaji['gaji_pokok']+$gaji['tunjangan_jabatan']-$potongan ; $angka = number_format($angka);
										 $uang = str_replace(',', '.', $angka);
										echo $uang ?>
                        ;
                    </td>
                </tr>
            </table>
			<div align="right">
			<p>Mengetahui  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p> <br><br><br><br>
			<p>(.......................)  &nbsp;&nbsp;&nbsp;</p>
			</div>
        </div>

        <script>
            window.print();
        </script>
    </body>
</html>
