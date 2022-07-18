<div class="container-fluid">

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Pengaturan Soal</h6>
                    <!-- Modal Tambah-->

                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Paket Soal</th>
                                <th scope="col">Aktif</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Paket Soal A</td>
                                <td><label class="switch">
                                        <input id="change_blocked_soal_a" type="checkbox" <?php if ($blokirSoalA == 1) {
                                                                                                echo "checked";
                                                                                            } ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Paket Soal B</td>
                                <td><label class="switch">
                                        <input id="change_blocked_soal_b" type="checkbox" <?php if ($blokirSoalB == 1) {
                                                                                                echo "checked";
                                                                                            } ?>>
                                        <span class="slider round"></span></label></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    $('#change_blocked_soal_a').click(function() {
        var checked = $(this).is(':checked');
        if (checked) {
            if (!confirm('Aktifkan Paket Soal A ?')) {
                $(this).prop('checked', false);
            } else {
                change_block_soal_a(checked);
            }
        } else {
            if (!confirm('Matikan Paket Soal A ?')) {
                $(this).prop('checked', true);
            } else {
                change_block_soal_a(checked);
            }
        }
    });

    $('#change_blocked_soal_b').click(function() {
        var checked = $(this).is(':checked');
        if (checked) {
            if (!confirm('Aktifkan Paket Soal B ?')) {
                $(this).prop('checked', false);
            } else {
                change_block_soal_b(checked);
            }
        } else {
            if (!confirm('Matikan Paket Soal B ?')) {
                $(this).prop('checked', true);
            } else {
                change_block_soal_b(checked);
            }
        }
    });

    function change_block_soal_a(checkedSoalA) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("updateBlokirSoalA"); ?>',
            data: {
                checkedSoalA: checkedSoalA
            },
            cache: false,
            success: function(data) {},
            error: function(e) {},
            complete: function() {}
        });
    }

    function change_block_soal_b(checkedSoalB) {
        $.ajax({
            type: 'POST',
            url: '<?php echo site_url("updateBlokirSoalB"); ?>',
            data: {
                checkedSoalB: checkedSoalB
            },
            cache: false,
            success: function(data) {},
            error: function(e) {},
            complete: function() {}
        });
    }


    $(document).ready(function() {
        $('.master-sidebar').addClass('show');
        $('#pengaturan-soal').addClass('active');
    })
</script>