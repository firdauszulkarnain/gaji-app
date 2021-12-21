<?php

class Template
{
    var $templateData = array();
    function set($name, $value)
    {
        $this->templateData[$name] = $value;
    }

    function load($template = '', $view = '', $view_data = array(), $return = FALSE)
    {
        $this->CI = &get_instance();
        $this->set('contens', $this->CI->load->view($view, $view_data, TRUE));
        return $this->CI->load->view($template, $this->templateData, $return);
    }
}
