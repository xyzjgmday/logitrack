<!-- END: Subheader -->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        List
                        <?= $title ?>
                    </h3>
                </div>
            </div>
            <?php //if ($this->session->userdata('s_level_data') == 1) { ?>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="<?= $url ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Tambah Data</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
            <? php// } ?>

        </div>
        <div class="m-portlet__body">
            <div class="m-portlet__body">
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_1") ? "active" : '' ?>"
                            href="<?= $url_tabs ?>">Semua
                            Registrasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_2") ? "active" : '' ?>"
                            href="<?= $url_tabs ?>/waiting">Menunggu
                            Konsultasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_3") ? "active" : '' ?>"
                            href="<?= $url_tabs ?>/done">Selesai
                            Konsultasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_4") ? "active" : '' ?>"
                            href="<?= $url_tabs ?>/cancel">Dibatalkan</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">
                        <table class="table table-striped- table-bordered table-hover table-checkable"
                            id="table-rajal">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Antrian</th>
                                    <th>Tanggal Konsul</th>
                                    <th>Dokter</th>
                                    <th></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>