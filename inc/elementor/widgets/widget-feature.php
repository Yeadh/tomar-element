<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class tomar_Widget_Feature extends Widget_Base {
 
   public function get_name() {
      return 'feature';
   }
 
   public function get_title() {
      return esc_html__( 'Feature', 'tomar' );
   }
 
   public function get_icon() { 
        return 'eicon-bullet-list';
   }
 
   public function get_categories() {
      return [ 'tomar-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Feature', 'tomar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'flaticon-pencil-case',    
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Increase business 3x speed','tomar'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt','tomar'),
         ]
      );
      
      $this->end_controls_section();
   }
   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'icon', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'text', 'basic' );
      ?>

      <div class="feature-item">
           <div class="feature-item-icon">
               <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
           </div>
           <div class="feature-item-content">
               <h5><?php echo esc_html($settings['title']); ?></h5>
                <p><?php echo esc_html($settings['text']); ?></p>
           </div>
       </div>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new tomar_Widget_Feature );