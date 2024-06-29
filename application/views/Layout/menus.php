<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1"
    m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__item  m-menu__item--active" aria-haspopup="true">
            <a href="
                <?= base_url() ?>" class="m-menu__link ">
                <i class="m-menu__link-icon flaticon-line-graph"></i>
                <span class="m-menu__link-title">
                    <span class="m-menu__link-wrap">
                        <span class="m-menu__link-text">Dashboard</span>
                    </span>
                </span>
            </a>
        </li>
        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
            <a href="
                <?= base_url('appointment') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-notes-medical"></i>
                <span class="m-menu__link-text">Rawat Jalan</span>
            </a>
        </li>
        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
            <a href="
                <?= base_url('patients') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon flaticon-users"></i>
                <span class="m-menu__link-text">Pasien</span>
            </a>
        </li>
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">Master</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li class="m-menu__item " aria-haspopup="true" m-menu-link-redirect="1">
            <a href="
                <?= base_url('data-users') ?>" class="m-menu__link ">
                <span class="m-menu__item-here"></span>
                <i class="m-menu__link-icon fa fa-users"></i>
                <span class="m-menu__link-text">Data User</span>
            </a>
        </li>
    </ul>
</div>