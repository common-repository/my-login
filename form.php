<?
//form nel front-end

function arml_login_short( $atts ) { 

		if(is_user_logged_in()){
					
					$redirect=get_bloginfo('url');
					
					//crea link logout
					echo '<a href="';
					echo wp_logout_url( $redirect );
					echo '"> Logout ';
					echo wp_get_current_user()->user_login;
					echo '</a>';
			}

		else{		$args = array(
					'echo'           => true,
					'remember'       => true,
					//'redirect'       => ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'],
					'form_id'        => 'loginform',
					'id_username'    => 'user_login',
					'id_password'    => 'user_pass',
					'id_remember'    => 'rememberme',
					'id_submit'      => 'wp-submit',
					'label_username' => 'Username',
					'label_password' =>  'Password',
					'label_remember' => 'Remember Me',
					'label_log_in'   => 'Log In',
					'value_username' => '',
					'value_remember' => false
				);

				//crea il form nel frontend
				wp_login_form($args );
				echo'<a href="';
				echo wp_lostpassword_url(get_permalink()); 
				echo '">Lost Password?</a>';
				
				}
}
?>