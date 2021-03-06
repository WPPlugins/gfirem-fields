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
class gfirem_manager
{
    private static  $plugin_slug = 'gfirem' ;
    protected static  $version ;
    private static  $tweaks = array() ;
    private  $fields = array() ;
    public static  $fields_loaded = array() ;
    public function __construct()
    {
        self::$version = self::$version = '1.1.3';
        require_once GFIREM_CLASSES_PATH . 'gfirem_log.php';
        new gfirem_log();
        try {
            
            if ( self::is_formidable_active() ) {
                include GFIREM_CLASSES_PATH . 'gfirem_base.php';
                include GFIREM_CLASSES_PATH . 'gfirem_admin.php';
                require_once GFIREM_FIELDS_PATH . 'gfirem_field_base.php';
                $this->fields = apply_filters( 'gfirem_fields_array', array(
                    'user_list' => '',
                    'signature' => '',
                ) );
                self::$fields_loaded['free'] = $this->fields;
                $this->fields = array_merge( $this->fields, array(
                    'select_image'    => '',
                    'switch_button'   => '',
                    'date_time_field' => '',
                    'autocomplete'    => '',
                    'role_list'       => '',
                ) );
                //load all teh fields
                foreach ( $this->fields as $field_key => $field_path ) {
                    $path = GFIREM_FIELDS_PATH . $field_key . DIRECTORY_SEPARATOR . $field_key . '.php';
                    if ( !empty($field_path) ) {
                        $path = $field_path;
                    }
                    
                    if ( file_exists( $path ) ) {
                        require_once $path;
                        new $field_key();
                    }
                
                }
                new gfirem_admin( self::$fields_loaded );
            }
        
        } catch ( Exception $ex ) {
            gfirem_log::log( array(
                'action'         => get_class( $this ),
                'object_type'    => gfirem_manager::get_slug(),
                'object_subtype' => 'loading_dependency',
                'object_name'    => $ex->getMessage(),
            ) );
        }
    }
    
    /**
     * Override Formidable Register action
     *
     * @param $actions
     *
     * @return mixed
     */
    public function override_register_actions( $actions )
    {
        $actions['register'] = 'gfirem_formidable_register_action_override';
        return $actions;
    }
    
    public static function load_plugins_dependency()
    {
        include_once ABSPATH . 'wp-admin/includes/plugin.php';
    }
    
    public static function is_formidable_active()
    {
        self::load_plugins_dependency();
        return is_plugin_active( 'formidable/formidable.php' );
    }
    
    public static function is_formidable_registration_active()
    {
        self::load_plugins_dependency();
        return is_plugin_active( 'formidable-registration/formidable-registration.php' );
    }
    
    /**
     * Get plugins version
     *
     * @return mixed
     */
    public static function get_version()
    {
        return self::$version;
    }
    
    /**
     * Get plugins slug
     *
     * @return string
     */
    public static function get_slug()
    {
        return self::$plugin_slug;
    }
    
    public static function load_field_template( $part )
    {
        $template = locate_template( array( 'templates/' . $part . '.php' ) );
        
        if ( !$template ) {
            return GFIREM_TEMPLATES_PATH . $part . '.php';
        } else {
            return $template;
        }
    
    }
    
    /**
     * Check if a plugins is active it take in count the actual plan to
     *
     * @param $slug
     *
     * @return bool
     */
    public static function is_enabled( $slug )
    {
        $options = get_option( 'gfirem_options' );
        $key = 'enabled_' . $slug;
        $plan = gfirem_fs::get_current_plan();
        $loaded = gfirem_manager::$fields_loaded;
        if ( (!empty($options[$key]) || array_key_exists( $slug, self::$tweaks )) && array_key_exists( $slug, $loaded[$plan] ) ) {
            return true;
        }
        return false;
    }
    
    public static function translate( $str )
    {
        return __( $str, 'gfirem-locale' );
    }
    
    public static function echo_translated( $str )
    {
        _e( $str, 'gfirem-locale' );
    }
    
    public static function esc_echo_translated( $str )
    {
        echo  esc_html( self::translate( $str ) ) ;
    }

}