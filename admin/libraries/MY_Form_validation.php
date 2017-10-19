<?php

class MY_Form_validation extends CI_Form_Validation
{
    protected $defaultIsPass = true;

    public function getErrorsArray()
    {
        return $this->_error_array;
    }

    public function dateFormat($date, $format)
    {
        return @date_format(date_create($date), $format) == $date;
    }

    /**
     * Check exists from database
     */
    public function exists($value, $table, $field)
    {
        $CI =& get_instance();
        $count = $CI->db->from('table', $table)->where($field, $value)->count_all_results();
        
        return $count != 0;
    }

    public function run($group = '')
    {
        $validation_array = empty($this->validation_data)
            ? $_POST
            : $this->validation_data;

        // Does the _field_data array containing the validation rules exist?
        // If not, we look to see if they were assigned via a config file
        if (count($this->_field_data) === 0) {
            // No validation rules?  We're done...
            if (count($this->_config_rules) === 0) {
                return $this->defaultIsPass; // edit by phambinh
            }

            if (empty($group)) {
                // Is there a validation rule for the particular URI being accessed?
                $group = trim($this->CI->uri->ruri_string(), '/');
                isset($this->_config_rules[$group]) or $group = $this->CI->router->class.'/'.$this->CI->router->method;
            }

            $this->set_rules(isset($this->_config_rules[$group]) ? $this->_config_rules[$group] : $this->_config_rules);

            // Were we able to set the rules correctly?
            if (count($this->_field_data) === 0) {
                log_message('debug', 'Unable to find validation rules');
                return $this->defaultIsPass; // edit by phambinh
            }
        }

        // Load the language file containing error messages
        $this->CI->lang->load('form_validation');

        // Cycle through the rules for each field and match the corresponding $validation_data item
        foreach ($this->_field_data as $field => &$row) {
            // Fetch the data from the validation_data array item and cache it in the _field_data array.
            // Depending on whether the field name is an array or a string will determine where we get it from.
            if ($row['is_array'] === true) {
                $this->_field_data[$field]['postdata'] = $this->_reduce_array($validation_array, $row['keys']);
            } elseif (isset($validation_array[$field])) {
                $this->_field_data[$field]['postdata'] = $validation_array[$field];
            }
        }

        // Execute validation rules
        // Note: A second foreach (for now) is required in order to avoid false-positives
        //   for rules like 'matches', which correlate to other validation fields.
        foreach ($this->_field_data as $field => &$row) {
            // Don't try to validate if we have no rules set
            if (empty($row['rules'])) {
                continue;
            }

            $this->_execute($row, $row['rules'], $row['postdata']);
        }

        // Did we end up with any errors?
        $total_errors = count($this->_error_array);
        if ($total_errors > 0) {
            $this->_safe_form_data = true;
        }

        // Now we need to re-set the POST data with the new, processed data
        empty($this->validation_data) && $this->_reset_post_array();

        return ($total_errors === 0);
    }
}
