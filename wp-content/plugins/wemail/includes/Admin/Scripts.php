<?php
namespace WeDevs\WeMail\Admin;

use WeDevs\WeMail\Traits\Hooker;

class Scripts {

    use Hooker;

    /**
     * Holds the $version param value for enqueue scripts/styles
     *
     * @since 1.0.0
     *
     * @var string
     */
    public $version;

    /**
     * Class constructor
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function __construct() {
        $this->version = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? time() : WEMAIL_VERSION;

        $this->add_action( 'wemail_admin_enqueue_styles', 'enqueue_styles' );
        $this->add_action( 'wemail_admin_enqueue_scripts', 'enqueue_scripts' );

        $this->add_action('enqueue_block_editor_assets', 'enqueue_gutenberg_block_scripts');
        $this->add_action('enqueue_block_editor_assets', 'enqueue_gutenberg_block_style');
    }

    /**
     * Enqueue admin styles
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function enqueue_styles() {
        wp_register_style( 'wemail-jquery-ui', wemail()->wemail_cdn . '/vendor/jquery-ui/jquery-ui.min.css', [], $this->version );
        wp_register_style( 'wemail-timepicker', wemail()->wemail_cdn . '/vendor/jquery-timepicker/jquery.timepicker.min.css', [], $this->version );
        wp_register_style( 'wemail-tiny-mce', site_url( '/wp-includes/css/editor.css' ), [], $this->version );

        $dependencies = [
            'wemail-jquery-ui',
            'wemail-timepicker',
            'wemail-tiny-mce',
        ];

        wp_enqueue_style( 'wemail', wemail()->wemail_cdn . '/css/wemail.css', $dependencies, $this->version );
    }

    /**
     * Enqueue admin js
     *
     * @since 1.0.0
     *
     * @return void
     */
    public function enqueue_scripts() {
        wp_enqueue_media();

        wp_register_script( 'wemail-tiny-mce', site_url( '/wp-includes/js/tinymce/tinymce.min.js' ), [] );
        wp_register_script( 'wemail-tiny-mce-code', wemail()->wemail_cdn . '/vendor/tinymce/plugins/code/plugin.min.js', [ 'wemail-tiny-mce' ], $this->version, true );
        wp_register_script( 'wemail-tiny-mce-hr', wemail()->wemail_cdn . '/vendor/tinymce/plugins/hr/plugin.min.js', [ 'wemail-tiny-mce-code' ], $this->version, true );

        wp_register_script( 'wemail-moment', wemail()->wemail_cdn . '/vendor/moment/moment.min.js', [], $this->version, true );
        wp_register_script( 'wemail-moment-timezone', wemail()->wemail_cdn . '/vendor/moment/moment-timezone-with-data-2012-2022.min.js', ['wemail-moment'], $this->version, true );

        wp_register_script( 'wemail-timepicker', wemail()->wemail_cdn . '/vendor/jquery-timepicker/jquery.timepicker.min.js', ['jquery'], $this->version, true );
        wp_register_script( 'wemail-popper-js', wemail()->wemail_cdn . '/vendor/popper.js/popper.min.js', [], $this->version, true );
        wp_register_script( 'wemail-bootstrap', wemail()->wemail_cdn . '/js/bootstrap.js', ['jquery', 'wemail-popper-js'], $this->version, true );

        $dependencies = [
            'jquery',
            'jquery-ui-datepicker',
            'jquery-ui-sortable',
            'jquery-ui-draggable',
            'wemail-tiny-mce',
            'wemail-tiny-mce-code',
            'wemail-tiny-mce-hr',
            'wemail-moment',
            'wemail-moment-timezone',
            'wemail-timepicker',
            'wemail-popper-js',
            'wemail-bootstrap',
        ];

        wp_enqueue_script( 'wemail-vendor', wemail()->wemail_cdn . '/js/vendor.js', $dependencies, $this->version, true );
        wp_enqueue_script( 'wemail', wemail()->wemail_cdn . '/js/wemail.js', ['wemail-vendor'], $this->version, true );

        $user = wemail()->user;

        $dateFormat = get_option( 'date_format', 'Y-m-d' );
        $timeFormat = get_option( 'time_format', 'g:i a' );

        $dateFormat = trim( $dateFormat );
        $timeFormat = trim( $timeFormat );

        $wemail = [
            'version'              => wemail()->version,
            'siteURL'              => site_url( '/' ),
            'homeURL'              => home_url( '/' ),
            'restURL'              => untrailingslashit( get_rest_url( null, '/wemail/v1') ),
            'wpRestURL'            => untrailingslashit( get_rest_url( null, '/wp/v2' ) ),
            'nonce'                => wp_create_nonce( 'wp_rest' ),
            'wemailSiteURL'        => wemail()->wemail_site,
            'api'                  => wemail()->api->get_props(),
            'cdn'                  => wemail()->wemail_cdn,
            'app'                  => wemail()->wemail_app,
            'dateTime'             => [
                'server'           => [
                    'timezone'     => wemail_get_wp_timezone(),
                    'date'         => current_time( 'Y-m-d' ),
                    'time'         => current_time( 'H:i:s' ),
                    'dateFormat'   => $dateFormat ? $dateFormat : 'Y-m-d',
                    'timeFormat'   => $timeFormat ? $timeFormat : 'g:i a',
                    'startOfWeek'  => get_option( 'start_of_week', 0 ),
                ],
                'toMoment'         => '',
                'momentDateFormat' => '',
                'momentTimeFormat' => '',
            ],

            'user'                 => [
                'hash'             => $user->hash,
                'role'             => $user->role,
                'permissions'      => $user->permissions,
            ],

            // Vue related data
            'customizerIframe'      => WEMAIL_URL . '/views/customizer.html',
            'locale_data'           => $this->get_locale_data(),
            'hideAdminNoticesIn'    => [
                'campaignEditDesign'
            ],
            'activeIntegrations'    => $this->active_integrations()
        ];

        wp_localize_script( 'wemail-vendor', 'weMail', $wemail );
    }

    /**
     * Load the translation strings
     *
     * src: https://github.com/WordPress/gutenberg/blob/25a2003c7faac2dcdb723161fefd10ef44d147b6/lib/i18n.php#L12
     *
     * @since 1.0.0
     *
     * @return array
     */
    private function get_locale_data() {
        $domain = wemail()->text_domain;

        $translations = get_translations_for_domain( $domain );

        $locale = [
            'domain'      => $domain,
            'locale_data' => [
                $domain => [
                    '' => [
                        'domain' => $domain,
                        'lang'   => is_admin() ? get_user_locale() : get_locale(),
                    ],
                ],
            ],
        ];

        if ( ! empty( $translations->headers['Plural-Forms'] ) ) {
            $locale['locale_data'][ $domain ]['']['plural_forms'] = $translations->headers['Plural-Forms'];
        }

        foreach ( $translations->entries as $msgid => $entry ) {
            $locale['locale_data'][ $domain ][ $msgid ] = $entry->translations;
        }

        return $locale;
    }

    /**
     * Acvtive integration reference
     *
     * @since 1.0.0
     *
     * @return array
     */
    private function active_integrations() {
        return [
            'erp_crm'  => is_erp_crm_active(),
            'mailpoet' => class_exists('MailPoet\Listing\Handler') || class_exists('WYSIJA'),
        ];
    }

    /**
     * Add gutenberg weMail block scripts
     */
    public function enqueue_gutenberg_block_scripts() {
        $forms = wemail()->form->items();

        wp_enqueue_script('wemail-gutenberg-block', WEMAIL_ASSETS. '/js/main.js');

        wp_localize_script('wemail-gutenberg-block', 'weMailData', array(
            'forms' => $forms ? $forms : []
        ));
    }

    public function enqueue_gutenberg_block_style() {
        wp_enqueue_style('wemail-gutenberg-block', WEMAIL_ASSETS . '/css/gutenberg.css');
    }

}
