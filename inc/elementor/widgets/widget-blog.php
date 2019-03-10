<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// blog
class amar_Widget_Blog extends Widget_Base {
 
   public function get_name() {
      return 'blog';
   }
 
   public function get_title() {
      return esc_html__( 'Latest Blog', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-posts-carousel';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'blog_section',
         [
            'label' => esc_html__( 'Blog', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'order',
         [
            'label' => __( 'Order', 'amar' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'ASC',
            'options' => [
               'ASC'  => __( 'Ascending', 'amar' ),
               'DESC' => __( 'Descending', 'amar' )
            ],
         ]
      );
      $this->end_controls_section();
   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'ppp', 'basic' );
      ?>

      <div class="container">
         <div class="row justify-content-center">
               <?php
               $blog = new \WP_Query( array( 
                  'post_type' => 'post',
                  'posts_per_page' => 3,
                  'ignore_sticky_posts' => true,
                  'order' => $settings['order'],
               ));
               /* Start the Loop */
               while ( $blog->have_posts() ) : $blog->the_post();
               ?>
               <!-- blog -->
               <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="2.5s">
                  <div class="blog-item-shape">
                     <div class="blog-item-shape-img">
                        <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(),'amar-1280-853'); ?>" alt="<?php the_title() ?>">
                        <span class="date">28 Dec</span>
                     </div>
                     <div class="blog-item-shape-content">
                        <a href="<?php the_permalink() ?>"><h5><?php echo wp_trim_words( get_the_title(), 7, '...' );?></h5></a>
                        <ul class="list-inline">
                           <li class="list-inline-item">
                              Tags: <?php the_tags( ' ', ', ',' ') ?>
                           </li>
                           <li class="list-inline-item float-right">
                              Read: <?php echo amargetPostViews(get_the_ID()); ?>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
               <?php 
               endwhile; 
            wp_reset_postdata();
            ?>
         </div>
      </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Blog );