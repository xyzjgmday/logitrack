<!-- END: Subheader -->
<div class="m-content">
    <div class="m-portlet m-portlet--mobile">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        List <?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8') ?>
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="<?= $url; ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                            <span>
                                <i class="la la-plus"></i>
                                <span>Buat Kajian Awal</span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="m-portlet__body">
            <ul class="nav nav-tabs m-tabs-line m-tabs-line--primary" role="tablist">
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_1") ? "active" : '' ?>"
                        href="<?= htmlspecialchars($url_tabs, ENT_QUOTES, 'UTF-8') ?>">
                        Semuanya
                    </a>
                </li>
                <li class="nav-item m-tabs__item">
                    <a class="nav-link m-tabs__link <?= ($tabs == "#m_tabs_3_2") ? "active" : '' ?>"
                        href="<?= htmlspecialchars($url_tabs, ENT_QUOTES, 'UTF-8') ?>/follow-up">
                        Tindak Lanjut
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" role="tabpanel">
                    <table class="table table-striped table-bordered table-hover table-checkable" id="table-remdis">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Keluhan Utama</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data rows will be inserted here dynamically -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>