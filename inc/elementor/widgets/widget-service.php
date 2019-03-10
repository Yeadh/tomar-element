<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
// service item
class amar_Widget_Service extends Widget_Base {
 
   public function get_name() {
      return 'service item';
   }
 
   public function get_title() {
      return esc_html__( 'Service Item', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-facebook-comments';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }
   protected function _register_controls() {
      $this->start_controls_section(
         'service_section',
         [
            'label' => esc_html__( 'Service Item', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );
      $this->add_control(
         'icon',
         [
            'label' => __( 'Icon', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => 'flaticon-pencil-case',    
         ]     
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Design','amar'),
         ]
      );
      $this->add_control(
         'text',
         [
            'label' => __( 'Text', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text in print and website industry are usually use in these section','amar'),
         ]
      );

      $this->add_control(
         'style',
         [
            'label' => __( 'Style', 'amar' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'style-1',
            'options' => [
               'style-1'  => __( 'Style 1', 'amar' ),
               'style-2' => __( 'Style 2', 'amar' ),
               'style-3' => __( 'Style 3', 'amar' )
            ],
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
      $this->add_inline_editing_attributes( 'style', 'basic' );
      ?>
      <?php if ($settings['style']=='style-1'): ?>
         <div class="service-item">
            <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
            <h5><?php echo esc_html($settings['title']); ?></h5>
            <p><?php echo esc_html($settings['text']); ?></p>
         </div>
      <?php elseif($settings['style']=='style-2'): ?>
         <div class="service-item-2">
            <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
            <h5><?php echo esc_html($settings['title']); ?></h5>
            <p><?php echo esc_html($settings['text']); ?></p>
         </div>
      <?php elseif($settings['style']=='style-3'): ?>
         <div class="service-item-3">
            <i class="<?php echo esc_attr($settings['icon']); ?>"></i>
            <h5><?php echo esc_html($settings['title']); ?></h5>
         </div>
      <?php endif ?>

      <?php
   }
 
}
Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Service );