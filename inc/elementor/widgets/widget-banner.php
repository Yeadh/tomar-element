<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// Banner
class tomar_Widget_Banner extends Widget_Base {
 
   public function get_name() {
      return 'banner';
   }
 
   public function get_title() {
      return esc_html__( 'Banner', 'tomar' );
   }
 
   public function get_icon() { 
        return 'eicon-banner';
   }
 
   public function get_categories() {
      return [ 'tomar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'banner_section',
         [
            'label' => esc_html__( 'Banner', 'tomar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $this->add_control(
         'title',
         [
            'label' => __( 'Title', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Make present for future ready','tomar')
         ]
      );

      $this->add_control(
         'description',
         [
            'label' => __( 'Description', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXTAREA,
            'default' => __('Lorem ipsum dummy text are usually use. Replace your text','tomar')
         ]
      );
      
      $this->add_control(
         'image',
         [
            'label' => __( 'Choose a image', 'tomar' ),
            'type' => \Elementor\Controls_Manager::MEDIA,
            'default' => [
               'url' => \Elementor\Utils::get_placeholder_image_src(),
            ],
         ]
      );

      $button = new \Elementor\Repeater();

      $button->add_control(
         'btn_text', [
            'label' => __( 'Text', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => __('Learn More','tomar')
         ]
      );

      $button->add_control(
         'btn_url', [
            'label' => __( 'URL', 'tomar' ),
            'type' => \Elementor\Controls_Manager::TEXT,
            'default' => '#',
         ]
      );

      $this->add_control(
         'button_list',
         [
            'label' => __( 'Buttons', 'tomar' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $button->get_controls(),
            'default' => [
               [
                  'btn_text' => 'Contact Us',
                  'btn_url' => '#',                  
               ],
               [
                  'btn_text' => 'Learn more ',
                  'btn_url' => '#',
               ]
            ],
            'feature' => '{{{ button_list }}}',
         ]
      );

      
      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'title', 'basic' );
      $this->add_inline_editing_attributes( 'description', 'basic' );
      ?>

      <section id="banner" class="banner">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="bnr-social">
                    <h1><?php echo esc_html($settings['title']); ?></h1>
                    <p><?php echo esc_html($settings['description']); ?></p>

                    <div class="bnr-btn">
                        <ul class="list-inline">
                           <?php foreach (  $settings['button_list'] as $key => $button_item ) { ?>
                             <li class="list-inline-item"><a href="<?php echo esc_url( $button_item['btn_url'] ); ?>"><?php echo esc_attr( $button_item['btn_text'] ); ?></a></li>
                           <?php } ?>
                        </ul>
                    </div>
                    <div class="bnr-left-sape">
                        <img src="<?php echo get_template_directory_uri() ?>/img/side-shape-left.png" alt="shape">
                    </div>
                </div>
            </div>
        </div>

   </section>

      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new tomar_Widget_Banner );