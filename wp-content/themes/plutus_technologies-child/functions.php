<?php
/* Child theme generated with WPS Child Theme Generator */

if (!function_exists('b7ectg_theme_enqueue_styles')) {
    add_action('wp_enqueue_scripts', 'b7ectg_theme_enqueue_styles');

    function b7ectg_theme_enqueue_styles()
    {
        wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
        wp_enqueue_style('child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
    }
}

add_filter('simple_register_option_pages', 'misha_option_page');

/**require_once('RationalOptionPages.php');
$pages = array(
    'sample-page'    => array(
        'page_title'    => __('Sample Page', 'sample-domain'),
        'sections'        => array(
            'section-one'    => array(
                'title'            => __('Standard Inputs', 'sample-domain'),
                'fields'        => array(
                    'footer'        => array(
                        'title'            => __('Footer text', 'sample-domain'),
                        'text'            => __('Text attributes are used as help text for most input types.'),
                    ),
                    'tel'            => array(
                        'title'            => __('Telephone', 'sample-domain'),
                        'type'            => 'tel',
                        'placeholder'    => '(555) 555-5555',
                    ),
                ),
            ),
            'section-two'    => array(
                'title'            => __('Non-standard Input', 'sample-domain'),
                'fields'        => array(
                    'color'            => array(
                        'title'            => __('Color', 'sample-domain'),
                        'type'            => 'color',
                        'value'            => '#cc0000',
                    ),
                    'MainLogo'            => array(
                        'title'            => __('Main Logo', 'sample-domain'),
                        'type'            => 'media',
                        'value'            => '',
                    ),
                    'StickyLogo'            => array(
                        'title'            => __('Sticky Logo', 'sample-domain'),
                        'type'            => 'media',
                        'value'            => '',
                    ),
                    'Favicon'            => array(
                        'title'            => __('Favicon', 'sample-domain'),
                        'type'            => 'media',
                        'value'            => '',
                    ),
                ),
            ),
        ),
    ),
);
$option_page = new RationalOptionPages($pages);*/

//Create theme option menu on admin-panel
function add_theme_menu_item()
{
    add_menu_page("Theme Option", "Theme Option", "manage_options", "theme-option", "theme_settings_page", null, 99);
}
add_action("admin_menu", "add_theme_menu_item");

//Create section & submit button on setting page
function theme_settings_page()
{
?>
    <div class="wrap">
        <h1>Theme Option</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields("section");
            do_settings_sections("theme-options");
            submit_button();
            ?>
        </form>
    </div>
<?php
}

//Display main-logo & wordpress image uploader
function main_logo_display()
{
    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
?>
    <input class="main_logo_url" type="text" name="main_logo" size="60" value="<?php echo get_option('main_logo'); ?>">
    <a href="#" class="main_logo_upload">Upload</a>

    <script>
        jQuery(document).ready(function($) {
            $('.main_logo_upload').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                        title: 'Custom Image',
                        button: {
                            text: 'Upload Image'
                        },
                        multiple: false // Set this to true to allow multiple files to be selected
                    })
                    .on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('.main_logo').attr('src', attachment.url);
                        $('.main_logo_url').val(attachment.url);

                    })
                    .open();
            });
        });
    </script>
<?php }

//Display sticky-logo & wordpress image uploader
function sticky_logo_display()
{
    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
?>
    <input class="sticky_logo_url" type="text" name="sticky_logo" size="60" value="<?php echo get_option('sticky_logo'); ?>">
    <a href="#" class="sticky_logo_upload">Upload</a>

    <script>
        jQuery(document).ready(function($) {
            $('.sticky_logo_upload').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                        title: 'Custom Image',
                        button: {
                            text: 'Upload Image'
                        },
                        multiple: false // Set this to true to allow multiple files to be selected
                    })
                    .on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('.sticky_logo').attr('src', attachment.url);
                        $('.sticky_logo_url').val(attachment.url);

                    })
                    .open();
            });
        });
    </script>
<?php }

//Display favicon & wordpress image uploader
function favicon_display()
{
    if (function_exists('wp_enqueue_media')) {
        wp_enqueue_media();
    } else {
        wp_enqueue_style('thickbox');
        wp_enqueue_script('media-upload');
        wp_enqueue_script('thickbox');
    }
?>
    <input class="favicon_url" type="text" name="favicon" size="60" value="<?php echo get_option('favicon'); ?>">
    <a href="#" class="favicon_upload">Upload</a>

    <script>
        jQuery(document).ready(function($) {
            $('.favicon_upload').click(function(e) {
                e.preventDefault();
                var custom_uploader = wp.media({
                        title: 'Custom Image',
                        button: {
                            text: 'Upload Image'
                        },
                        multiple: false // Set this to true to allow multiple files to be selected
                    })
                    .on('select', function() {
                        var attachment = custom_uploader.state().get('selection').first().toJSON();
                        $('.favicon').attr('src', attachment.url);
                        $('.favicon_url').val(attachment.url);
                    })
                    .open();
            });
        });
    </script>
<?php }

//Display footer-copyrights
function display_footer_copyright()
{
?>
    <input type="text" name="footer_copyright" id="footer_copyright" value="<?php echo get_option('footer_copyright'); ?>" />
<?php
}

//Store main-logo in database
function handle_mainlogo_upload()
{
    $urls = $_POST['main_logo'];
    $attachment_id = attachment_url_to_postid($urls);
    return $attachment_id;
}

//Store sticky-logo in database
function handle_stickylogo_upload()
{
    $urls = $_POST['sticky_logo'];
    $attachment_id = attachment_url_to_postid($urls);
    return $attachment_id;
}

//Store favicon in database
function handle_favicon_upload()
{
    $urls = $_POST['favicon'];
    $attachment_id = attachment_url_to_postid($urls);
    return $attachment_id;
}

//To display HTML code & automatic saving the value of fields
function display_theme_panel_fields()
{
    add_settings_section("section", "All Settings", null, "theme-options");

    add_settings_field("main_logo", "Main Logo", "main_logo_display", "theme-options", "section");
    register_setting("section", "main_logo", "handle_mainlogo_upload");

    add_settings_field("sticky_logo", "Sticky Logo", "sticky_logo_display", "theme-options", "section");
    register_setting("section", "sticky_logo", "handle_stickylogo_upload");

    add_settings_field("favicon", "Favicon", "favicon_display", "theme-options", "section");
    register_setting("section", "favicon", "handle_favicon_upload");

    add_settings_field("footer_copyright", "Footer Copyright", "display_footer_copyright", "theme-options", "section");
    register_setting("section", "footer_copyright");
}
add_action("admin_init", "display_theme_panel_fields");


//Classic Widgets
add_filter('use_widgets_block_editor', '__return_false');

function information_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Area One', 'plutus_technologies'),
            'id'            => 'footer-1',
            'description'   => esc_html__('Add widgets here.', 'plutus_technologies'),
            'before_widget' => '<section id="footer-one" class="footer-one">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title footer-one">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Area Two', 'plutus_technologies'),
            'id'            => 'footer-2',
            'description'   => esc_html__('Add widgets here.', 'plutus_technologies'),
            'before_widget' => '<section id=footer-two" class="footer-two">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title footer-two">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Area Three', 'plutus_technologies'),
            'id'            => 'footer-3',
            'description'   => esc_html__('Add widgets here.', 'plutus_technologies'),
            'before_widget' => '<section id="footer-three" class="footer-three">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title footer-three">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer Area Four', 'plutus_technologies'),
            'id'            => 'footer-4',
            'description'   => esc_html__('Add widgets here.', 'plutus_technologies'),
            'before_widget' => '<section id="footer-four" class="footer-four">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title footer-four">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'information_widgets_init');
