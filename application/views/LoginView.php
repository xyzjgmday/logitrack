<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
    <meta charset="utf-8" />
    <title>SIRUKIT - RS Kabupaten Sorong</title>
    <meta name="description" content="Sistem Informasi Logitrack">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!--end::Web font -->

    <!--begin::Global Theme Styles -->
    <link href="<?= base_url(); ?>assets/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="<?= base_url(); ?>assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="<?= base_url(); ?>assets/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />

    <!--RTL version:<link href="<?= base_url(); ?>assets/demo/default/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    <!--end::Global Theme Styles -->
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/demo/default/media/img/logo/favicon.ico" />
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">

    <!-- begin:: Page -->
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-grid--tablet-and-mobile m-grid--hor-tablet-and-mobile m-login m-login--1 m-login--signin" id="m_login">
            <div class="m-grid__item m-grid__item--order-tablet-and-mobile-2 m-login__aside">
                <div class="m-stack m-stack--hor m-stack--desktop">
                    <div class="m-stack__item m-stack__item--fluid">
                        <div class="m-login__wrapper">
                            <div class="m-login__logo">
                                <a href="#">
                                    <img src="https://www.rsudkabupatensorong.co.id/_nuxt/logo-sorong2-1.f2aaf0e1.png" width="140">
                                </a>
                            </div>
                            <div class="m-login__signin">
                                <div class="m-login__head">
                                    <h3 class="m-login__title">Sign In</h3>
                                </div>
                                <?php echo $this->session->flashdata('message'); ?>
                                <?= form_open(site_url('login/identifier'), array('class' => 'm-login__form m-form')); ?>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input" type="text" placeholder="Email or Username" name="email-username" autocomplete="off">
                                </div>
                                <div class="form-group m-form__group">
                                    <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Password" name="password">
                                </div>
                                <div class="row m-login__form-sub">
                                    <div class="col m--align-left">
                                        <label class="m-checkbox m-checkbox--focus">
                                            <input type="checkbox" name="remember"> Remember me
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="col m--align-right">
                                        <a href="javascript:;" id="m_login_forget_password" class="m-link">Forget
                                            Password ?</a>
                                    </div>
                                </div>
                                <div class="m-login__form-action">
                                    <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign
                                        In</button>
                                </div>
                                <?= form_close(); ?>
                            </div>
                            <div class="m-login__signup">
                                <div class="m-login__head">
                                    <h3 class="m-login__title">Sign Up</h3>
                                    <div class="m-login__desc">Enter your details to create your account:</div>
                                </div>
                                <form class="m-login__form m-form" action="">
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input" type="text" placeholder="Fullname" name="fullname">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input" type="text" placeholder="Email" name="email" autocomplete="off">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input" type="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input m-login__form-input--last" type="password" placeholder="Confirm Password" name="rpassword">
                                    </div>
                                    <div class="row form-group m-form__group m-login__form-sub">
                                        <div class="col m--align-left">
                                            <label class="m-checkbox m-checkbox--focus">
                                                <input type="checkbox" name="agree"> I Agree the <a href="#" class="m-link m-link--focus">terms and conditions</a>.
                                                <span></span>
                                            </label>
                                            <span class="m-form__help"></span>
                                        </div>
                                    </div>
                                    <div class="m-login__form-action">
                                        <button id="m_login_signup_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Sign
                                            Up</button>
                                        <button id="m_login_signup_cancel" class="btn btn-outline-focus  m-btn m-btn--pill m-btn--custom">Cancel</button>
                                    </div>
                                </form>
                            </div>
                            <div class="m-login__forget-password">
                                <div class="m-login__head">
                                    <h3 class="m-login__title">Forgotten Password ?</h3>
                                    <div class="m-login__desc">Enter your email to reset your password:</div>
                                </div>
                                <form class="m-login__form m-form" action="">
                                    <div class="form-group m-form__group">
                                        <input class="form-control m-input" type="text" placeholder="Email" name="email" id="m_email" autocomplete="off">
                                    </div>
                                    <div class="m-login__form-action">
                                        <button id="m_login_forget_password_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Request</button>
                                        <button id="m_login_forget_password_cancel" class="btn btn-outline-focus m-btn m-btn--pill m-btn--custom">Cancel</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="m-stack__item m-stack__item--center">
                        <div class="m-login__account">
                            <span class="m-login__account-msg">
                                Don't have an account yet ?
                            </span>&nbsp;&nbsp;
                            <a href="javascript:;" id="m_login_signup" class="m-link m-link--focus m-login__account-link">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="m-grid__item m-grid__item--fluid m-grid m-grid--center m-grid--hor m-grid__item--order-tablet-and-mobile-1	m-login__content m-grid-item--center" style="background-image: url(<?= base_url(); ?>assets/img/banner-login.jpeg)">
                <div class="m-grid__item">
                    <h3 class="m-login__welcome m--font-brand">Logitrack</h3>
                    <p class="m-login__msg">
                    Lacak Lebih Cerdas, Kirim Lebih Cepat...
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!--begin::Global Theme Bundle -->
    <script src="<?= base_url(); ?>assets/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="<?= base_url(); ?>assets/demo/default/base/scripts.bundle.js" type="text/javascript"></script>

    <!--end::Global Theme Bundle -->

    <!--begin::Page Scripts -->
    <!-- <script src="<?= base_url(); ?>assets/snippets/custom/pages/user/login.js" type="text/javascript"></script> -->

    <!--end::Page Scripts -->
</body>

<!-- end::Body -->

</html>