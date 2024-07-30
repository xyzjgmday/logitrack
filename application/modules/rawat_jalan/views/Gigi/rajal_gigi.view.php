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
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_3_1" role="tab">Semua
                            Registrasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_2" role="tab">Menunggu
                            Konsultasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_3" role="tab">Selesai
                            Konsultasi</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_3_4" role="tab">Dibatalkan</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_3_1" role="tabpanel">
                        <table class="table table-striped- table-bordered table-hover table-checkable" id="table-dentistry">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pasien</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Antrian</th>
                                    <th>Tanggal Konsul</th>
                                    <th>Dokter</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="tab-pane" id="m_tabs_3_2" role="tabpanel">
                        It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets containing Lorem Ipsum passages.
                    </div>
                    <div class="tab-pane" id="m_tabs_3_3" role="tabpanel">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scramble.
                    </div>
                    <div class="tab-pane" id="m_tabs_3_4" role="tabpanel">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scramble.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var sessionId = <?= json_encode($this->session->userdata("session_key")) ?>
</script>