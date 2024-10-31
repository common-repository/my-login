<?
// Creating the widget 
class arml_login_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'arml_login_widget', 

// Widget name will appear in UI
'LOGIN Widget', 

// Widget description
array( 'description' =>  'Widget to add login/logout' ) 
);
}

//  front-end

public function widget( $args, $instance ) {
$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
	//codice del titolo
echo $args['before_title'] . $title . $args['after_title'];

// Codice dell'html
arml_login_short();
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title =  'Login Widget';
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class arml_login_widget finisce qui

// Register and load the widget
function arml_my_load_widget() {
	register_widget( 'arml_login_widget' );
}
add_action( 'widgets_init', 'arml_my_load_widget' );


?>