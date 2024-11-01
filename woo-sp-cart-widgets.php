<?php
/*widget*/

function woo_sp_cart_widgets_init() {   
    register_sidebar( array(
        'name'          => esc_html__('WooCommerce Floating Cart', 'woo_sp_cart_lite'),
        'id'            => 'woo_sp_cart_widget',
        'description'   => esc_html__('Add widgets here.', 'woo_sp_cart_lite'),
        'before_title'  => '',
        'after_title'   => '',
        'before_widget' => '',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'woo_sp_cart_widgets_init' );

class woo_sp_cart_button_widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'woo_sp_cart_button_widget', 
            'WooCommerce Floating Cart',
            array('description' => 'Displays floating cart button on your site')
        );
    }

    function widget( $args, $instance ) {

        $woo_sp_cart_btn_bg_spcolor = apply_filters('widget_text', $instance['woo_sp_cart_btn_bg_spcolor']);
        $woo_sp_cart_btn_icon_spcolor = apply_filters('widget_text', $instance['woo_sp_cart_btn_icon_spcolor']);
        $woo_sp_cart_btn_position = apply_filters('widget_text', $instance['woo_sp_cart_btn_position']);
        $woo_sp_cart_btn_animation = apply_filters('widget_text', $instance['woo_sp_cart_btn_animation']);
        
        //animation
        $woo_sp_cart_btn_animation_class = woo_sp_cart_get_animation_class($woo_sp_cart_btn_animation);

        //position
        if($woo_sp_cart_btn_position == 'top left') $woo_sp_cart_btn_position_class = 'woo_sp_cart_tl';
        if($woo_sp_cart_btn_position == 'top right') $woo_sp_cart_btn_position_class = 'woo_sp_cart_tr';
        if($woo_sp_cart_btn_position == 'bottom left') $woo_sp_cart_btn_position_class = 'woo_sp_cart_bl';
        if($woo_sp_cart_btn_position == 'bottom right') $woo_sp_cart_btn_position_class = 'woo_sp_cart_br';
        
        echo $args['before_widget'];

        global $woocommerce;
        $woo_sp_cart_url = $woocommerce->cart->get_cart_url();

		echo '<a href="'.esc_url($woo_sp_cart_url).'" class="woo_sp_cart_btn woo_sp_cart_round_button '.$woo_sp_cart_btn_animation_class.' '.$woo_sp_cart_btn_position_class .'" style="background: '.$woo_sp_cart_btn_bg_spcolor.'"><i class="fas fa-shopping-basket woo_sp_cart_icon" style="color: '.$woo_sp_cart_btn_icon_spcolor.'"></i><span class="woo_sp_cart_count" style="border-color: '.$woo_sp_cart_btn_bg_spcolor.'; color: '.$woo_sp_cart_btn_bg_spcolor.'">'.WC()->cart->get_cart_contents_count().'</span></a>';

        echo $args['after_widget'];
    }

    function form( $instance ) {
        $woo_sp_cart_btn_bg_spcolor = @ $instance['woo_sp_cart_btn_bg_spcolor'] ?: '#96588a';
        $woo_sp_cart_btn_icon_spcolor = @ $instance['woo_sp_cart_btn_icon_spcolor'] ?: '#ffffff';
        $woo_sp_cart_btn_position = @ $instance['woo_sp_cart_btn_position'] ?: 'bottom right';
        $woo_sp_cart_btn_animation = @ $instance['woo_sp_cart_btn_animation'] ?: 'tada';       
        ?>

        <p><label for="<?php echo $this->get_field_id('woo_sp_cart_btn_bg_spcolor'); ?>"><?php echo __('Cart Color', 'woo_sp_cart'); ?>:</label></br>
        <input type="text" class="spcolor woo_sp_cart_btn_bg_spcolor" id="<?php echo $this->get_field_id('woo_sp_cart_btn_bg_spcolor'); ?>" name="<?php echo $this->get_field_name('woo_sp_cart_btn_bg_spcolor'); ?>" value="<?php echo $woo_sp_cart_btn_bg_spcolor ?>">
        </p>
        <p><label for="<?php echo $this->get_field_id('woo_sp_cart_btn_icon_spcolor'); ?>"><?php echo __('Icon color', 'woo_sp_cart'); ?>:</label></br>
        <input type="text" class="spcolor" id="<?php echo $this->get_field_id('woo_sp_cart_btn_icon_spcolor'); ?>" name="<?php echo $this->get_field_name('woo_sp_cart_btn_icon_spcolor'); ?>" value="<?php echo $woo_sp_cart_btn_icon_spcolor ?>">
    	</p>

        <p>
            <label for="<?php echo $this->get_field_id('woo_sp_cart_btn_animation'); ?>"><?php echo __('Cart animation', 'woo_sp_cart'); ?>:</label> 
            <select class="widefat" id="<?php echo $this->get_field_id('woo_sp_cart_btn_animation'); ?>" name="<?php echo $this->get_field_name('woo_sp_cart_btn_animation'); ?>">
                <option value="<?php echo $woo_sp_cart_btn_animation;?>"><?php echo $woo_sp_cart_btn_animation;?></option>
                <option disabled>---</option>
                <option value="none"><?php echo __('none', 'woo_sp_cart_lite'); ?></option>
                <option value="rotate"><?php echo __('rotate', 'woo_sp_cart_lite'); ?></option>
                <option value="tada"><?php echo __('tada', 'woo_sp_cart_lite'); ?></option>
                <option value="swing"><?php echo __('swing', 'woo_sp_cart_lite'); ?></option>
                <option value="grow"><?php echo __('grow', 'woo_sp_cart_lite'); ?></option>
                <option value="shrink"><?php echo __('shrink', 'woo_sp_cart_lite'); ?></option>
                <option value="buzz"><?php echo __('buzz', 'woo_sp_cart_lite'); ?></option>
                <option value="forward"><?php echo __('forward', 'woo_sp_cart_lite'); ?></option>
                <option value="backward"><?php echo __('backward', 'woo_sp_cart_lite'); ?></option>
            </select>
        </p>
		<p>
			<label for="<?php echo $this->get_field_id('woo_sp_cart_btn_position'); ?>"><?php echo __('Cart position', 'woo_sp_cart_lite'); ?>:</label> 
			<select class="widefat" id="<?php echo $this->get_field_id('woo_sp_cart_btn_position'); ?>" name="<?php echo $this->get_field_name('woo_sp_cart_btn_position'); ?>">
				<option value="<?php echo $woo_sp_cart_btn_position;?>"><?php echo $woo_sp_cart_btn_position;?></option>
				<option disabled>---</option>
				<option value="top left"><?php echo __('top left', 'woo_sp_cart_lite'); ?></option>
                <option value="top right"><?php echo __('top right', 'woo_sp_cart_lite'); ?></option>
                <option value="bottom left"><?php echo __('bottom left', 'woo_sp_cart_lite'); ?></option>
                <option value="bottom right"><?php echo __('bottom right', 'woo_sp_cart_lite'); ?></option>
			</select>
		</p>
        <?php 
    }

    function update($new_instance, $old_instance) {
        $instance = array();

        $instance['woo_sp_cart_btn_bg_spcolor'] = ( ! empty( $new_instance['woo_sp_cart_btn_bg_spcolor'] ) ) ? $new_instance['woo_sp_cart_btn_bg_spcolor'] : '';
        $instance['woo_sp_cart_btn_icon_spcolor'] = ( ! empty( $new_instance['woo_sp_cart_btn_icon_spcolor'] ) ) ? $new_instance['woo_sp_cart_btn_icon_spcolor'] : '';
        $instance['woo_sp_cart_btn_position'] = ( ! empty( $new_instance['woo_sp_cart_btn_position'] ) ) ? $new_instance['woo_sp_cart_btn_position'] : '';
        $instance['woo_sp_cart_btn_animation'] = ( ! empty( $new_instance['woo_sp_cart_btn_animation'] ) ) ? $new_instance['woo_sp_cart_btn_animation'] : '';
       
        return $instance;
    }

}

function register_woo_sp_cart_button_widget() {
    register_widget('woo_sp_cart_button_widget');
}

add_action('widgets_init', 'register_woo_sp_cart_button_widget');

function woo_sp_cart_widget_area(){
    echo '<div class="woo_sp_cart_widget_area">';
    dynamic_sidebar('woo_sp_cart_widget');
    echo '</div>';
}

add_action('wp_footer', 'woo_sp_cart_widget_area');

?>