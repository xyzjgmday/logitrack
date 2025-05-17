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
            <?php if ($this->session->userdata('s_level_data') == 1) { ?>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item">
                            <a href="<?= $url ?>" class="btn btn-primary m-btn m-btn--custom m-btn--icon m-btn--air">
                                <span>
                                    <i class="la la-plus"></i>
                                    <span>Tambah Drivers</span>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            <?php } ?>
        </div>
        <div class="m-portlet__body">

            <!--begin: Datatable -->
            <table class="table table-striped- table-bordered table-hover table-checkable" id="table-drivers">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Drivers</th>
                        <th>No Telepon</th>
                        <th>Plat Nomor</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Drivers</th>
                        <th>No. Telepon</th>
                        <th>Plat Nomor</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<script>
    var sessionId = <?= json_encode($this->session->userdata("session_key")) ?>
</script>