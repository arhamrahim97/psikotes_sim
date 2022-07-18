<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="<?= "assets/" ?>js/sweetalert.js"></script>
    <title>Hello, world!</title>
</head>

<body>
    <div class="container my-5">
        <h1>SUBTES 1</h1>
        <form action="<?= base_url('hasilSoal') ?>" method="POST" target="_blank" id="hitung">
            <?php
            $i = 1;
            foreach ($subtes1 as $sub1) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub1->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1_<?= $i ?>" id="subtes1_<?= $i ?>" value="<?= $sub1->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub1->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1_<?= $i ?>" id="subtes1_<?= $i ?>" value="<?= $sub1->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub1->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes1_<?= $i ?>" id="subtes1_<?= $i ?>" value="<?= $sub1->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub1->pilihan_c ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <h1 class="mt-5">SUBTES 2</h1>
            <?php
            $i = 1;
            foreach ($subtes2 as $sub2) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub2->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2_<?= $i ?>" id="subtes2_<?= $i ?>" value="<?= $sub2->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub2->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2_<?= $i ?>" id="subtes2_<?= $i ?>" value="<?= $sub2->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub2->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes2_<?= $i ?>" id="subtes2_<?= $i ?>" value="<?= $sub2->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub2->pilihan_c ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <h1 class="mt-5">SUBTES 3</h1>
            <?php
            $i = 1;
            foreach ($subtes3 as $sub3) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub3->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3_<?= $i ?>" id="subtes3_<?= $i ?>" value="<?= $sub3->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub3->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3_<?= $i ?>" id="subtes3_<?= $i ?>" value="<?= $sub3->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub3->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes3_<?= $i ?>" id="subtes3_<?= $i ?>" value="<?= $sub3->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub3->pilihan_c ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <h1 class="mt-5">SUBTES 4</h1>
            <?php
            $i = 1;
            foreach ($subtes4 as $sub4) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub4->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4_<?= $i ?>" id="subtes4_<?= $i ?>" value="<?= $sub4->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub4->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4_<?= $i ?>" id="subtes4_<?= $i ?>" value="<?= $sub4->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub4->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4_<?= $i ?>" id="subtes4_<?= $i ?>" value="<?= $sub4->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub4->pilihan_c ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes4_<?= $i ?>" id="subtes4_<?= $i ?>" value="<?= $sub4->nilai_d ?>"></td>
                        <td width="2%">D.</td>
                        <td><?= $sub4->pilihan_d ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <h1 class="mt-5">SUBTES 5</h1>
            <?php
            $i = 1;
            foreach ($subtes5 as $sub5) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub5->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5_<?= $i ?>" id="subtes5_<?= $i ?>" value="<?= $sub5->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub5->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5_<?= $i ?>" id="subtes5_<?= $i ?>" value="<?= $sub5->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub5->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5_<?= $i ?>" id="subtes5_<?= $i ?>" value="<?= $sub5->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub5->pilihan_c ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes5_<?= $i ?>" id="subtes5_<?= $i ?>" value="<?= $sub5->nilai_d ?>"></td>
                        <td width="2%">D.</td>
                        <td><?= $sub5->pilihan_d ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <h1 class="mt-5">SUBTES 6</h1>
            <?php
            $i = 1;
            foreach ($subtes6 as $sub6) { ?>
                <table class="table">
                    <tr>
                        <td width="2%"><?= $i . ". " ?></td>
                        <td><?= $sub6->pertanyaan ?></td>
                    </tr>
                </table>

                <table class="table borderless ">
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6_<?= $i ?>" id="subtes6_<?= $i ?>" value="<?= $sub6->nilai_a ?>"></td>
                        <td width="2%">A.</td>
                        <td><?= $sub6->pilihan_a ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6_<?= $i ?>" id="subtes6_<?= $i ?>" value="<?= $sub6->nilai_b ?>"></td>
                        <td width="2%">B.</td>
                        <td><?= $sub6->pilihan_b ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6_<?= $i ?>" id="subtes6_<?= $i ?>" value="<?= $sub6->nilai_c ?>"></td>
                        <td width="2%">C.</td>
                        <td><?= $sub6->pilihan_c ?></td>
                    </tr>
                    <tr>
                        <td width="2%"><input type="radio" name="subtes6_<?= $i ?>" id="subtes6_<?= $i ?>" value="<?= $sub6->nilai_d ?>"></td>
                        <td width="2%">D.</td>
                        <td><?= $sub6->pilihan_d ?></td>
                    </tr>
                </table>
            <?php $i++;
            } ?>

            <!-- <button id="hitung" class="btn btn-primary">Hitung</button> -->
            <input type="submit" value="Hitung" class="btn btn-primary">
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $("#hitung").submit(function() {
            var hasil_subtes1 = 0;
            var hasil_subtes2 = 0;
            var hasil_subtes3 = 0;
            var hasil_subtes4 = 0;
            var hasil_subtes5 = 0;
            var hasil_subtes6 = 0;
            var hasil_akhir = 0;
            var kkm = 60;

            var subtes1 = <?= count($subtes1) ?>;
            var nilai_subtes1 = 0;
            var total_cek_subtes1 = 0;
            for (var i = 1; i <= subtes1; i++) {
                if ($("input[name='subtes1_" + i + "']:checked").val()) {
                    total_cek_subtes1 += 1;
                    nilai_subtes1 = parseInt(nilai_subtes1) + parseInt($("input[name='subtes1_" + i + "']:checked").val());
                }
            }

            var subtes2 = <?= count($subtes2) ?>;
            var nilai_subtes2 = 0;
            var total_cek_subtes2 = 0;
            for (var i = 1; i <= subtes2; i++) {
                if ($("input[name='subtes2_" + i + "']:checked").val()) {
                    total_cek_subtes2 += 1;
                    nilai_subtes2 = parseInt(nilai_subtes2) + parseInt($("input[name='subtes2_" + i + "']:checked").val());
                }
            }

            var subtes3 = <?= count($subtes3) ?>;
            var nilai_subtes3 = 0;
            var total_cek_subtes3 = 0;
            for (var i = 1; i <= subtes3; i++) {
                if ($("input[name='subtes3_" + i + "']:checked").val()) {
                    total_cek_subtes3 += 1;
                    nilai_subtes3 = parseInt(nilai_subtes3) + parseInt($("input[name='subtes3_" + i + "']:checked").val());
                }
            }

            var subtes4 = <?= count($subtes4) ?>;
            var nilai_subtes4 = 0;
            var total_cek_subtes4 = 0;
            for (var i = 1; i <= subtes4; i++) {
                if ($("input[name='subtes4_" + i + "']:checked").val()) {
                    total_cek_subtes4 += 1;
                    nilai_subtes4 = parseInt(nilai_subtes4) + parseInt($("input[name='subtes4_" + i + "']:checked").val());
                }
            }

            var subtes5 = <?= count($subtes5) ?>;
            var nilai_subtes5 = 0;
            var total_cek_subtes5 = 0;
            for (var i = 1; i <= subtes5; i++) {
                if ($("input[name='subtes5_" + i + "']:checked").val()) {
                    total_cek_subtes5 += 1;
                    nilai_subtes5 = parseInt(nilai_subtes5) + parseInt($("input[name='subtes5_" + i + "']:checked").val());
                }
            }

            var subtes6 = <?= count($subtes6) ?>;
            var nilai_subtes6 = 0;
            var total_cek_subtes6 = 0;
            for (var i = 1; i <= subtes6; i++) {
                if ($("input[name='subtes6_" + i + "']:checked").val()) {
                    total_cek_subtes6 += 1;
                    nilai_subtes6 = parseInt(nilai_subtes6) + parseInt($("input[name='subtes6_" + i + "']:checked").val());
                }
            }

            if (total_cek_subtes1 < subtes1) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 1',
                })
                return false;
            } else if (total_cek_subtes2 < subtes2) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 2',
                })
                return false;
            } else if (total_cek_subtes3 < subtes3) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 3',
                })
                return false;
            } else if (total_cek_subtes4 < subtes4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 4',
                })
                return false;
            } else if (total_cek_subtes5 < subtes5) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 5',
                })
                return false;
            } else if (total_cek_subtes6 < subtes6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Periksa Kembali Jawaban Subtes 6',
                })
                return false;
            } else {
                $('#hitung').submit();
                // hasil_subtes1 = (nilai_subtes1 / (3 * subtes1)) * 100;
                // hasil_subtes2 = (nilai_subtes2 / (3 * subtes2)) * 100;
                // hasil_subtes3 = (nilai_subtes3 / (3 * subtes3)) * 100;
                // hasil_subtes4 = (nilai_subtes4 / (1 * subtes4)) * 100;
                // hasil_subtes5 = (nilai_subtes5 / (1 * subtes5)) * 100;
                // hasil_subtes6 = (nilai_subtes6 / (1 * subtes6)) * 100;
                // hasil_akhir = (hasil_subtes1 + hasil_subtes2 + hasil_subtes3 + hasil_subtes4 + hasil_subtes5 + hasil_subtes6) / 6;
                // if (hasil_akhir < kkm) {
                //     alert('Anda Gagal Dengan Nilai Subtes 1 : ' + hasil_subtes1 + ',Subtes 2 : ' + hasil_subtes2 + ',Subtes 3 : ' + hasil_subtes3 + ',Subtes 4 : ' + hasil_subtes4 + ',Subtes 5 : ' + hasil_subtes5 + ',Subtes 6 : ' + hasil_subtes6 + ',Hasil Akhir' + hasil_akhir);
                // } else {
                //     alert('Anda Lulus Dengan Nilai Subtes 1 : ' + hasil_subtes1 + ',Subtes 2 : ' + hasil_subtes2 + ',Subtes 3 : ' + hasil_subtes3 + ',Subtes 4 : ' + hasil_subtes4 + ',Subtes 5 : ' + hasil_subtes5 + ',Subtes 6 : ' + hasil_subtes6 + ',Hasil Akhir : ' + hasil_akhir);
                // }
                // Swal.fire({
                //     icon: 'success',
                //     title: 'Berhasil',
                //     text: 'Sukses',
                // })
            }

        })
    </script>
</body>

</html>