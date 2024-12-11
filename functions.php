<?php

/**
 * marcinpohl functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package marcinpohl
 */




add_filter('wpcf7_autop_or_not', '__return_false');


add_action('wp_ajax_get_post_details', 'get_post_details');
add_action('wp_ajax_nopriv_get_post_details', 'get_post_details');

function get_post_details()
{
    // Sprawdź, czy jest podany post_id
    if (isset($_POST['post_id'])) {
        $post_id = intval($_POST['post_id']);
        $post = get_post($post_id);

        if ($post) {
            // Przygotuj dane do zwrócenia
            $response = array(
                'title' => $post->post_title,
                'content' => apply_filters('the_content', $post->post_content),
                'image' => get_the_post_thumbnail_url($post_id),
            );

            // Zwróć dane w formacie JSON
            wp_send_json_success($response);
        } else {
            wp_send_json_error('Post not found.');
        }
    }
    wp_die(); // kończy proces
}

function custom_pagination()
{
    global $wp_query;

    // Sprawdź, czy jest więcej niż jedna strona
    if ($wp_query->max_num_pages <= 1) return;

    $big = 999999999; // Potrzeba unikalnej liczby

    // Generowanie linków paginacji
    $pagination_links = paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'type'      => 'array',
        'prev_text' => '<i class="far fa-arrow-left me-2"></i>Poprzednia',
        'next_text' => 'Następna<i class="far fa-arrow-right ms-2"></i>',
    ));

    if (is_array($pagination_links)) {
        echo '<ul class="pagination">';

        // Poprzednia strona
        if (get_previous_posts_link()) {
            echo '<li class="prev-page">' . get_previous_posts_link('<i class="far fa-arrow-left me-2"></i>Poprzednia') . '</li>';
        }

        // Numery stron
        foreach ($pagination_links as $link) {
            // Sprawdź, czy link jest aktualny
            if (strpos($link, 'current') !== false) {
                // Zamień klasę na 'active' i usuń niepotrzebne elementy
                $link = str_replace('page-numbers current', 'active', $link);
                $link = preg_replace('/<a.*?>/', '', $link); // Usuń <a> tag
                $link = str_replace('</a>', '', $link); // Usuń </a> tag
                echo '<li class="' . esc_attr('active') . '">' . wp_kses_post($link) . '</li>';
            } else {
                echo '<li>' . $link . '</li>';
            }
        }

        // Następna strona
        if (get_next_posts_link()) {
            echo '<li class="next-page">' . get_next_posts_link('Następna<i class="far fa-arrow-right ms-2"></i>') . '</li>';
        }

        echo '</ul>';
    }
}




if (function_exists('acf_add_options_page')) {

    $option_page = acf_add_options_page(array(
        'page_title'    => __('Konfiguracja'),
        'menu_title'    => __('Konfiguracja'),
        'menu_slug'     => 'ustawiania-szablonu',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

    $option_page = acf_add_options_page(array(
        'page_title'    => __('Opinie'),
        'menu_title'    => __('Opinie'),
        'menu_slug'     => 'opinie',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

function remove_archive_title_prefix($title)
{
    if (is_tax() || is_category()) {
        $title = single_cat_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'remove_archive_title_prefix');

function create_custom_post_type()
{
    $labels = array(
        'name'               => 'Cechy Regionu', // Plural name
        'singular_name'      => 'Cechy Regionu', // Singular name
        'menu_name'          => 'Cechy Regionu', // Menu name
        'name_admin_bar'     => 'Cechy Regionu', // Admin bar name
        'add_new'            => 'Dodaj Nowy', // Add new item
        'add_new_item'       => 'Dodaj Nową Cechę Regionu', // Add new item
        'new_item'           => 'Nowa Cecha Regionu', // New item
        'edit_item'          => 'Edytuj Cecha Regionu', // Edit item
        'view_item'          => 'Zobacz Cecha Regionu', // View item
        'all_items'          => 'Wszystkie Cechy Regionu', // All items
        'search_items'       => 'Szukaj Cech Regionu', // Search items
        'not_found'          => 'Nie znaleziono Cech Regionu', // Not found
        'not_found_in_trash' => 'Nie znaleziono w koszu', // Not found in trash
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false, // Ustawienie na false, aby posty były niepubliczne
        'show_ui'            => true, // Pokazuje interfejs użytkownika w panelu administracyjnym
        'show_in_menu'       => true,
        'menu_icon'          => 'dashicons-admin-home', // Ikona menu (możesz zmienić na inną)
        'has_archive'        => false, // Wyłączenie archiwum
        'exclude_from_search' => true, // Wyłączenie z wyszukiwania
        'supports'           => array('title', 'editor', 'thumbnail'), // Włączenie wsparcia dla tytułu i edytora treści
    );

    register_post_type('region_features', $args); // Rejestracja typu postu jako "region_features"
}

add_action('init', 'create_custom_post_type');


function register_region_features_taxonomy()
{
    $labels = array(
        'name'              => _x('Kategorie cech regionów', 'taxonomy general name'),
        'singular_name'     => _x('Kategoria cech regionu', 'taxonomy singular name'),
        'search_items'      => __('Szukaj kategorii cech regionu'),
        'all_items'         => __('Wszystkie kategorie cech regionu'),
        'parent_item'       => __('Kategoria nadrzędna cech regionu'),
        'parent_item_colon' => __('Kategoria nadrzędna cech regionu:'),
        'edit_item'         => __('Edytuj kategorię cech regionu'),
        'update_item'       => __('Aktualizuj kategorię cech regionu'),
        'add_new_item'      => __('Dodaj nową kategorię cech regionu'),
        'new_item_name'     => __('Nazwa nowej kategorii cech regionu'),
        'menu_name'         => __('Kategorie cech regionów'),
    );

    $args = array(
        'labels'            => $labels,
        'hierarchical'      => true, // Jeśli chcesz mieć hierarchię jak w przypadku kategorii
        'public'            => false, // Taksonomia będzie niepubliczna
        'show_ui'           => true, // Pokaż interfejs w panelu administracyjnym
        'show_in_menu'      => true, // Pokaż w menu
        'show_in_nav_menus' => false, // Nie pokazuj w menu nawigacyjnym
        'show_tagcloud'     => false, // Nie pokazuj chmury tagów
        'show_in_rest'      => false, // Nie pokazuj w API REST
    );

    register_taxonomy('region_features_cat', array('region_features'), $args);
}
add_action('init', 'register_region_features_taxonomy');


function register_my_menus()
{
    register_nav_menus(
        array(
            'menu1' => __('Główna nawigacja'),
            'menu2' => __('Dodatkowa nawigacja'),
            'menu3' => __('Stopka')
        )
    );
}
add_action('init', 'register_my_menus');

add_image_size('galeria', 1000, 600, array('center', 'center'));
add_image_size('galeria1', 526, 384, array('center', 'center'));
add_image_size('wyroznik', 200, 250, array('center', 'center'));
add_image_size('single', 1296, 555, array('center', 'center'));


function bgImage()
{
    // URL do domyślnego obrazu
    $default_image_url = get_home_url() . '/wp-content/uploads/2024/10/trees-water-sky-sea-outdoor-sand.jpg';

    // Sprawdzenie, czy to jest strona archiwum lub wyników wyszukiwania
    if (is_archive() || is_search()) {
        return $default_image_url;
    }

    // Sprawdzenie, czy post ma przypisaną miniaturę
    if (has_post_thumbnail()) {
        return get_the_post_thumbnail_url(null, 'full');
    } else {
        // Jeśli nie ma miniatury, zwróć domyślny obraz
        return $default_image_url;
    }
}


function get_post_thumbnail_or_default($post_id)
{
    if (has_post_thumbnail($post_id)) {
        $thumbnail_url = get_the_post_thumbnail_url($post_id, 'thumbnail');
    } else {
        $thumbnail_url = get_field('obraz_podstawowy', 'option');
    }
    return $thumbnail_url;
}




function allow_iframes_in_acf($value, $post_id, $field)
{
    // Zastosuj filtr, aby zwrócić iframe bez usuwania HTML
    if (is_string($value)) {
        $value = wp_kses($value, array(
            'iframe' => array(
                'src'             => array(),
                'width'           => array(),
                'height'          => array(),
                'frameborder'     => array(),
                'allowfullscreen' => array(),
                'loading'         => array()
            ),
            'a' => array(
                'href' => array(),
                'target' => array()
            ),
            'p' => array(),
            'br' => array(),
            'strong' => array(),
            'em' => array(),
        ));
    }
    return $value;
}
add_filter('acf/format_value/type=wysiwyg', 'allow_iframes_in_acf', 10, 3);

// Register Custom Post Type Nieruchomości
function create_nieruchomosci_cpt()
{

    $labels = array(
        'name' => _x('Nieruchomości', 'Post Type General Name', 'textdomain'),
        'singular_name' => _x('Nieruchomości', 'Post Type Singular Name', 'textdomain'),
        'menu_name' => _x('Nieruchomości', 'Admin Menu text', 'textdomain'),
        'name_admin_bar' => _x('Nieruchomości', 'Add New on Toolbar', 'textdomain'),
        'archives' => __('Nieruchomości Archives', 'textdomain'),
        'attributes' => __('Nieruchomości Attributes', 'textdomain'),
        'parent_item_colon' => __('Parent Nieruchomości:', 'textdomain'),
        'all_items' => __('All Nieruchomości', 'textdomain'),
        'add_new_item' => __('Add New Nieruchomości', 'textdomain'),
        'add_new' => __('Add New', 'textdomain'),
        'new_item' => __('New Nieruchomości', 'textdomain'),
        'edit_item' => __('Edit Nieruchomości', 'textdomain'),
        'update_item' => __('Update Nieruchomości', 'textdomain'),
        'view_item' => __('View Nieruchomości', 'textdomain'),
        'view_items' => __('View Nieruchomości', 'textdomain'),
        'search_items' => __('Search Nieruchomości', 'textdomain'),
        'not_found' => __('Not found', 'textdomain'),
        'not_found_in_trash' => __('Not found in Trash', 'textdomain'),
        'featured_image' => __('Featured Image', 'textdomain'),
        'set_featured_image' => __('Set featured image', 'textdomain'),
        'remove_featured_image' => __('Remove featured image', 'textdomain'),
        'use_featured_image' => __('Use as featured image', 'textdomain'),
        'insert_into_item' => __('Insert into Nieruchomości', 'textdomain'),
        'uploaded_to_this_item' => __('Uploaded to this Nieruchomości', 'textdomain'),
        'items_list' => __('Nieruchomości list', 'textdomain'),
        'items_list_navigation' => __('Nieruchomości list navigation', 'textdomain'),
        'filter_items_list' => __('Filter Nieruchomości list', 'textdomain'),
    );
    $args = array(
        'label' => __('Nieruchomości', 'textdomain'),
        'description' => __('', 'textdomain'),
        'labels' => $labels,
        'menu_icon' => '',
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'page-attributes', 'post-formats'),
        'taxonomies' => array('kategorie-nieruchomosci'), // Poprawiona literówka tutaj
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'show_in_rest' => true,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'rewrite' => array(
            'slug' => 'nieruchomosci', // Ustawienie slug na poprawny URL
            'with_front' => false,
        ),
    );
    register_post_type('nieruchomosci', $args); // Poprawiona literówka tutaj
}
add_action('init', 'create_nieruchomosci_cpt', 0);

// Register Custom Taxonomy
function property_cat()
{

    $labels = array(
        'name'                       => _x('Kategorie nieruchomości', 'Taxonomy General Name', 'marcinpohl'),
        'singular_name'              => _x('Kategorie nieruchomości', 'Taxonomy Singular Name', 'marcinpohl'),
        'menu_name'                  => __('Kategorie nieruchomości', 'marcinpohl'),
        'all_items'                  => __('All Items', 'marcinpohl'),
        'parent_item'                => __('Parent Item', 'marcinpohl'),
        'parent_item_colon'          => __('Parent Item:', 'marcinpohl'),
        'new_item_name'              => __('Dodaj', 'marcinpohl'),
        'add_new_item'               => __('Add New Item', 'marcinpohl'),
        'edit_item'                  => __('Edit Item', 'marcinpohl'),
        'update_item'                => __('Update Item', 'marcinpohl'),
        'view_item'                  => __('View Item', 'marcinpohl'),
        'separate_items_with_commas' => __('Separate items with commas', 'marcinpohl'),
        'add_or_remove_items'        => __('Add or remove items', 'marcinpohl'),
        'choose_from_most_used'      => __('Choose from the most used', 'marcinpohl'),
        'popular_items'              => __('Popular Items', 'marcinpohl'),
        'search_items'               => __('Search Items', 'marcinpohl'),
        'not_found'                  => __('Not Found', 'marcinpohl'),
        'no_terms'                   => __('No items', 'marcinpohl'),
        'items_list'                 => __('Items list', 'marcinpohl'),
        'items_list_navigation'      => __('Items list navigation', 'marcinpohl'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('property_cat', array('nieruchomosci'), $args);
}
add_action('init', 'property_cat', 0);


if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('marcinpohl_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function marcinpohl_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on marcinpohl, use a find and replace
		 * to change 'marcinpohl' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('marcinpohl', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
        add_theme_support('title-tag');

        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'marcinpohl'),
            )
        );

        /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'marcinpohl_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'marcinpohl_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function marcinpohl_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('marcinpohl_content_width', 640);
}
add_action('after_setup_theme', 'marcinpohl_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function marcinpohl_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'marcinpohl'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'marcinpohl'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'marcinpohl_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function marcinpohl_scripts()
{
    wp_enqueue_style('marcinpohl-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_style_add_data('marcinpohl-style', 'rtl', 'replace');

    wp_enqueue_script('marcinpohl-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

    wp_enqueue_script('marcinpohl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'marcinpohl_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
