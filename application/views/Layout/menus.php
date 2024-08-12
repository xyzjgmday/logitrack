<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
    m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item <?= is_active('') ?>" aria-haspopup="true">
            <a href="<?= base_url() ?>" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Dashboard</span>
                    </span>
                </span>
            </a>
        </li>
        <?php if ($this->session->userdata('s_level_data') == 1 || $this->session->userdata('s_level_data') == 2) { ?>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Perawatan</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu <?= is_active_submenu(['general', 'dentistry'], 2) ?>"
                aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
                    class="m-menu__link m-menu__toggle"> <i class="m-menu__link-icon fa fa-briefcase-medical"></i>
                    <span class="m-menu__link-text">Rawat Jalan</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item <?= is_active('general', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('appointment/general') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Poli Umum</span></a></li>
                        <li class="m-menu__item <?= is_active('dentistry', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('appointment/dentistry') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Poli Gigi</span></a></li>
                    </ul>
                </div>
            </li>

        <?php } ?>
        <?php if ($this->session->userdata('s_level_data') == 1 || $this->session->userdata('s_level_data') == 2) { ?>
            <li class="m-menu__item  m-menu__item--submenu <?= is_active_submenu(['resume', 'dentistry'], 2) ?>"
                aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
                    class="m-menu__link m-menu__toggle"> <i class="m-menu__link-icon fa fa-notes-medical"></i>
                    <span class="m-menu__link-text">Rekam Medis</span><i
                        class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item <?= is_active('resume', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('medical-record/resume') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Resume</span></a></li>
                        <li class="m-menu__item <?= is_active('', 2) ?>" aria-haspopup="true"><a
                                href="javascript:;" class="m-menu__link " data-toggle="modal" data-target="#m_modal_1"><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Pemeriksaan</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="m-menu__item <?= is_active('patients') ?>" aria-haspopup="true" m-menu-link-redirect="1">
                <a href="<?= base_url('patients') ?>" class="m-menu__link ">
                    <span class="m-menu__item-here"></span>
                    <i class="m-menu__link-icon fa fa-bed"></i>
                    <span class="m-menu__link-text">Rawat Inap</span>
                </a>
            </li>
        <?php } ?>
        <li class="m-menu__item <?= is_active('patients') ?>" aria-haspopup="true" m-menu-link-redirect="1">
            <a href="<?= base_url('patients') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-users"></i>
                <span class="m-menu__link-text">Pasien</span>
            </a>
        </li>
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">Inventori</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li class="m-menu__item  m-menu__item--submenu <?= is_active_submenu(['drugs'], 2) ?>" aria-haspopup="true"
            m-menu-submenu-toggle="hover"><a href="javascript:;" class="m-menu__link m-menu__toggle"><i
                    class="m-menu__link-icon fa fa-flask"></i><span class="m-menu__link-text">Apotek</span><i
                    class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item <?= is_active('drugs', 2) ?>" aria-haspopup="true"><a
                            href="<?= base_url('pharmacy/drugs') ?>" class="m-menu__link "><i
                                class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                class="m-menu__link-text">Obat</span></a></li>
                </ul>
            </div>
        </li>
        <?php if ($this->session->userdata('s_level_data') == 1) { ?>
            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Master</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li class="m-menu__item  m-menu__item--submenu <?= is_active_submenu(['user', 'polyclinic', 'services', 'practitioner'], 2) ?>"
                aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="javascript:;"
                    class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-interface-1"></i><span
                        class="m-menu__link-text">Master Data</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li class="m-menu__item <?= is_active('user', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('master/user') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Akun</span></a></li>
                        <li class="m-menu__item <?= is_active('polyclinic', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('master/polyclinic') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Poliklinik</span></a></li>
                        <li class="m-menu__item <?= is_active('services', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('master/services') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Layanan</span></a></li>
                        <li class="m-menu__item <?= is_active('practitioner', 2) ?>" aria-haspopup="true"><a
                                href="<?= base_url('master/practitioner') ?>" class="m-menu__link "><i
                                    class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span
                                    class="m-menu__link-text">Tenaga Medis</span></a></li>
                    </ul>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>