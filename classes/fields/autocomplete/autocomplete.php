<?php

/**
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 *
 */
class autocomplete extends gfirem_field_base
{
    private  $base_url ;
    private  $view_path ;
    public  $version = '1.0.0' ;
    public function __construct()
    {
        $this->base_url = plugin_dir_url( __FILE__ ) . 'assets/';
        $this->view_path = dirname( __FILE__ ) . '/view/';
        parent::__construct(
            'autocomplete',
            gfirem_manager::translate( 'Autocomplete' ),
            array(
            'autocomplete_target_form'         => '0',
            'autocomplete_target_field'        => '0',
            'autocomplete_target_filter'       => '0',
            'autocomplete_target_filter_group' => '0',
        ),
            gfirem_manager::translate( 'Show a text field with autocomplete.' ),
            array(),
            gfirem_fs::$professional
        );
    }
    
    protected function inside_field_options( $field, $display, $values )
    {
    }
    
    protected function field_front_view( $field, $field_name, $html_id )
    {
    }
    
    protected function display_options( $display )
    {
        $display['unique'] = false;
        $display['required'] = true;
        $display['read_only'] = true;
        $display['description'] = true;
        $display['options'] = true;
        $display['label_position'] = true;
        $display['css'] = true;
        $display['conf_field'] = false;
        $display['invalid'] = true;
        $display['default_value'] = true;
        $display['visibility'] = true;
        $display['size'] = true;
        return $display;
    }
    
    private function exist_meta( $search, $field, $type )
    {
    }
    
    /**
     * Add class to the field
     *
     * @param $classes
     * @param $field
     *
     * @return string
     */
    public function fields_class( $classes, $field )
    {
        $classes .= ' fma_field ';
        return $classes;
    }
    
    /**
     * Validate if exist the key in the form target
     *
     * @param $errors
     * @param $posted_field
     * @param $posted_value
     *
     * @return mixed
     */
    protected function validate_frm_entry( $errors, $posted_field, $posted_value )
    {
        return $errors;
    }

}