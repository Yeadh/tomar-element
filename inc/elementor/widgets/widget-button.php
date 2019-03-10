<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Button
class amar_Widget_Button extends Widget_Base {
 
   public function get_name() {
      return 'button';
   }
 
   public function get_title() {
      return esc_html__( 'Button', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-button';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'button_section',
         [
            'label' => esc_html__( 'Button', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'button_text', [
            'label' => __( 'Button Text', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','amar')
         ]
      );

      $this->add_control(
         'button_url', [
            'label' => __( 'Button URL', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#'
         ]
      );

      $this->add_control(
         'color',
         [
            'label' => __( 'Alternate Color', 'amar' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'amar' ),
            'label_off' => __( 'Off', 'amar' ),
            'return_value' => 'yes',
            'default' => 'no',
   
         ]
      );

      $this->add_control(
         'align',
         [
            'label' => __( 'Align', 'amar' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'solid',
            'options' => [
               'center'  => __( 'Center', 'amar' ),
               'left' => __( 'Left', 'amar' ),
               'right' => __( 'Right', 'amar' )
            ],
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      
      $this->add_inline_editing_attributes( 'button_text', 'basic' );
      $this->add_inline_editing_attributes( 'button_url', 'basic' );
      $this->add_inline_editing_attributes( 'align', 'basic' );
      $this->add_inline_editing_attributes( 'color', 'basic' );
      ?>

      <div class="amar-btn <?php if( $settings['color'] == 'yes' ){ echo 'alt-color';} ?>" style="text-align: <?php echo esc_attr($settings['align']) ?>">
         <a class="amar-btn" href="<?php echo esc_url( $settings['button_url'] ); ?>">
            <?php echo esc_html( $settings['button_text'] ); ?></a>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Button );