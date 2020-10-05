<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*This is for call back for the form_validation class. Since we are extending class from MX_controller 
we are not able to get the call back properly so adding this one.
*/
class MY_Form_validation extends CI_Form_validation
    {

    function run($module = '', $group = '')
    {
       (is_object($module)) AND $this->CI = &$module;
        return parent::run($group);
    }
}