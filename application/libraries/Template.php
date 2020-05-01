<?php
class Template
{
    public $template_data = array();

    public function set($name, $value)
    {
        $this->template_data[$name] = $value;
    }

    public function load($template = '', $value = '', $view_data = array(), $return = false)
    {
        $this->CI =& get_instance();
        $this->set('contents', $this->CI->load->view($view, $view_data, true));
        return $this0->CI->load->view($template, $this->template_data, $return);
    }
}
