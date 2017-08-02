<?php

/**
 * @package    WordPress
 * @subpackage Formidable, gfirem
 * @author     GFireM
 * @copyright  2017
 * @link       http://www.gfirem.com
 * @license    http://www.apache.org/licenses/
 *
 */
if ( !defined( 'ABSPATH' ) ) {
    die;
}
class autocomplete_option
{
    private  $view_path ;
    public function __construct( $view_path )
    {
        $this->view_path = $view_path;
    }
    
    /**
     * Display the additional options for the new field
     *
     * @param $field
     * @param $display
     * @param $values
     */
    public function field_field_option_form( $field, $display, $values )
    {
    }
    
    /**
     * Show the dropdown options for the "Get Options/Values From" Field option
     *
     * @since 2.01.0
     *
     * @param array $form_fields
     * @param array $field ($field is not empty on page load)
     */
    private static function show_options_for_get_values_field( $form_fields, $field = array() )
    {
    }
    
    /**
     * Update the field options from the admin area
     *
     * @param $field_options
     * @param $field
     * @param $values
     *
     * @return mixed
     */
    public function update_field_options( $field_options, $field, $values )
    {
        return $field_options;
    }

}