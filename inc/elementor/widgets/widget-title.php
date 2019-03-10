<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Title
class tomar_Widget_Title extends Widget_Base {
 
   public function get_name() {
      return 'title';
   }
 
   public function get_title() {
      return esc_html__( 'Title', 'tomar' );
   }
 
   public function get_icon() { 
        return 'eicon-site-title';
   }
 
   public function get_categories() {
      return [ 'tomar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'title_section',
         [
            'label' => esc_html__( 'Title', 'tomar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'align',
         [
            'label' => __( 'Align', 'tomar' ),
            'type' => \Elementor\Controls_Manager::SELECT,
            'default' => 'left',
            'options' => [
               'center'  => __( 'Center', 'tomar' ),
               'left' => __( 'Left', 'tomar' ),
               'right' => __( 'Right', 'tomar' )
            ],
         ]
      );
      

      $this->add_control(
         'sub-title',
         [
            'label' => __( 'Sub Title', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Works','tomar')
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Latest portfolio','tomar')
         ]
      );

      $this->add_control(
         'border',
         [
            'label' => __( 'Border Bottom', 'tomar' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'tomar' ),
            'label_off' => __( 'Off', 'tomar' ),
            'return_value' => 'yes',
            'default' => 'no',
   
         ]
      );

      $this->add_control(
         'white-color',
         [
            'label' => __( 'Enable if Background is Colored', 'tomar' ),
            'type' => \Elementor\Controls_Manager::SWITCHER,
            'label_on' => __( 'On', 'tomar' ),
            'label_off' => __( 'Off', 'tomar' ),
            'return_value' => 'yes',
            'default' => 'no',
   
         ]
      );
      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'align', 'basic' );
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'sub-title', 'basic' );
      $this->add_inline_editing_attributes( 'white-color', 'basic' );
      $this->add_inline_editing_attributes( 'border', 'basic' );
      
      ?>
      <div class="section-title <?php if('yes' === $settings['white-color']){echo 'white';}else{echo 'color';} ?>" style="text-align: <?php echo esc_attr($settings['align']); ?>">
           <span <?php echo $this->get_render_attribute_string( 'sub-title' ); ?>><?php echo esc_html($settings['sub-title']); ?></span>
           <h1 <?php echo $this->get_render_attribute_string( 'title' ); ?>><?php echo $settings['title']; ?></h1>

           <?php if('yes' === $settings['border']){?>
              <?php if('yes' === $settings['white-color']){?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/dot-white.png" alt="img">
              <?php }else{?>
                  <img src="<?php echo get_template_directory_uri(); ?>/img/dot-bluecolor.png" alt="img">
              <?php } ?>
           <?php } ?>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new tomar_Widget_Title );