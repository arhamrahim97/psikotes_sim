<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Instansi</h6>
                    <!-- Modal Tambah-->

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-group">
                        <label>Alamat (Wajib)</label>
                        <textarea class="form-control" id="alamat" rows="3"><?= $alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon (Wajib)</label>
                        <input type="text" class="form-control" id="no_telepon" aria-describedby="emailHelp" placeholder="Masukkan Nomor Telepon" value="<?= $no_telepon ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Masukkan Email" value="<?= $email ?>">
                    </div>
                    <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control" id="facebook" aria-describedby="emailHelp" placeholder="Masukkan Facebook" value="<?= $facebook ?>">
                    </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control" id="instagram" aria-describedby="emailHelp" placeholder="Masukkan Instagram" value="<?= $instagram ?>">
                    </div>
                    <button class="btn btn-primary float-right mt-2" id="btnUpdate">Simpan</button>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    // Update Ajax
    $("#btnUpdate").click(function() {
        var alamat = $("#alamat").val();
        var no_telepon = $("#no_telepon").val();
        var email = $("#email").val();
        var facebook = $("#facebook").val();
        var instagram = $("#instagram").val();
        if (!alamat) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Alamat Tidak Boleh Dikosongkan',
            })
        } else if (no_telepon == '') {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Nomor Telepon Tidak Boleh Dikosongkan',
            })
        } else {
            Swal.fire({
                title: 'Anda Yakin Ingin Mengubah Informasi Instansi Ini?',
                text: "Perubahan Yang Sudah Dilakukan Tidak Dapat Dikembalikan",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url('updateInstansi') ?>',
                        data: {
                            alamat: alamat,
                            no_telepon: no_telepon,
                            email: email,
                            facebook: facebook,
                            instagram: instagram
                        },
                        success: function(data) {
                            if (data == 'true') {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Instansi Berhasil Diupdate',
                                        timer: 3000,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    })
                                    .then(function() {
                                        location.reload();
                                    });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Terjadi Kesalahan',
                                    text: 'Terdapat Kesalahan Pada Sistem',
                                })
                            }
                        },
                        error: function() {
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: 'Terdapat Kesalahan Pada Sistem',
                            })
                        }
                    })
                }
            })

        }
    })


    $(document).ready(function() {
        $('#master-instansi').addClass('active');
    })
</script>