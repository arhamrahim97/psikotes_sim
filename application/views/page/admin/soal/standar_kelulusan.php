<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Standar Kelulusan</h6>
                    <div class="dropdown no-arrow">
                        <button type="button" class="btn btn-primary" data-toggle="modal" id="btnStandar">
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                    </div>
                    <!-- Modal Tambah-->
                    <div class="modal fade" id="modalStandar" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <form method="POST">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Standar Kelulusan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="tahun">Standar Kelulusan (%)</label>
                                            <input type="text" class="form-control" id="standarKelulusan" placeholder="Masukkan Standar Kelulusan" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" maxlength='3' pattern='^[0-9]$'>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="button" class="btn btn-success" id="btnUpdateStandar">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <p>Standar Kelulusan untuk Tes Psikologi Saat Ini Adalah : <b><?= $standar_kelulusan ?> %</b></p>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $("#btnStandar").click(function() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('getStandarKelulusan') ?>',
            dataType: "JSON",
            success: function(data) {
                $("#standarKelulusan").val(data.nilai);
            }
        })
        $("#modalStandar").modal('show');
    })

    $("#btnUpdateStandar").click(function() {
        var standarKelulusan = $("#standarKelulusan").val();
        if (standarKelulusan == "") {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Standar Kelulusan Tidak Boleh Dikosongkan',
            })
        } else if (standarKelulusan > 100) {
            Swal.fire({
                icon: 'error',
                title: 'Terjadi Kesalahan',
                text: 'Standar Kelulusan Tidak Boleh Lebih Dari 100%',
            })
        } else {
            Swal.fire({
                title: 'Anda Yakin Ingin Mengubah Standar Kelulusan ?',
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
                        url: '<?php echo base_url('updateStandarKelulusan') ?>',
                        data: {
                            standarKelulusan: standarKelulusan
                        },
                        success: function(data) {
                            if (data == 'true') {
                                Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: 'Standar Kelulusan Berhasil Diupdate',
                                        timer: 1500,
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
        $('.master-sidebar').addClass('show');
        $('#standar-kelulusan').addClass('active');
    })
</script>