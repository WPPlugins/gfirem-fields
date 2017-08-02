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
if ( !defined( 'ABSPATH' ) ) {
    die;
}
class date_time_field extends gfirem_field_base
{
    public  $version = '1.0.0' ;
    public function __construct()
    {
        parent::__construct(
            'date_time_field',
            gfirem_manager::translate( 'DateTimePicker' ),
            array(
            'datetimepicker_format'     => 'Y/m/d H:i',
            'datetimepicker_timepicker' => 'true',
            'datetimepicker_inline'     => 'true',
        ),
            gfirem_manager::translate( 'Show the Date and Time with a DateTimePicker.' ),
            array(),
            gfirem_fs::$professional
        );
    }
    
    protected function set_field_options( $fieldData )
    {
        $fieldData['default_value'] = date( 'Y/m/d' ) . ' ' . date( 'H:i' );
        return $fieldData;
    }
    
    protected function inside_field_options( $field, $display, $values )
    {
    }
    
    /**
     * Add the HTML for the field on the front end
     *
     * @param $field
     * @param $field_name
     *
     */
    protected function field_front_view( $field, $field_name, $html_id )
    {
    }
    
    private function load_script( $print_value = '', $field_id = '' )
    {
    }
    
    /**
     * Set display option for the field
     *
     * @param $display
     *
     * @return mixed
     */
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

}