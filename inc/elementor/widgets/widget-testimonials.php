<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class amar_Widget_Testimonials extends Widget_Base {
 
   public function get_name() {
      return 'testimonials';
   }
 
   public function get_title() {
      return esc_html__( 'Testimonials', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-testimonial';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Testimonials', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'amar' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'fullwidth',
            'options' => [
               'fullwidth'  => __( 'Full Width', 'amar' ),
               'twocolumn' => __( 'Two Column', 'amar' )
            ],
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'image',
         [
            'label' => __( 'Choose Photo', 'amar' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );
      
      $repeater->add_control(
         'name',
         [
            'label' => __( 'Name', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            
         ]
      );

      $repeater->add_control(
         'designation',
         [
            'label' => __( 'Designation', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $repeater->add_control(
         'testimonial',
         [
            'label' => __( 'Testimonial', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA
         ]
      );

      $this->add_control(
         'testimonial_list',
         [
            'label' => __( 'Testimonial List', 'amar' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => 'testimonial_list',

         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'style', 'basic' );
      $this->add_inline_editing_attributes( 'color', 'basic' );
      $this->add_inline_editing_attributes( 'testimonial_list', 'basic' );
      
      ?>
      <?php if ($settings['style']=='fullwidth'){ ?>
      
      <div class="testimonials">
         <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
         <div class="testimonial-item">
            <p><?php echo esc_html($testimonial_single['testimonial']); ?></p>
            <h4><?php echo esc_html($testimonial_single['name']); ?></h4>
            <span><?php echo esc_html($testimonial_single['designation']); ?></span>
         </div>
         <?php endforeach; ?>
      </div>

   <?php } elseif ($settings['style']=='twocolumn') { ?>
      
      <div class="testimonials-2 row">
         <?php foreach (  $settings['testimonial_list'] as $testimonial_single ): ?>
             <div class="col-md-6">
               <div class="testimonial-item-2">
                  <div class="testi-img">
                     <img src="<?php echo esc_url($testimonial_single['image']['url']); ?>" alt="Logo">
                  </div>
                  <div class="testi-content">
                     <p><?php echo wp_trim_words( $testimonial_single['testimonial'], 15, '...' ); ?></p>
                     <h5><?php echo esc_html($testimonial_single['name']); ?></h5>
                     <span><?php echo esc_html($testimonial_single['designation']); ?></span>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   <?php } 

   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Testimonials );