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
class dynamic extends gfirem_field_base
{
    public function __construct()
    {
        parent::__construct(
            'dynamic',
            __( 'Dynamic Field', 'gfirem-locale' ),
            array(
            'dynamic_field_target'       => '',
            'dynamic_field_target_value' => '',
        ),
            __( 'New options to tweak your dynamic fields', 'gfirem-locale' ),
            array(
            'name' => 'Dynamic Field Tweaks',
            'view' => array( $this, 'global_tab' ),
        ),
            gfirem_fs::$professional,
            true
        );
    }
    
    public function global_tab()
    {
        add_settings_field(
            'section_dynamic',
            __( 'Filter Entries', 'gfirem-locale' ),
            array( $this, 'filter_entries' ),
            'dynamic',
            'section_dynamic'
        );
    }
    
    public function filter_entries()
    {
        echo  '<p ' . $this->disable_class_tag( 'p', gfirem_fs::$professional ) . '>' ;
        $this->get_view_for(
            'enabled_' . $this->slug . '_filter_entries',
            'checkbox',
            'dynamic',
            array(),
            gfirem_fs::$starter
        );
        _e( 'If tick this you get a new options inside the dynamic field to filter the entries.', 'gfirem-locale' );
        echo  '</p>' ;
    }

}