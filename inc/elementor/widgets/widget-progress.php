<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class amar_Widget_Progress extends Widget_Base {
 
   public function get_name() {
      return 'progress';
   }
 
   public function get_title() {
      return esc_html__( 'Progress', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-counter-circle';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Progress', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Bootstrap','amar')
         ]
      );

      $this->add_control(
         'percent',
         [
            'label' => __( 'Percent', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '70'
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'percent', 'basic' );
      
      ?>

      <div class="text-center">
        <div class="progress-circle" data-percent="<?php echo $settings['percent']; ?>"></div>
        <h5 class="progress-title" <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h5>
      </div>
      
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Progress );