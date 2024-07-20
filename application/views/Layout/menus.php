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
        <li class="m-menu__item <?= is_active('appointment') ?>" aria-haspopup="true" m-menu-link-redirect="1">
            <a href="<?= base_url('appointment') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-notes-medical"></i>
                <span class="m-menu__link-text">Rawat Jalan</span>
            </a>
        </li>
        <li class="m-menu__item <?= is_active('patients') ?>" aria-haspopup="true" m-menu-link-redirect="1">
            <a href="<?= base_url('patients') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-users"></i>
                <span class="m-menu__link-text">Pasien</span>
            </a>
        </li>
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
    </ul>
</div>