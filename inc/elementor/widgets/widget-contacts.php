<?php 
namespace Elementor;
 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

// contacts
class amar_Widget_Contacts extends Widget_Base {
 
   public function get_name() {
      return 'contacts';
   }
 
   public function get_title() {
      return esc_html__( 'Contacts', 'amar' );
   }
 
   public function get_icon() { 
        return 'eicon-mail';
   }
 
   public function get_categories() {
      return [ 'amar-elements' ];
   }

   protected function _register_controls() {

      $this->start_controls_section(
         'contacts_section',
         [
            'label' => esc_html__( 'contacts Section', 'amar' ),
            'type' => Controls_Manager::SECTION,
         ]
      );

      $repeater1 = new \Elementor\Repeater();

      $repeater1->add_control(
         'contact_icon', [
            'label' => __( 'Contact Icon', 'amar' ),
            'type' => \Elementor\Controls_Manager::MEDIA
         ]
      );
      $repeater1->add_control(
         'contact_title', [
            'label' => __( 'Contact Title', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );
      $repeater1->add_control(
         'contact', [
            'label' => __( 'Contact', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->add_control(
         'contacts_list',
         [
            'label' => __( 'Contacts List', 'amar' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater1->get_controls(),
            'title_field' => 'contacts_list',
         ]
      );

      $repeater = new \Elementor\Repeater();

      $repeater->add_control(
         'social', [
            'label' => __( 'Social', 'amar' ),
            'type' => \Elementor\Controls_Manager::ICON
         ]
      );


      $repeater->add_control(
         'social_url',
         [
            'label' => __( 'Social URL', 'amar' ),
            'type' => \Elementor\Controls_Manager::TEXT
         ]
      );

      $this->add_control(
         'social_list',
         [
            'label' => __( 'Social List', 'amar' ),
            'type' => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'title_field' => 'social_list',
         ]
      );

      $this->end_controls_section();

   }

   protected function render( $instance = [] ) {
 
      // get our input from the widget settings.
       
      $settings = $this->get_settings_for_display();
      
      //Inline Editing
      $this->add_inline_editing_attributes( 'contacts_list', 'basic' );
      $this->add_inline_editing_attributes( 'social_list', 'basic' );
      ?>
      <div class="contacts"> 
         <?php foreach (  $settings['contacts_list'] as $contacts ) { ?>
            <div class="contact-item">
               <img class="float-left" src="<?php echo esc_url( $contacts['contact_icon']['url'] ); ?>" alt="Icon">
               <h5><?php echo esc_attr( $contacts['contact_title'] ); ?></h5>
               <p><?php echo esc_attr( $contacts['contact'] ); ?></p>
            </div>
         <?php } ?>

         <ul>
            <li class="list-inline-item">
               <?php echo esc_html__( "Social media :" , 'amar' ); ?>
            </li>
         <?php foreach (  $settings['social_list'] as $social ) { ?>
            <li class="list-inline-item">
               <a href="<?php echo esc_url( $social['social_url'] ); ?>"><i class="fa <?php echo esc_attr( $social['social'] ); ?>"></i></a>
            </li>
         <?php } ?>
         </ul>
      </div>
      <?php
   }
 
}

Plugin::instance()->widgets_manager->register_widget_type( new amar_Widget_Contacts );