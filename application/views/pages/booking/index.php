<main role="main" class="container">
    <?php $this->load->view('layouts/_alert'); ?>
    <div class="row">

        <div class="col-md-10 mx-auto">
            <div class="card mb-10">
                <div class="card-header">
                    <span>Booking</span>

                    <div class="float-right">
                        <?= form_open(base_url('booking/search'), ['method' => 'POST']) ?>
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control form-control-sm text-center" placeholder="Cari" value="<?= $this->session->userdata('keyword') ?>">
                            <div class="input-group-append">
                                <button class="btn btn-secondary btn-sm">
                                    <i class="fas fa-search"></i>
                                </button>
                                <a href="<?= base_url('booking/reset') ?>" class="btn btn-secondary btn-sm">
                                    <i class="fas fa-eraser"></i>
                                </a>
                            </div>
                        </div>
                        <?= form_close() ?>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Tanggal</th>
                                <th>Tanggal Booking</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($content as $row) : ?>
                                <tr>
                                    <td><a href="<?= base_url("/booking/detail/$row->id") ?>">#<?= $row->invoice  ?></a></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->date))) ?></td>
                                    <td><?= str_replace('-', '/', date("d-m-Y", strtotime($row->datebook))) ?></td>
                                    <td>
                                        <?php $this->load->view('layouts/_status', ['status' => $row->status]); ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <?= $pagination ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</main>