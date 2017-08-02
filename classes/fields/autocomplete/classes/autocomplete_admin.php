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
class autocomplete_admin
{
    public static  $type = 'autocomplete' ;
    private  $base_url ;
    public function __construct( $base_url )
    {
    }
    
    /**
     * Include styles
     */
    public function front_enqueue_style()
    {
    }
    
    /**
     * Include script
     */
    public function enqueue_js()
    {
    }
    
    public function get_autocomplete_suggestions()
    {
    }
    
    private function print_result( $result )
    {
        $str = json_encode( $result );
        echo  "{$str}" ;
        wp_die();
    }
    
    private function get_result(
        $field_id,
        $search,
        $target_field_type,
        $field_filter = false,
        $group = false,
        $start_field,
        $limit = -1
    )
    {
        $suggestions = array();
        return $suggestions;
    }
    
    private function exist_in_array( $array, $search )
    {
        $result = false;
        foreach ( $array as $key => $value ) {
            if ( $value['value'] == $search ) {
                return true;
            }
        }
        return $result;
    }
    
    /**
     * Fill option for field drop down in field options
     *
     * @param $form_fields
     * @param array $field
     */
    public static function show_options_for_get_values_field( $form_fields, $field = array() )
    {
    }
    
    public static function get_args_for_get_options_from_setting( $field )
    {
        $lookup_args = array();
        // Get all forms for the -select form- option
        $lookup_args['form_list'] = FrmForm::get_published_forms();
        
        if ( isset( $field['fac_get_values_form'] ) && is_numeric( $field['fac_get_values_form'] ) ) {
            $lookup_args['form_fields'] = FrmField::get_all_for_form( $field['fac_get_values_form'] );
        } else {
            $lookup_args['form_fields'] = array();
        }
        
        return $lookup_args;
    }
    
    private static function get_fields_for_get_values_field_dropdown( $form_id, $field_type )
    {
        
        if ( in_array( $field_type, array( 'lookup', 'text', 'hidden' ) ) ) {
            $form_fields = FrmField::get_all_for_form( $form_id );
        } else {
            $where = array(
                'fi.form_id' => $form_id,
                'type'       => $field_type,
            );
            $form_fields = FrmField::getAll( $where );
        }
        
        return $form_fields;
    }
    
    public function get_autocomplete_line()
    {
    }
    
    public function get_autocomplete_row()
    {
    }
    
    public static function get_lookup_fields_for_watch_row( $field )
    {
        $lookup_fields = false;
        return $lookup_fields;
    }
    
    private static function get_limited_lookup_fields_in_form( $parent_form_id, $current_form_id )
    {
        $lookup_fields = false;
        return $lookup_fields;
    }
    
    /**
     * Get all field targeting to itself
     *
     * @param $field
     *
     * @return array
     */
    public static function get_dependant_fields( $field )
    {
        $result = array();
        return $result;
    }
    
    private static function maybe_initialize_frm_vars_lookup_fields_for_id( $field_id, &$frm_vars )
    {
        if ( !isset( $frm_vars[$field_id] ) ) {
            $frm_vars[$field_id] = array(
                'dependents' => array(),
            );
        }
    }

}