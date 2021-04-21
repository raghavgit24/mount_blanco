<?php get_header(); ?>

<section class="banner" id="home">
    <div class="container-fluid">
        <div class="row banner-slider">
            <?php $args = array(
                'post_type' => 'post',
                'category_name' => 'banner',
                'cat' => 3,
                'posts_per_page' => -1
            );
            $query = new wp_query($args);
            ?>
            <?php if ($query->have_posts()) : while($query->have_posts()) : $query->the_post(); ?>
                <div class="slider-item">
                    <?php if(has_post_thumbnail()) {
                        the_post_thumbnail('full'); 
                    } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/banner/banner1.jpg" alt="">
                    <?php } ?>
                    <div class="slider-caption">
                        <div class="caption">
                            <h1><?php the_title(); ?></h1>
                            <?php the_content(); ?>
                            <a href="#packages"><button class="button">EXPLORE MORE</button></a>
                        </div>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="about-us" id="about-us">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
                    <h1><?php echo the_field('main_title'); ?></h1>
                    <h2><?php echo the_field('sub_title'); ?></h2>
                <div class="content">
                    <p><?php echo the_field('content'); ?></p>
                    <?php echo the_field('services'); ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 text-center right">
                <div class="about-image">
                    <?php $image = get_field('image');
                    if( !empty($image) ): ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; else : endif; ?>
        </div>
    </div>
</section>

<section class="featured-packages">
    <div class="container">
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <h1><?php echo the_field('first-section-title'); ?></h1>
        <?php endwhile; else : endif; ?>
        <div class="row himachal-packages-slider">
            <?php echo do_shortcode('[featured_packages_shortcode]'); ?>
        </div>
    </div>
</section>

<section class="packages" id="packages">
    <div class="container">
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <h1><?php echo the_field('second-section-title'); ?></h1>
        <?php endwhile; else : endif; ?>
        <nav>
            <ul class="nav nav-tabs justify-content-center" id="nav-tab" role="tablist">
                <?php $custom_terms = get_terms('package_type', array('exclude' => array(26)));
                $counter = 0;
                $counter1 = 0;
                foreach($custom_terms as $custom_term) { ?>
                <?php 
                if($counter == 0) {
                    $class="active";
                } else {
                    $class = "";
                }
                ?>                
                    <li><a class="nav-link <?php echo $class; ?>" id="nav-<?php echo $counter; ?>-tab" role="tab" aria-selected="true" data-bs-toggle="tab" href="#<?php echo $custom_term->slug; ?>"><?php echo $custom_term->name; ?></a></li>
                <?php $counter++;
                } ?>
            </ul>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <?php foreach($custom_terms as $custom_term) {
                if($counter1 == 0) {
                    $class="active show";
                } else {
                    $class = "";
                }
                $args = array('post_type' => 'packages',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'package_type',
                            'field' => 'slug',
                            'terms' => $custom_term->slug,
                        ),
                    ),
                );
                ?>

                <div role="tabpanel" class="fade tab-pane <?php echo $class; ?>" id="<?php echo $custom_term->slug; ?>" aria-labelledby="nav-<?php echo $counter1; ?>-tab">
                <div class="row">
                    <?php $loop = new WP_Query($args);
                        if ($loop->have_posts()) : 
                            while($loop->have_posts()) : $loop->the_post();
                        ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 text-center">
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
                        <?php
                        endwhile; endif;
                        $counter1++; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<section class="faq" id="faq">
    <div class="container">
        <?php if (have_posts()) : while(have_posts()) : the_post(); ?>
            <h1><?php echo the_field('third-section-title'); ?></h1>
        <?php endwhile; else : endif; ?>
        <div class="content">
            <div class="accordion accordion-flush" id="accordionExample">
            <?php $args = array(
                'post_type' => 'post',
                'category_name' => 'FAQ',
                'cat' => 4,
                'posts_per_page' => -1
            );
            $query = new wp_query($args);
            ?>
            <?php if ($query->have_posts()) : while($query->have_posts()) : $query->the_post();
            $post_id = get_the_ID(); ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?php echo $post_id; ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $post_id; ?>" aria-expanded="true" aria-controls="#collapse-<?php echo $post_id; ?>"><?php the_title(); ?></button>
                    </h2>
                    <div id="collapse-<?php echo $post_id; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $post_id; ?>" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; ?>
        </div>
    </div>
</section>

<section class="contact-us" id="contact">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 left">
                <?php dynamic_sidebar('contact-us-left'); ?>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 right">
                <?php dynamic_sidebar('contact-us-right'); ?>
            </div>
        </div>        
    </div>
</section>

<!-- Modals -->

<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h2>Welcome Back!</h2>
            <p>Just enter the credentials & plan to make Memories.</p>
            <?php echo do_shortcode('[contact-form-7 id="239" title="Login Form"]'); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="SignUpModal" tabindex="-1" aria-labelledby="SignUpModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h2>Welcome to Explore!</h2>
            <p>Just enter the details & plan to make Memories.</p>
            <?php echo do_shortcode('[contact-form-7 id="241" title="Sign Up Form"]'); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="BookingModal" tabindex="-1" aria-labelledby="BookingModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h2>Just One Step Away of Enjoyment!</h2>
            <p>Just book the package & get yourself ready to explore.</p>
            <?php echo do_shortcode('[contact-form-7 id="242" title="Booking Form"]'); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="ContactModal" tabindex="-1" aria-labelledby="ContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <h2>Request a Call Back</h2>
            <p>Set a call at your convenience, so you don’t have to wait in a queue.</p>
            <?php echo do_shortcode('[contact-form-7 id="230" title="Contact Form"]'); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>