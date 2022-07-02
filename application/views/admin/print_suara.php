<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
</head>
<body>
    <!-- <div class="col-md-12">
    <img src="<?= base_url('assets/'); ?>image/smkn1ciamis.png" alt="logo smkn 1 ciamis" style="position: absolute; width:60px; height: auto;">
    <table>
        <tr>
            <td align="center">
                <span style="line-height: 1.6; font-weight: bold;">
                    OSIS <br>
                    SMK NEGERI 1 CIAMIS <br>
                    Jl. jenderal Sudirman No. 269 Telp. (0265) 771204 Ciamis <br> 
                    Email: <a href="mailto:surat@smkn1cms.net?subject:Informasi">surat@smkn1cms.net</a><br>
                  Website: <a href="https://smkn1ciamis.id/">www.smkn1-cms.sch.id</a>
                </span>
            </td>
        </tr>
    </table>
    <hr class="line-title">
    </div> -->
    <div class="col-md-12 mt-3">
        <h3 align="center" class="text-secondary"> Laporan Pemilihan</h3>
    </div>
    <div class="box-body col-md-12">
        <table id="example1" class="table table-bordered table-striped">
            <thead> 
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Memilih</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach($rows as $row) : 
                ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row->nama_user ?></td>
                    <td><?= $row->nama_kandidat ?></td>
                    <td><?= $row->created ?></td>
                </tr>
            <?php endforeach; ?>
            <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
            </tbody>
            </table>
            <script type="text/javascript">
                window.print();
            </script>
    </div>
</body>
</html>