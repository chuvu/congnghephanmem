<?php

class MY_Parser extends CI_Parser
{
    protected function _parse($template, $data, $return = false)
    {
        if ($template === '') {
            return false;
        }

        $replace = array();
        foreach ($data as $key => $val) {
            $replace = array_merge(
                $replace,
                (is_array($val) || is_object($val))
                ? $this->_parse_pair($key, $val, $template)
                : $this->_parse_single($key, (string) $val, $template)
                );
        }

        unset($data);
        $template = strtr($template, $replace);

        if ($return === false) {
            $this->CI->output->append_output($template);
        }

        return $template;
    }
}
