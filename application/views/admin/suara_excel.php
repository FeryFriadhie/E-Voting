<?php
header("Content-type:application/octet-stream/");
header("Content-Disposition:attachment; filename=$title.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <div class="col-md-12 mt-3">
        <h3 align="center" class="text-secondary"> Laporan Pemilihan</h3>
    </div>
    <div class="box-body">
        <table border="1" width="100%">
            <thead>
                <tr>
                    <th>NO</th>
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
            </tbody>
        </table>
    </div>
</body>
</html>