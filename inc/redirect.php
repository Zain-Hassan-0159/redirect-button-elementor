<?php

/**
 * Redirect Button Elementor
 *
 * @package           Redirect Button Elementor
 * @author            Zain Hassan
 *
 */
   


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class redirect_widget_elementore extends \Elementor\Widget_Base {
	
	
	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Redirect Button';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Redirect Button', 'redirect-button' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'el-redirect' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'button', 'redirect', 'custom', 'button redirect' ];
	}

	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Redirect Button', 'redirect-button' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'buttonText',
			[
				'label' => esc_html__( 'Button Title', 'redirect-button' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Send Message', 'redirect-button' ),
				'placeholder' => esc_html__( 'Type your title here', 'redirect-button' ),
			]
		);

		$this->add_control(
			'buttonLinkQues',
			[
				'label' => esc_html__( 'Redirect Link', 'redirect-button' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'redirect-button' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => 'https://your-redirect-link.com',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'redirect_content_typography',
				'selector' => '{{WRAPPER}} .redirect_link_btn',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Button Color', 'redirect-button' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff4605',
				'selectors' => [
					'{{WRAPPER}} .redirect_link_btn' => 'background-color: {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		if ( ! empty( $settings['buttonLinkQues']['url'] ) ) {
			$this->add_link_attributes( 'buttonLinkQues', $settings['buttonLinkQues'] );
		}
		
        ?>
		<style>
			.redirect_link_btn{
				font-size: 17px;
				font-weight: 600;
				line-height: 20px;
				border-radius: 10px 10px 10px 10px;
				padding: 15px 15px 15px 15px;
				background-color: #ff4605;
				border-color: #ff4605;
				color:white;
				display: block;
				text-align: center;
			}
		</style>
        <a class="redirect_link_btn" <?php echo $this->get_render_attribute_string( 'buttonLinkQues' ); ?>><?php echo $settings['buttonText'] ?></a>
		<script>
			document.querySelectorAll(".redirect_link_btn").forEach(btn =>{
				btn.href = btn.href.replace(/\/$/, "") + window.location.pathname; 
			})
		</script>
        <?php
	}


}