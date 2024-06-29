<?php

class Layout
{

    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }

    public function utama($content, $data = NULL, $link, $link2 = NULL)
    {
        $data['contentnya'] = $this->_ci->load->view($content.'.view.php', $data, TRUE);
        $data['menus'] = $this->_ci->load->view('Layout/menus', $data, TRUE);
        $data['topbar'] = $this->_ci->load->view('Layout/topbar', $data, TRUE);
        $data['footernya'] = $this->_ci->load->view('Layout/footer', $data, TRUE);

        if ($link2 != NULL) {
            if (is_file(APPPATH . 'modules/' . $link . '/views/head' . $link2 . '.php')) {
                $data['css_vendor'] = $this->_ci->load->view($link . '/head' . $link2, $data, TRUE);
            } else {
                $data['css_vendor'] = '';
            }
        } else {
            if (is_file(APPPATH . 'modules/' . $link . '/views/head' . $link . '.php')) {
                $data['css_vendor'] = $this->_ci->load->view($link . '/head' . $link, $data, TRUE);
            } else {
                $data['css_vendor'] = '';
            }
        }

        if ($link2 != NULL) {
            if (is_file(APPPATH . 'modules/' . $link . '/views/footer' . $link2 . '.php')) {
                $data['js_vendor'] = $this->_ci->load->view($link . '/footer' . $link2, $data, TRUE);
            } else {
                $data['js_vendor'] = '';
            }
        } else {
            if (is_file(APPPATH . 'modules/' . $link . '/views/footer' . $link . '.php')) {
                $data['js_vendor'] = $this->_ci->load->view($link . '/footer' . $link, $data, TRUE);
            } else {
                $data['js_vendor'] = '';
            }
        }

        $this->_ci->load->view('default', $data);
    }

}
