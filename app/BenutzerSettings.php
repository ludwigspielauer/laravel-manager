<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BenutzerSettings extends Model
{
	protected $table = 'benutzer_settings';
	
	protected $fillable = [
			'projekt_id', 
			
			'multiuser', 'multiuser_comment',
			
			'register_admin', 'register_self',
			'secure_mailcheck', 'register_confirmmail', 
			'register_notification_mail', 'register_admin_dashboard',
			
			'forget_password', 'change_password_admin', 
			
			'change_email_self', 'change_password_self', 'change_sonstige_self', 'change_sonstige_self_text',
			
			'login_email', 'login_name', 'login_sonstige', 'login_sonstige_test',
			
			'secure_max_login', 'secure_max_lockout_sec', 'secure_ip',
			
			'facebook', 'google', 'twitter', 'github', 'soundcloud', 'steam', 'pinterest', 'pinterest', 'vimeo', 'lastfm', 'yahoo', 
			'vkontakte', 'spotify', 'linkedin', 'stumbleupon', 'tumblr', 'social_sonstige', 'social_sonstige_text',
			
	];
	


	
	
}

