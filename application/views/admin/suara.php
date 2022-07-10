<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?= $title ?></h3>
            <?= $this->session->flashdata('message'); ?> 
            <?php sleep(1); unset($_SESSION['message']); ?>
            <a class="btn btn-info" href="<?= base_url('admin/suara/print'); ?>"><i class="fa fa-print"> Print</i></a>
            <a class="btn btn-success" href="<?= base_url('admin/suara/excel'); ?>"><i class="fa fa-download"> Export Excel</i></a>
        </div>
        <!-- /.box-header -->
        <!--Delete Suara Menggunakan Checkbox but belum fungsi -->
        <div class="box-body">
        <?= form_open_multipart('admin/suara/deletemultiple', ['class' => 'formhapus']) ?>
            <div class="form-row">
                <div class="col">
                    <button type="submit" class="btn btn-danger tombolHapusBanyak">
                        <i class="fa fa-trash-o"></i> Hapus Banyak
                    </button>
                </div>
            </div>
        <?= form_close(); ?>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" id="centangSemua">
                        </th>
                        <th>NO</th>
                        <th>Nama</th>
                        <th>Memilih</th>
                        <th>Created</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($rows as $row) : 
                    ?>
            <tr>
                <td><input type="checkbox" class="centangIdSuara" value=<?= $row->id_suara ?> name="id_suara[]"></td>
                <td><?= $no++ ?></td>
                <td><?= $row->nama_user ?></td>
                <td><?= $row->nama_kandidat ?></td>
                <td><?= $row->created ?></td>
                <td>
                    <a href="<?= site_url('admin/suara/hapus/' . $row->id_suara); ?>" 
                    class="btn btn-sm btn-danger" onclick="return confirm ('Yakin Hapus?')">
                    <i class="fa fa-trash-o"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
            <script src="<?= base_url('assets/'); ?>js/jquery-3.5.1.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/popper.min.js"></script>
            <script src="<?= base_url('assets/'); ?>js/bootstrap.min.js"></script>
            <script src="<?= base_url('assets/'); ?>sweetalert2/package/dist/sweetalert2.all.min.js"></script>
            </tbody>
            </table>
        </div>
    </div>
    <!-- script tambahan -->
<div class="viewmodal" style="display: none;"></div>
<script>
function tampildatasuara() {
    table = $('#suara').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= site_url('suara/getSuara') ?>",
            "type": "POST"
        },

        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
}
$(document).ready(function() {
    $('#centangSemua').click(function(e) {
        if($(this).is(" :checked")) {
           $('.centangIdSuara').prop('checked', true);
        } else {
            $('.centangIdSuara').prop('checked', false);
        }
    });
    tampildatasuara();

    $('.formhapus').submit(function(e) {
        e.preventDefault();
        let jmldata = $('.centangIdSuara:checked');

        if(jmldata.length === 0)
        {
            Swal.fire({
                icon: 'warning',
                title: 'perhatian',
                text: 'Maaf tidak ada data yang bisa dihapus, centang terlebih dahulu'
            })
        } else {
            Swal.fire({
            title: 'Hapus data',
            text: `Ada ${jmldata.length} data suara yang akan dihapus, yakin? `,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Tidak'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        if(response.sukses) {
                            Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.sukses
                        })
                            tampildatasuara();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            }
            })
        }
        return false;
    });
});
</script>
</section>