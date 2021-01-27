<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="metismenu-icon <?= $icon; ?> icon-gradient bg-mean-fruit"></i>
                </i>
            </div>
            <div><?= $halaman; ?></div>
        </div>
        <div class="page-title-actions">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tlp</th>
                            <td>Tanggal</td>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Tlp</th>
                            <td>Tanggal</td>
                            <!-- <th>Actions</th> -->
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($invoices as $invoice) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $invoice['invoices_name'] ?></td>
                                <td><?= $invoice['invoices_tlp'] ?></td>
                                <td><?= $invoice['created_at'] ?></td>
                                <!-- <td>
                                    <a href="<?= base_url('admin/invoice/' . $invoice['id_invoices']); ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i>Detail</a>
                                </td> -->
                            </tr>
                            
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>