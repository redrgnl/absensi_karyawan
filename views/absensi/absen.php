<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Absen Harian</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-6">
                                <div id="my_camera"></div>                                
                            </div>
                            <div class="col-lg-6">
                                <div id="results">Harap Ambil Wajah Terlebih Dahulu</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table w-100">
                            <thead>
                                <th>Tanggal</th>
                                <th>Ambil Gambar</th>
                                <th>Absen Masuk</th>
                                <th>Absen Pulang</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php if(is_weekend()): ?>
                                        <td class="bg-light text-danger" colspan="4">Hari ini libur. Tidak Perlu absen</td>
                                    <?php else: ?>
                                        <td><?= tgl_hari(date('d-m-Y')) ?></td>
                                        <td>
                                            <input type=button class="btn btn-danger btn-sm btn-fill" value="Take Snapshot" onClick="take_snapshot()">
                                        </td>
                                        <td>
                                            <form method="post" action="<?= base_url('absensi/absen') ?>"  enctype="multipart/form-data">
                                                <input type="hidden" name="inpgambar1" id="inpgambar1">
                                                <input type="hidden" name="inpket" value="masuk">
                                                <button type="<?= ($absen == 1) ? 'button' : 'submit' ?>" class="btn btn-primary btn-sm btn-fill">Absen Masuk</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form method="post" action="<?= base_url('absensi/absen') ?>"  enctype="multipart/form-data">
                                                <input type="hidden" name="inpgambar2" id="inpgambar2">
                                                <input type="hidden" name="inpket" value="pulang">
                                                <button type="<?= ($absen == 1) ? 'button' : 'submit' ?>" class="btn btn-primary btn-sm btn-fill">Absen Pulang</button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="<?= base_url('absensi/simpan_status') ?>" method="post">
                                            <input type="text" name="status" value="<?=isset($_POST['Status']) ? $_POST['Status'] : ''?>"/>
                                            <div class="row">
                                            <input type="submit" name="submit" value="Simpan"/>
                                            </div>
                                        </div>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </tbody>
                        </table>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script language="JavaScript">
    Webcam.set({
        width: 480,
        height: 360,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            $("#inpgambar1").val(data_uri);
            $("#inpgambar2").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>