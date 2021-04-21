<?php
// Loading Stylesheets
function load_css() {
        wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), false, 'all');
        wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick/slick.css', array(), false, 'all');
        wp_enqueue_style('slick_theme', get_template_directory_uri() . '/css/slick/slick-theme.css', array(), false, 'all');
        wp_enqueue_style('font_awesome', get_template_directory_uri() . '/css/all.css', array(), false, 'all');
        wp_enqueue_style('style', get_template_directory_uri() . '/style.css', array(), false, 'all');
        wp_enqueue_style('responsive', get_template_directory_uri() . '/css/responsive.css', array(), false, 'all');
        wp_enqueue_style('font-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800;900&display=swap', false, 'all');
        wp_enqueue_style('font-lato', 'https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&display=swap', false, 'all');
    }
add_action('wp_enqueue_scripts','load_css');

// Update CSS within in Admin
function admin_style() {
    wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/wp-admin.css');
  }
add_action('admin_enqueue_scripts', 'admin_style');

// Loading JavaScript Files
function load_js() {
        wp_enqueue_script('jquery');
        wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap/bootstrap.bundle.min.js', 'jquery', false, true);
        wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick/slick.min.js', 'jquery', false, true);
        wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', 'jquery', false, true);
    }
add_action('wp_enqueue_scripts','load_js');


// Theme Options
add_theme_support('menus');
add_theme_support('custom-logo');
add_theme_support('widgets');
add_theme_support('post-thumbnails');


// Menus
register_nav_menus(
    array(
        'header-menu' => 'Header Menu',
    )
);

// Sidebars
function theme_sidebars()
{
    register_sidebar(
        array(
            'name' => 'Pre-Header Sidebar Left',
            'id' => 'pre-header-left',
			'description'   => __( 'Add widgets here to appear in the left of your pre-header.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
        )
    );
    register_sidebar(
        array(
            'name' => 'Pre-Header Sidebar Right',
            'id' => 'pre-header-right',
            'description'   => __( 'Add widgets here to appear in the right of your pre-header.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
        )
    );
    register_sidebar(
        array(
            'name' => 'Contact-Us Sidebar Left',
            'id' => 'contact-us-left',
            'description'   => __( 'Add widgets here to appear in the left of your contact section.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => ''
        )
    );
    register_sidebar(
        array(
            'name' => 'Contact-Us Sidebar Right',
            'id' => 'contact-us-right',
            'description'   => __( 'Add widgets here to appear in the right of your contact section.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Sidebar About Column',
            'id' => 'footer-about-column',
            'description'   => __( 'Add widgets here to appear in the about column of your footer.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Sidebar Explore Column',
            'id' => 'footer-explore-column',
            'description'   => __( 'Add widgets here to appear in the explore column of your footer.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Sidebar Links Column',
            'id' => 'footer-links-column',
            'description'   => __( 'Add widgets here to appear in the links column of your footer.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Sidebar Connect Follow Us',
            'id' => 'footer-connect-follow-us',
            'description'   => __( 'Add widgets here to appear in the follow-us column of your footer.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
        )
    );
    register_sidebar(
        array(
            'name' => 'Footer Sidebar Connect Get Us',
            'id' => 'footer-connect-get-us',
            'description'   => __( 'Add widgets here to appear in the get-us column of your footer.', '' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h4>',
			'after_title'   => '</h4>'
        )
    );
}

add_action('widgets_init','theme_sidebars');

// Creating Custom Meta Boxes

function add_custom_box() {
    $screens = [ 'post', 'packages', 'wporg_cpt' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'tour-package-info',            // Unique ID
            'Tour Package Info',            // Box title
            'custom_box_html',              // Content callback, must be of type callable
            $screen                         // Post type
        );
    }
}
add_action( 'add_meta_boxes', 'add_custom_box' );

function custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, 'tour_duration', true );
    ?>
    <div>
        <label for="tour-duration">Tour Duration</label>
        <input type="text" value ="<?php echo $value; ?>" id="tour-duration-field" name="tour-duration-field" class="postbox" id="tour-duration" placeholder="Nights & Days"/>
    </div>
    <?php $value = get_post_meta( $post->ID, 'tour_package_cost', true ); ?>
    <div>
        <label for="tour-package-cost">Package Cost</label>
        <input type="text" value ="<?php echo $value; ?>" id="tour-package-cost-field" name="tour-package-cost-field" class="postbox" id="tour-package-cost" placeholder="INR 5999"/>
    </div>
    <?php
}

function wporg_save_postdata( $post_id ) {
    if ( array_key_exists( 'tour-duration-field', $_POST ) ) {
        update_post_meta(
            $post_id,
            'tour_duration',
            $_POST['tour-duration-field']
        );
    }
    if ( array_key_exists( 'tour-package-cost-field', $_POST ) ) {
        update_post_meta(
            $post_id,
            'tour_package_cost',
            $_POST['tour-package-cost-field']
        );
    }
}
add_action( 'save_post', 'wporg_save_postdata' );


// Creating Custom Post Types

function custom_post_type() {

    // Setting UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Packages', '' ),
        'singular_name'       => _x( 'Package', '' ),
        'menu_name'           => __( 'Packages', '' ),
        'all_items'           => __( 'All Packages', '' ),
        'view_item'           => __( 'View Package', '' ),
        'add_new_item'        => __( 'Add New Package', '' ),
        'add_new'             => __( 'Add New', '' ),
        'edit_item'           => __( 'Edit Package', '' ),
        'update_item'         => __( 'Update Package', '' ),
        'search_items'        => __( 'Search Package', '' ),
        'not_found'           => __( 'Not Found', '' ),
        'not_found_in_trash'  => __( 'Not found in Trash', '' ),
    );
         
    // Set other options for Custom Post Type
         
    $args = array(
        'label'               => __( 'packages', '' ),
        'description'         => __( 'Package Details and Reviews', '' ),
        'labels'              => $labels,
        // Features this CPT supports in Post Editor
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        // You can associate this CPT with a taxonomy or custom taxonomy. 
        'taxonomies'          => array( 'genres' ),
        // A hierarchical CPT is like Pages and can have Parent and child items. A non-hierarchical CPT is like Posts.
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
        'show_in_rest' => true,
    
    );

    // Registering Custom Post Type
    register_post_type( 'packages', $args );
}
add_action( 'init', 'custom_post_type');


//Creating a Custom Taxonomy for Custom Post
 
function create_package_type_taxonomy() {
 
    $labels = array(
        'name' => _x( 'Package Type', '' ),
        'singular_name' => _x( 'Package Type', '' ),
        'search_items' =>  __( 'Search Package Type' ),
        'all_items' => __( 'All Package Type' ),
        'parent_item' => __( 'Parent Package Type' ),
        'parent_item_colon' => __( 'Parent Package Type:' ),
        'edit_item' => __( 'Edit Package Type' ), 
        'update_item' => __( 'Update Package Type' ),
        'add_new_item' => __( 'Add New Package Type' ),
        'new_item_name' => __( 'New Package Type Name' ),
        'menu_name' => __( 'Package Type' ),
    );

    $args = array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'package-type' ),
    );
    
    // Registering the Taxonomy
    register_taxonomy('package_type',array('packages'), $args);
}

add_action( 'init', 'create_package_type_taxonomy'); 


// Creating Custom Shortcode

function featured_packages(){
$args = array(
    'post_type' => 'packages',
    'tax_query' => array(
        array(
            'taxonomy' => 'package_type',
            'terms' => 26,
        )
    ),
    'posts_per_page' => -1
);
$query = new wp_query($args);
global $post;
if ($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
    <div class="package-slider-item text-center">
        <div class="content">
            <?php if(has_post_thumbnail()) {
                the_post_thumbnail('full'); 
            } else { ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/packages/himachal-pradesh/shimla.jpg" alt="">
            <?php } ?>
            <div class="individual-package">
                <h6><?php echo get_post_meta( $post->ID, 'tour_duration', true ); ?></h6>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
                <h3 class = 'pb-1'><?php echo get_post_meta( $post->ID, 'tour_package_cost', true ); ?></h3>
                <a href="#BookingModal" data-bs-toggle="modal" data-bs-target="#BookingModal">BOOK NOW</a>
            </div>
        </div>
    </div>            
<?php endwhile; endif; 
}
add_shortcode('featured_packages_shortcode', 'featured_packages'); ?>