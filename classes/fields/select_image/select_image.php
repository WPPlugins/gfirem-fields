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
class select_image extends gfirem_field_base
{
    public  $version = '2.0.0' ;
    private  $load_script = false ;
    private  $base_url ;
    private  $upload_file_tab_string ;
    private  $upload_image_tab_string ;
    public function __construct()
    {
        parent::__construct(
            'select_image',
            gfirem_manager::translate( 'Select Image' ),
            array(
            'library_title'        => gfirem_manager::translate( 'Choose Image' ),
            'library_button_title' => gfirem_manager::translate( 'Choose Image' ),
            'button_title'         => gfirem_manager::translate( 'Select Image' ),
            'button_css'           => '',
            'activate_zoom'        => 'true',
            'scroll_zoom'          => 'false',
        ),
            gfirem_manager::translate( 'Show a field to select image from WP Media library.' ),
            array(
            'name' => 'Select Image Tweaks',
            'view' => array( $this, 'global_tab' ),
        ),
            gfirem_fs::$starter
        );
        $this->base_url = plugin_dir_url( __FILE__ ) . 'assets/';
    }
    
    public function global_tab()
    {
    }
    
    /**
     * Options inside the form
     *
     * @param $field
     * @param $display
     * @param $values
     */
    protected function inside_field_options( $field, $display, $values )
    {
    }
    
    /**
     * Load the scripts when needed in front or backend
     *
     * @param string $hook
     * @param string $image_url
     */
    public function add_script( $hook = '', $image_url = '' )
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
    
    /**
     * Return html of image with micro size 50px
     *
     * @param $src
     *
     * @return string
     */
    private function getMicroImage( $src )
    {
        $result = '';
        return $result;
    }
    
    /**
     * Value to show in the admin table
     *
     * @param $value
     * @param $field
     * @param $attr
     *
     * @return string
     */
    protected function field_admin_view( $value, $field, $attr )
    {
        return $value;
    }
    
    /**
     * Process shortcode for view.
     *
     * @param $replace_with
     * @param $tag
     * @param $attr
     * @param $field
     *
     * @return string
     */
    protected function process_short_code(
        $replace_with,
        $tag,
        $attr,
        $field
    )
    {
        return $replace_with;
    }
    
    /**
     * Set the url for the signature to use the email notification
     *
     * @param $value
     * @param $meta
     * @param $entry
     *
     * @return false|string
     */
    public function replace_value_in_mail( $value, $meta, $entry )
    {
        return $value;
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
        $display['unique'] = true;
        $display['required'] = true;
        $display['read_only'] = true;
        $display['description'] = true;
        $display['options'] = true;
        $display['label_position'] = true;
        $display['css'] = true;
        $display['conf_field'] = false;
        $display['invalid'] = true;
        $display['default_value'] = false;
        $display['visibility'] = true;
        $display['size'] = false;
        return $display;
    }

}