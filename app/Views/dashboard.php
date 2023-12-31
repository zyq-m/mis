<?= $this->extend("template/layout"); ?>
<?= $this->section("content"); ?>

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <h3>
                    <?= esc($totalPatient) ?>
                </h3>

                <p>Total of Patients</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('patient') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>
                    <?= esc($totalMalePatient) ?>
                </h3>

                <p>Male Patients</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('patient') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>
                    <?= esc($totalFemalePatient) ?>
                </h3>

                <p>Female Patients</p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="<?= base_url('patient') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>
                    <?= esc($totalStaff) ?>
                </h3>

                <p>Total of Staffs</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Maklumat Penduduk Hendrop</h4>
            </div>
            <div class="modal-body">
                <p>Bilangan Peduduk: 100 orang</p>
                <p>Bilangan Peduduk Lelaki: 60 orang</p>
                <p>Bilangan Peduduk Perempuan: 40 orang</p>
                <p>Bilangan Penghulu: 5 orang</p>
                <p>Bilangan Ketua Isi Rumah (KIR): 30 orang</p>
                <p>Bilangan Ahli Isi Rumah (AIR): 40 orang</p>
                <p>Bilangan Program Agensi: 30 program</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
            </div>
        </div>

    </div>
</div>




<?= $this->endSection(); ?>