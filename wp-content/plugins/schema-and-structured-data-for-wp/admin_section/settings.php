<?php
/**
 * Settings Page
 *
 * @author   Magazine3
 * @category Admin
 * @path     admin_section/settings
 * @version 1.0
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Admin Settings
 * Function saswp_add_menu_links
 *
 */
add_action( 'plugin_action_links_' . plugin_basename( SASWP_DIR_NAME_FILE ), 'saswp_plugin_action_links' );

function saswp_plugin_action_links( $links ) {
        
        $nonce = wp_create_nonce( 'saswp_install_wizard_nonce' );  

        if(is_array($links)){

                $links[] = '<a href="' . esc_url( admin_url( 'edit.php?post_type=saswp&page=structured_data_options' ) ) . '">' . saswp_t_string( 'Settings' ) . '</a>';
                $links[] = '<a href="'.  esc_url( admin_url( 'plugins.php?page=saswp-setup-wizard' ).'&_saswp_nonce='.$nonce).'">' . saswp_t_string( 'Setup Wizard' ) . '</a>';
                $links[] = '<a target="_blank" href="http://structured-data-for-wp.com/docs/">' . saswp_t_string( 'Documentation' ) . '</a>';

        }	

  	return $links;        
}

function saswp_ext_installed_status(){
        
            $mappings_file = SASWP_DIR_NAME . '/core/array-list/pro_extensions.php';
            
            $pro_ext = array();
            
            if ( file_exists( $mappings_file ) ) {
                $pro_ext = include $mappings_file;
            }
            
            $check_active_ext = false;
            
            if(!empty($pro_ext)){
                
                foreach($pro_ext as $ext){
                    
                    if(is_plugin_active($ext['path'])){
                        
                        $check_active_ext = true;                        
                         break;
                    }
                                        
                }
                
            }
            
            return $check_active_ext;
    
}

function saswp_add_menu_links() {	
                       
	    add_submenu_page( 'edit.php?post_type=saswp',
                    saswp_t_string( 'Schema & Structured Data For Wp' ),
                    saswp_t_string( 'Settings' ), 
                    saswp_current_user_can(),
                    'structured_data_options', 
                    'saswp_admin_interface_render'
                    );	
                                
            if(!saswp_ext_installed_status()){
                add_submenu_page( 'edit.php?post_type=saswp', saswp_t_string( 'Schema & Structured Data For Wp' ), '<span class="saswp-upgrade-to-pro" style="color:#fff176;">'.saswp_t_string( 'Upgrade To Premium' ).'</span>', 'manage_options', 'structured_data_premium', 'saswp_premium_interface_render' );	
            }
                                                            
}
add_action( 'admin_menu', 'saswp_add_menu_links' );

function saswp_premium_interface_render(){
    
    wp_redirect( 'https://structured-data-for-wp.com/pricing/' );
    exit;    
        
}
function saswp_admin_interface_render(){
	            
        if ( ! current_user_can( saswp_current_user_can() ) ) {
		return;
        }
    	
	// Handing save settings
	if ( isset( $_GET['settings-updated'] ) ) {							                                                 
		settings_errors();               
	}
        
        $tab = saswp_get_tab('general', apply_filters( 'saswp_extra_settings_tab', array('general', 'amp','review','compatibility','email_schema', 'tools','premium_features', 'services', 'support') ));            
	
	?>
<div class="saswp-settings-container">
        
	<div class="wrap saswp-settings-form saswp-settings-first-div" style="<?php echo( saswp_ext_installed_status()? 'width:100%;':''); ?>">	
        <?php
        if ( class_exists('SASWPPROExtensionManager') ) {
            $license_info = get_option( 'saswppro_license_info');
            if ( defined('SASWPPRO_PLUGIN_DIR') && !empty($license_info) ){
                $saswp_pro_manager = SASWPPRO_PLUGIN_DIR.'inc/saswp-ext-manager-lic-data.php';                
                if( file_exists($saswp_pro_manager) ){
                    require_once $saswp_pro_manager;
                }
            }
        }
        ?>
        <?php
        if ( !class_exists('SASWPPROExtensionManager') ) {
            $license_info = get_option( 'saswppro_license_info');
            if ( !defined('SASWPPRO_PLUGIN_DIR') || empty($license_info) ){
                $saswp_add_on = array();
                if(is_plugin_active('1-click-indexing-api-integration-for-saswp/1-click-indexing-api-integration-for-saswp.php')){
                    $saswp_add_on[] = 'OCIAIFS';
                }
                if(is_plugin_active('cooked-compatibility-for-schema/cooked-compatibility-for-schema.php')){
                    $saswp_add_on[] = 'Cooked';
                }
                if(is_plugin_active('polylang-compatibility-for-saswp/polylang-compatibility-for-saswp.php')){
                    $saswp_add_on[] = 'Polylang';
                }
                if(is_plugin_active('classifieds-plugin-compatibility/classifieds-plugin-compatibility.php')){
                    $saswp_add_on[] = 'CPC';
                }
                if(is_plugin_active('wpml-schema-compatibility/wpml-schema-compatibility.php')){
                    $saswp_add_on[] = 'WPML';
                }
                if(is_plugin_active('jobposting-schema-compatibility/jobposting-schema-compatibility.php')){
                    $saswp_add_on[] = 'Jobposting';
                }
                if(is_plugin_active('woocommerce-compatibility-for-schema/woocommerce-compatibility-for-schema.php')){
                    $saswp_add_on[] = 'Woocommerce';
                }
                if(is_plugin_active('real-estate-schema/real-estate-schema.php')){
                    $saswp_add_on[] = 'Res';
                }
                if(is_plugin_active('course-schema-for-saswp/course-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Cs';
                }
                if(is_plugin_active('qanda-schema-for-saswp/qanda-schema-for-saswp.php')){
                    $saswp_add_on[] = 'qanda';
                }
                if(is_plugin_active('faq-schema-compatibility/faq-schema-compatibility.php')){
                    $saswp_add_on[] = 'faq';
                }
                if(is_plugin_active('event-schema-for-saswp/event-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Es';
                }
                if(is_plugin_active('recipe-schema-for-saswp/recipe-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Rs';
                }
                if(is_plugin_active('reviews-for-schema/reviews-for-schema.php')){
                    $saswp_add_on[] = 'reviews';
                }
                    $expiredLicensedata  = array();
                foreach($saswp_add_on as $addon){

                global $sd_data;
                $license_key        = '';
                $license_status     = 'inactive';
                $license_status_msg = '';
                $license_user_name = '';
                if(isset($sd_data[strtolower($addon).'_addon_license_key'])){
                  $license_key =   $sd_data[strtolower($addon).'_addon_license_key'];
                }
                
                if(isset($sd_data[strtolower($addon).'_addon_license_key_status'])){
                  $license_status =   $sd_data[strtolower($addon).'_addon_license_key_status'];
                }
                if(isset($sd_data[strtolower($addon).'_addon_license_key_message'])){
                  $license_status_msg =   $sd_data[strtolower($addon).'_addon_license_key_message'];
                }
                if (isset($sd_data[strtolower($addon).'_addon_license_key_user_name'])) {                    
                $license_user_name =   $sd_data[strtolower($addon).'_addon_license_key_user_name'];
                }

                if (isset($sd_data[strtolower($addon).'_addon_license_key_download_id'])) {
                $license_download_id =   $sd_data[strtolower($addon).'_addon_license_key_download_id'];
                }

                if (isset($sd_data[strtolower($addon).'_addon_license_key_expires'])) {
                    // $sd_data['woocommerce_addon_license_key_expires'] = -1;
                $license_expires =   $sd_data[strtolower($addon).'_addon_license_key_expires'];
                $expiredLicensedata[strtolower($addon)] = $license_expires < 0 ? 1 : 0 ;
                }
                }
                
                if ( isset( $license_user_name )  && $license_user_name!=="" && isset( $license_expires )   ){
                    if ( !empty( $addon ) && $license_status =='active' ) {

                $renew = "no";
                $license_exp = "";
                $license_k = $license_key;
                $download_id = $license_download_id;
                $days = $license_expires;                
                $one_of_plugin_expired = 0;
                    if ( in_array( 1, $expiredLicensedata ) ){
                            $one_of_plugin_expired = 1;
                        }
                    if ( !in_array( 0, $expiredLicensedata ) ){
                            $one_of_plugin_expired = 0;
                        }   
                $exp_id = '';
                $expire_msg = '';
                $renew_mesg = '';
                $span_class = '';
                $expire_msg_before = '';
                $ZtoS_days = '';
                $refresh_addon = '';
                $refresh_addon_user = '';
                $alert_icon = '';
                $ext_settings_url = 'ext_url';
                $settings_url = esc_url(admin_url('edit.php?post_type=saswp&page=structured_data_options'));
                if ( $days == 'Lifetime' ) {
                    $expire_msg = " ".saswp_t_string('Valid for Lifetime')." ";
                    // $expire_msg = " Active ";
                    $expire_msg_before = '<span class="before_msg_active">'.saswp_t_string('Your License is').'</span>';
                    $span_class = "saswp_addon_icon dashicons dashicons-yes pro_icon saswppro_icon";
                    $color = 'color:green';
                }
                elseif( $days >= 0 && $days <= 7 ){
                    $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_k."&download_id=".$download_id."";
                    $expire_msg_before = '<span class="before_msg">'.saswp_t_string('Your License is').'</span> <span class="saswp-addon-alert">'.saswp_t_string('expiring in').' '.$days.' '.saswp_t_string('days').'</span><a target="blank" class="renewal-license" href="'.$renew_url.'"><span class="renew-lic">'.esc_html__('Renew', 'saswp').'</span></a>';
                    // $span_class = "saswp_addon_icon dashicons dashicons-alert pro_icon";
                    $color = 'color:green';
                    $alert_icon = '<span class="saswp_addon_icon dashicons dashicons-warning pro_warning"></span>';
                }
                elseif( $days>=0 && $days<=30 ){
                    $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_k."&download_id=".$download_id."";
                    $expire_msg_before = '<span class="before_msg">'.saswp_t_string('Your License is').'</span> <span class="saswp-addon-alert">'.saswp_t_string('expiring in').' '.$days.' '.saswp_t_string('days').'</span><a target="blank" class="renewal-license" href="'.$renew_url.'"><span class="renew-lic">'.esc_html__('Renew', 'saswp').'</span></a>';
                    // $span_class = "saswp_addon_icon dashicons dashicons-alert pro_icon";
                    $color = 'color:green';
                    $alert_icon = '<span class="saswp_addon_icon dashicons dashicons-warning pro_warning"></span>';
                }
                elseif($days<0){
                    $ext_settings_url = 'ext_settings_url';
                    $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_k."&download_id=".$download_id."";
                    if ($one_of_plugin_expired == 1) {
                    $expire_msg_before = '<span class="saswp_addon_inactive">'.saswp_t_string('One of your').' <span class="<than_0" style="color:red;">'.saswp_t_string('license key is').'</span></span>';
                    }else{
                        $expire_msg_before = '<span class="saswp_addon_inactive">'.saswp_t_string('Your').' <span class="<than_0" style="color:red;">'.saswp_t_string('License has been').'</span></span>';
                    }
                    $expire_msg = " Expired ";
                    $exp_class = 'expired';
                    $exp_id = 'exp';
                    $exp_class_2 = 'renew_license_key_';
                    $span_class = "saswp_addon_icon dashicons dashicons-no";
                    
                     $renew_mesg = '<a target="blank" class="renewal-license" href="'.$renew_url.'"><span class="renew-lic">'.esc_html__('Renew', 'saswp').'</span></a>';
    $color = 'color:red';
}
                    else{
                        if ($one_of_plugin_expired == 1) {
                        $expire_msg_before = '<span class="before_msg_active">'.saswp_t_string('One of your').' <span class=">than_30" style="color:red;">'.saswp_t_string('license key is').'</span></span>';    
                        }else{
                        $expire_msg_before = '<span class="before_msg_active">'.saswp_t_string('Your License is').'</span>';                        
                        }
                        if ($one_of_plugin_expired == 1) {
                            $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_k."&download_id=".$download_id."";
                        $expire_msg = " <span class='one_of_expired'>".saswp_t_string('Expired')."</span> ";
                        $renew_mesg = '<a target="blank" class="renewal-license" href="'.$renew_url.'"><span class="renew-lic">'.esc_html__('Renew', 'saswp').'</span></a>';
                        }
                        else{
                            $expire_msg = " Active ";
                        }
                        if ($one_of_plugin_expired == 1) {
                        $span_class = "saswp_addon_icon dashicons dashicons-no pro_icon";                        
                        }
                        else{
                            $span_class = "saswp_addon_icon dashicons dashicons-yes pro_icon saswppro_icon";
                        }
                        if ($one_of_plugin_expired == 1) { $color = 'color:red';}
                        else{ $color = 'color:green'; }
                    }
                if($days<0){
                $exp_id = 'exp';
                }
                $saswp_addon_license_info = "<div class='sasfwp-main'>
                <span class='sasfwp-info'>
                ".$alert_icon."<span class='activated-plugins'>".saswp_t_string('Hi')." <span class='sasfwp_key_user_name'>".esc_html($license_user_name)."</span>".','."
                <span id='activated-plugins-days_remaining' days_remaining=".$days."> ".$expire_msg_before." <span expired-days-data=".$days." class='expiredinner_span' id=".$exp_id.">".$expire_msg."</span></span>
                <span class='".$span_class."'></span>".$renew_mesg.$refresh_addon.$refresh_addon_user ;
                $trans_check = get_transient( 'saswp_addons_set_transient' );
            
            $saswp_addon_license_info .= $ZtoS_days."
            </span>
            </div>";
            echo $saswp_addon_license_info;
        }
    }
}
}
?>
		<h1 class="wp-heading-inline"> <?php echo saswp_t_string( 'Schema & Structured Data' ); ?> <a href="<?php echo esc_url( admin_url( 'edit.php?post_type=saswp' ) ); ?>" class="page-title-action"><?php echo saswp_t_string( 'Schema Types' ); ?></a></h1>
		
    <br>		
                <div>
		<h2 class="nav-tab-wrapper saswp-tabs">
                    
			<?php	
            $license_alert = $license_expires = $license_expnormal = '' ;
            $saswp_add_on = array();
                if(is_plugin_active('1-click-indexing-api-integration-for-saswp/1-click-indexing-api-integration-for-saswp.php')){
                    $saswp_add_on[] = 'OCIAIFS';
                }
                if(is_plugin_active('cooked-compatibility-for-schema/cooked-compatibility-for-schema.php')){
                    $saswp_add_on[] = 'Cooked';
                }
                if(is_plugin_active('polylang-compatibility-for-saswp/polylang-compatibility-for-saswp.php')){
                    $saswp_add_on[] = 'Polylang';
                }
                if(is_plugin_active('classifieds-plugin-compatibility/classifieds-plugin-compatibility.php')){
                    $saswp_add_on[] = 'CPC';
                }
                if(is_plugin_active('wpml-schema-compatibility/wpml-schema-compatibility.php')){
                    $saswp_add_on[] = 'WPML';
                }
                if(is_plugin_active('jobposting-schema-compatibility/jobposting-schema-compatibility.php')){
                    $saswp_add_on[] = 'Jobposting';
                }
                if(is_plugin_active('woocommerce-compatibility-for-schema/woocommerce-compatibility-for-schema.php')){
                    $saswp_add_on[] = 'Woocommerce';
                }
                if(is_plugin_active('real-estate-schema/real-estate-schema.php')){
                    $saswp_add_on[] = 'Res';
                }
                if(is_plugin_active('course-schema-for-saswp/course-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Cs';
                }
                if(is_plugin_active('qanda-schema-for-saswp/qanda-schema-for-saswp.php')){
                    $saswp_add_on[] = 'qanda';
                }
                if(is_plugin_active('faq-schema-compatibility/faq-schema-compatibility.php')){
                    $saswp_add_on[] = 'faq';
                }
                if(is_plugin_active('event-schema-for-saswp/event-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Es';
                }
                if(is_plugin_active('recipe-schema-for-saswp/recipe-schema-for-saswp.php')){
                    $saswp_add_on[] = 'Rs';
                }
                if(is_plugin_active('reviews-for-schema/reviews-for-schema.php')){
                    $saswp_add_on[] = 'reviews';
                }

            foreach($saswp_add_on as $addon){
                global $sd_data;
                $license_key        = '';
                $license_status     = 'inactive';
                $license_status_msg = '';
                $license_user_name = '';
                $license_expires = '';
                $license_expnormal = '';
                
                if (isset($sd_data[strtolower($addon).'_addon_license_key_expires'])) {
                $license_expires =   $sd_data[strtolower($addon).'_addon_license_key_expires'];
                }

                if (isset($sd_data[strtolower($addon).'_addon_license_key_expires_normal'])) {
                $license_expnormal =   $sd_data[strtolower($addon).'_addon_license_key_expires_normal'];
                }

    }

        $license_alert = '' ;
        if($license_expires){
            if( $license_expires == 'Lifetime' ){
                $days = 'Lifetime';
            }
        }

        if( $license_expires !== 'Lifetime' ){
        $today = date('Y-m-d');
               $exp_date = $license_expnormal; 
               $date1 = date_create($today);
                $date2 = date_create($exp_date);
                 $diff = date_diff($date1,$date2);
                  $days = $diff->format("%a");
                  if($today > $exp_date ){
                    $days = -$days;
                }
            } 
            if ( function_exists('saswp_cpc_schema_updater') || function_exists('saswp_enqueue_instant_indexing_js') || function_exists('saswp_wpml_schema_compatibility') || function_exists('polylang_compatibility_for_schema_updater') || function_exists('reviews_for_schema_updater') || function_exists('saswp_jobposting_schema_updater') || function_exists('saswp_faq_schema_updater') || function_exists('qanda_schema_updater') || function_exists('saswp_recipe_schema_updater') || function_exists('event_schema_updater') ||function_exists('course_schema_updater') ||function_exists('woocommerce_compatibility_for_schema_updater') ||function_exists('real_estate_schema_updater') ) {

                $license_alert = isset($days) && $days!==0 && $days<=30 && $days!=='Lifetime' ? "<span class='saswp_pro_icon dashicons dashicons-warning saswp_pro_alert'></span>": "" ;
            }

                        $tab_links = apply_filters( 'saswp_extra_settings_tab_link',        
                                array(                                 
                                        '<a href="' . esc_url(saswp_admin_link('general')) . '" class="nav-tab ' . esc_attr( $tab == 'general' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Global') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('amp')) . '" class="nav-tab ' . esc_attr( $tab == 'amp' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('AMP') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('review')) . '" class="nav-tab ' . esc_attr( $tab == 'review' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Review') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('compatibility')) . '" class="nav-tab ' . esc_attr( $tab == 'compatibility' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Compatibility') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('email_schema')) . '" class="nav-tab ' . esc_attr( $tab == 'email_schema' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Email Schema') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('tools')) . '" class="nav-tab ' . esc_attr( $tab == 'tools' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Advanced') . '</a>',                                       
                                        '<a href="'.esc_url( admin_url( 'admin.php?page=structured_data_options&tab=premium_features' ) ).'" data-extmgr="'. ( class_exists('SASWPPROExtensionManager')? "yes": "no" ).'" class="nav-tab ' . esc_attr( $tab == 'premium_features' ? 'nav-tab-active' : '') . '"><span class=""></span> '.$license_alert.'' . saswp_t_string('Premium Features') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('services')) . '" class="nav-tab ' . esc_attr( $tab == 'services' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Services') . '</a>',
                                        '<a href="' . esc_url(saswp_admin_link('support')) . '" class="nav-tab ' . esc_attr( $tab == 'support' ? 'nav-tab-active' : '') . '"><span class=""></span> ' . saswp_t_string('Support') . '</a>',
                                        //'<a target="_blank" href="http://structured-data-for-wp.com/festive-season/" class="nav-tab saswp-offer-banner">50% OFF for LIMITED time</a>'
                                ), $tab);
                                
                                foreach($tab_links as $link){
                                        echo $link;
                                }
			?>
                    
		</h2>
                                                            
                </div>
                
                <form action="<?php echo admin_url("options.php") ?>" method="post" enctype="multipart/form-data" class="saswp-settings-form">		
			<div class="form-wrap saswp-settings-form-wrap">
			<?php
			// Output nonce, action, and option_page fields for a settings page.
			settings_fields( 'sd_data_group' );												
			echo "<div class='saswp-general' ".( $tab != 'general' ? 'style="display:none;"' : '').">";
                        
                        echo '<div id="saswp-global-tabs" style="margin-top: 10px;">';
                        
                        echo '<a data-id="saswp-general-container">'.saswp_t_string('General Settings').'</a> | <a data-id="saswp-knowledge-container">'.saswp_t_string('Knowledge Graph').'</a> | <a data-id="saswp-default-container" >'.saswp_t_string('Default Data').'</a>';
                        
                        echo'</div> ';
                        
				// general Application Settings                        
				do_settings_sections( 'saswp_general_section' );	// Page slug
			echo "</div>";
						                                                
                        echo "<div class='saswp-amp' ".( $tab != 'amp' ? 'style="display:none;"' : '').">";
                        
				do_settings_sections( 'saswp_amp_section' );	// Page slug
			echo "</div>";
                                                                        
                        echo "<div class='saswp-review' ".( $tab != 'review' ? 'style="display:none;"' : '').">";
                        
                            echo '<div id="saswp-review-tabs" style="margin-top: 10px;">';

                            echo '<a data-id="saswp-review-reviews-container">'.saswp_t_string('Reviews Module').'</a> | <a data-id="saswp-review-rating-container">'.saswp_t_string('Rating Module').'</a>';

                            echo'</div> ';
                        
			     // Status                        
			        do_settings_sections( 'saswp_review_section' );	// Page slug
			echo "</div>";
                        
                        echo "<div class='saswp-compatibility' ".( $tab != 'compatibility' ? 'style="display:none;"' : '').">";
			     // Status
                        
                                echo '<div id="saswp-compatibility-tabs" style="margin-top: 10px;">';

                                echo '<a data-id="saswp-active-compatibility-container">'.saswp_t_string('Active').'</a> | <a data-id="saswp-inactive-compatibility-container">'.saswp_t_string('InActive').'</a>';

                                echo'</div> ';
                        
			        do_settings_sections( 'saswp_compatibility_section' );	// Page slug
			echo "</div>";
                        
                        echo "<div class='saswp-email_schema' ".( $tab != 'email_schema' ? 'style="display:none;"' : '').">";
			     // Status                        
			        do_settings_sections( 'saswp_email_schema_section' );	// Page slug
			echo "</div>";
                                                
                        echo "<div class='saswp-tools' ".( $tab != 'tools' ? 'style="display:none;"' : '').">";
                        
                            echo '<div id="saswp-tools-tabs" style="margin-top: 10px;">';

                            echo '<a class="saswp-tools-tab-nav" href="#saswp-advanced-heading">'.saswp_t_string('Advanced').'</a> | <a href="#saswp-translation-heading" class="saswp-tools-tab-nav">'.saswp_t_string('Translation Panel').'</a> | <a class="saswp-tools-tab-nav" href="#saswp-migration-heading">'.saswp_t_string('Migration').'</a> | <a class="saswp-tools-tab-nav" href="#saswp-import-export-heading">'.saswp_t_string('Import / Export').'</a> | <a class="saswp-tools-tab-nav" href="#saswp-misc-heading">'.saswp_t_string('Misc').'</a>';

                            if(saswp_ext_installed_status()){
                                echo ' | <a class="saswp-tools-tab-nav" href="' . esc_url( admin_url( 'admin.php?page=structured_data_options&tab=premium_features' ) ) . '">' . saswp_t_string( 'License' ) . '</a>';
                            }
                            
                            echo'</div> ';
			     // Status
                        
			        do_settings_sections( 'saswp_tools_section' );	// Page slug
			echo "</div>";
                        
                        echo "<div class='saswp-premium_features' ".( $tab != 'premium_features' ? 'style="display:none;"' : '').">";
			     // Status                        
			        do_settings_sections( 'saswp_premium_features_section' );	// Page slug
			echo "</div>";
                        
                        echo "<div class='saswp-services' ".( $tab != 'services' ? 'style="display:none;"' : '').">";
			     // Status                        
			        do_settings_sections( 'saswp_services_section' );	// Page slug
			echo "</div>";
                        
                        echo "<div class='saswp-support' ".( $tab != 'support' ? 'style="display:none;"' : '').">";
			     // Status                        
			        do_settings_sections( 'saswp_support_section' );	// Page slug
			echo "</div>";

                        apply_filters('saswp_extra_settings_tab_div', $tab);

			?>
		</div>
			<div class="button-wrapper">
				<?php
				// Output save settings button
                                submit_button( saswp_t_string('Save Settings') );
				?>
			</div>  
                    <input type="hidden" name="sd_data[sd_initial_wizard_status]" value="1">
		</form>
	</div>
    <div class="saswp-settings-second-div">
<!--        <a target="_blank" href="http://structured-data-for-wp.com/pricing/">
        <div class="saswp-upgrade-pro promo-cpn">
            <h2><?php echo saswp_t_string('50% OFF on PRO') ?></h2>
            <span><?php echo saswp_t_string('Limited Time Offer for this festive season') ?></span>
            <div class="saswp-promo">
                <span class="prm-txt"><?php echo saswp_t_string('Promo:') ?></span>
                <span class="prm-cpn"><?php echo saswp_t_string('BFCM2019') ?></span>
            </div>
        </div>
        </a>-->
        <?php if(!saswp_ext_installed_status()) { ?>
            <div class="saswp-upgrade-pro">
                <h2><?php echo saswp_t_string('Upgrade to Pro!') ?></h2>
                <ul>
                    <li><?php echo saswp_t_string('Premium features') ?></li>
                    <li><?php echo saswp_t_string('Dedicated Schema Support') ?></li>
                    <li><?php echo saswp_t_string('Active Development') ?></li>
                </ul>
                <a target="_blank" href="http://structured-data-for-wp.com/pricing/"><?php echo saswp_t_string('UPGRADE') ?></a>
            </div>
        <?php  } ?>        
    </div>
</div>

	<?php
}
/*
	WP Settings API
*/
add_action('admin_init', 'saswp_settings_init');

function saswp_settings_init(){
    
          	register_setting( 'sd_data_group', 'sd_data', 'saswp_handle_file_upload' );
                add_settings_section('saswp_general_section', __return_false(), '__return_false', 'saswp_general_section');

                add_settings_field(
			'general_settings',								// ID
			'',		// Title
			'saswp_general_page_callback',								// CB
			'saswp_general_section',						// Page slug
			'saswp_general_section'						// Settings Section ID
		);
                                                                 
                add_settings_section('saswp_amp_section', __return_false(), '__return_false', 'saswp_amp_section');
	
		add_settings_field(
			'saswp_amp_settings',								// ID
			'',		// Title
			'saswp_amp_page_callback',								// CB
			'saswp_amp_section',						// Page slug
			'saswp_amp_section'						// Settings Section ID
		); 
                
                
                add_settings_section('saswp_review_section', __return_false(), '__return_false', 'saswp_review_section');

                add_settings_field(
			'saswp_review_settings',								// ID
			'',		// Title
			'saswp_review_page_callback',								// CB
			'saswp_review_section',						// Page slug
			'saswp_review_section'						// Settings Section ID
		);
                
                add_settings_section('saswp_compatibility_section', __return_false(), '__return_false', 'saswp_compatibility_section');

                add_settings_field(
			'saswp_compatibility_settings',								// ID
			'',		// Title
			'saswp_compatibility_page_callback',								// CB
			'saswp_compatibility_section',						// Page slug
			'saswp_compatibility_section'						// Settings Section ID
		);
                
                add_settings_section('saswp_email_schema_section', __return_false(), '__return_false', 'saswp_email_schema_section');

                add_settings_field(
			'saswp_email_schema_settings',								// ID
			'',		// Title
			'saswp_email_schema_callback',								// CB
			'saswp_email_schema_section',						// Page slug
			'saswp_email_schema_section'						// Settings Section ID
		);               
                
                add_settings_section('saswp_support_section', __return_false(), '__return_false', 'saswp_support_section');

                add_settings_field(
			'saswp_support_settings',								// ID
			'',		// Title
			'saswp_support_page_callback',								// CB
			'saswp_support_section',						// Page slug
			'saswp_support_section'						// Settings Section ID
		);
                
                
                add_settings_section('saswp_tools_section', __return_false(), '__return_false', 'saswp_tools_section');
                
                // the meta_key 'diplay_on_homepage' with the meta_value 'true'                    
                    add_settings_field(
                            'saswp_import_status',								// ID
                            '',			// Title
                            'saswp_import_callback',					// Callback
                            'saswp_tools_section',							// Page slug
                            'saswp_tools_section'							// Settings Section ID
                    );
                    
                    add_settings_section('saswp_premium_features_section', __return_false(), '__return_false', 'saswp_premium_features_section');
                
                // the meta_key 'diplay_on_homepage' with the meta_value 'true'                    
                    add_settings_field(
                            'saswp_premium_features_settings',								// ID
                            '',			// Title
                            'saswp_premium_features_callback',					// Callback
                            'saswp_premium_features_section',							// Page slug
                            'saswp_premium_features_section'							// Settings Section ID
                    );
                    
                    add_settings_section('saswp_services_section', __return_false(), '__return_false', 'saswp_services_section');
                
                // the meta_key 'diplay_on_homepage' with the meta_value 'true'                    
                    add_settings_field(
                            'saswp_services_settings',								// ID
                            '',			// Title
                            'saswp_services_callback',					// Callback
                            'saswp_services_section',							// Page slug
                            'saswp_services_section'							// Settings Section ID
                    );
}

/**
 * saswp_inlineAdminOccasionalAdsPopUpCSS_JS Method
 * Prints out inline occasional ads PopUp JS.
 *
 * @access private
 * @static
*/
function saswp_custom_upload_mimes($mimes = array()) {
	
        $mimes['json'] = "application/json";
        $mimes['csv']  =  "text/csv";

	return $mimes;
}

add_action('upload_mimes', 'saswp_custom_upload_mimes');

function saswp_handle_file_upload($option){
    
    if ( ! current_user_can( saswp_current_user_can() ) ) {
		return $option;
    }

   if(isset($_FILES['saswp_import_backup'])){
     
       $fileInfo = wp_check_filetype(basename($_FILES['saswp_import_backup']['name']));
    
        if (!empty($fileInfo['ext']) && $fileInfo['ext'] == 'json') {

            if(!empty($_FILES["saswp_import_backup"]["tmp_name"])){

              $urls = wp_handle_upload($_FILES["saswp_import_backup"], array('test_form' => FALSE));    
              $url = $urls["url"];
              update_option('saswp-file-upload_url',esc_url($url));

           }
        }
       
   }
   
   if(isset($_FILES['saswp_upload_rv_csv'])){
     
        $fileInfo = wp_check_filetype(basename($_FILES['saswp_upload_rv_csv']['name']));
     
         if (!empty($fileInfo['ext']) && $fileInfo['ext'] == 'csv') {
 
             if(!empty($_FILES["saswp_upload_rv_csv"]["tmp_name"])){
 
               $urls = wp_handle_upload($_FILES["saswp_upload_rv_csv"], array('test_form' => FALSE));    
               $url = $urls["url"];
               update_option('saswp_rv_csv_upload_url',esc_url($url));
 
            }
         }
        
  }
   
  return $option;
  
}

function saswp_is_check_plugin($ext_ind,$index){
        
            if(function_exists($ext_ind)){
            global $sd_data;


                $license_key        = '';
                $license_status     = 'inactive';
                $license_status_msg = '';
                $license_user_name = '';
                $license_download_id = '';
                $license_expires     = '';
                $license_expnormal     = '';
                
                if(isset($sd_data[strtolower($index).'_addon_license_key'])){
                  $license_key =   $sd_data[strtolower($index).'_addon_license_key'];
                }
                
                if(isset($sd_data[strtolower($index).'_addon_license_key_status'])){
                  $license_status =   $sd_data[strtolower($index).'_addon_license_key_status'];
                }
                
                if(isset($sd_data[strtolower($index).'_addon_license_key_message'])){
                  $license_status_msg =   $sd_data[strtolower($index).'_addon_license_key_message'];
                }

                if (isset($sd_data[strtolower($index).'_addon_license_key_user_name'])) {                    
                $license_user_name =   $sd_data[strtolower($index).'_addon_license_key_user_name'];
                }                

                if (isset($sd_data[strtolower($index).'_addon_license_key_download_id'])) {
                $license_download_id =   $sd_data[strtolower($index).'_addon_license_key_download_id'];
                }

                if (isset($sd_data[strtolower($index).'_addon_license_key_expires'])) {
                $license_expires =   $sd_data[strtolower($index).'_addon_license_key_expires'];
                }

                if (isset($sd_data[strtolower($index).'_addon_license_key_expires_normal'])) {
                $license_expnormal =   $sd_data[strtolower($index).'_addon_license_key_expires_normal'];
                }
                
                $active_data = saswp_get_license_section_html($index, $license_key, $license_status, $license_status_msg, $license_user_name, $license_download_id,$license_expires, $license_expnormal, true, false);

             return $active_data;
          } 

          return false;
     }

function saswp_premium_features_callback(){ ?>

	<div class="saswp-pre-ftrs-wrap">

		<ul class="saswp-features-blocks">
                                        
                            <?php
                                                            
$main_ext_array = array();

$main_ext_array['CPC'] = array( 'name' => 'Classifieds Plugin Compatibility','desc' => 'Classifieds Plugin Compatibility generated schema markup automatically for classified theme and plugin with just few steps click.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/cpc.png', 'bgcolor' => '#9fa2f5', 'href' => 'https://structured-data-for-wp.com/classifieds-plugin-compatibility/' , 'status' => saswp_is_check_plugin('saswp_cpc_schema_updater','CPC'));

$main_ext_array['OCIAIFS'] = array( 'name' => '1-Click Indexing API Integration','desc' => 'The Indexing API allows any site owner to directly notify Google when pages are added or removed. This allows Google to schedule pages for a fresh crawl, which can lead to higher quality user traffic' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/indexing.png', 'bgcolor' => '#9fa2f5', 'href' => 'https://structured-data-for-wp.com/1-click-indexing-api-integration/' , 'status' => saswp_is_check_plugin('saswp_enqueue_instant_indexing_js','OCIAIFS'));

$main_ext_array['WPML'] = array( 'name' => 'WPML Schema Compatibility
','desc' => 'Get Multi-Currency in schema on Woocommerce Product and set placement based on languages for easy display of schema' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/wpml.png', 'bgcolor' => '#33879e', 'href' => 'https://structured-data-for-wp.com/wpml-schema-compatibility/' , 'status' => saswp_is_check_plugin('saswp_wpml_schema_compatibility','WPML'));

$main_ext_array['Polylang'] = array( 'name' => 'Polylang Schema Compatibility
','desc' => 'It adds all the static labels from this plugin to Polylang Strings Translations dashboard where user can translate it' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/polylang.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/polylang-compatibility-for-saswp' , 'status' => saswp_is_check_plugin('polylang_compatibility_for_schema_updater','Polylang'));

$main_ext_array['reviews'] = array( 'name' => 'Reviews for Schema','desc' => 'Fetch reviews from 75+ platforms with a single click with proper structured data so you can get the stars in your search engine rankings, works for AMP.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/customer-review.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/reviews-for-schema' , 'status' => saswp_is_check_plugin('reviews_for_schema_updater','reviews'));


$main_ext_array['Jobposting'] = array( 'name' => 'JobPosting Schema Compatibility','desc' => 'JobPosting Schema Compatibility extension is the number one solution to enhance your JOBs website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/jobposting.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/jobposting-schema-compatibility/' , 'status' => saswp_is_check_plugin('saswp_jobposting_schema_updater','Jobposting'));

$main_ext_array['faq'] = array( 'name' => 'FAQ Schema Compatibility','desc' => 'FAQ Schema Compatibility extension is the number one solution to enhance your FAQs website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/faq.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/faq-schema-compatibility/' , 'status' => saswp_is_check_plugin('saswp_faq_schema_updater','faq'));

$main_ext_array['qanda'] = array( 'name' => 'Q&A Schema Compatibility','desc' => 'Q&A Schema Compatibility extension is the number one solution to enhance your discussion forum website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/question.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/qanda-schema-for-saswp/' , 'status' => saswp_is_check_plugin('qanda_schema_updater','qanda'));

$main_ext_array['Rs'] = array( 'name' => 'Recipe Schema','desc' => 'Recipe Schema extension is the number one solution to enhance your recipe website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/recipe.png', 'bgcolor' => '#509207', 'href' => 'https://structured-data-for-wp.com/recipe-schema/' , 'status' => saswp_is_check_plugin('saswp_recipe_schema_updater','Rs'));

$main_ext_array['Es'] = array( 'name' => 'Event Schema','desc' => 'Event Schema extension is the number one solution to enhance your event website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/event.png', 'bgcolor' => '#eae4ca', 'href' => 'https://structured-data-for-wp.com/event-schema/' , 'status' => saswp_is_check_plugin('event_schema_updater','Es'));

$main_ext_array['Cs'] = array( 'name' => 'Course Schema','desc' => 'Course Schema extension is the number 1 solution to enhance your course offering website with right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/course.png', 'bgcolor' => '#dcb71d', 'href' => 'https://structured-data-for-wp.com/course-schema/' , 'status' => saswp_is_check_plugin('course_schema_updater','Cs'));

$main_ext_array['woocommerce'] = array( 'name' => 'WooCommerce Compatibility for Schema','desc' => 'WooCommerce Compatibility extension is the number one solution to enhance your store with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/woocommerce-icon.png', 'bgcolor' => '#96588a', 'href' => 'https://structured-data-for-wp.com/extensions/woocommerce-compatibility-for-schema/' , 'status' => saswp_is_check_plugin('woocommerce_compatibility_for_schema_updater','woocommerce'));

$main_ext_array['Res'] = array( 'name' => 'Real Estate Schema','desc' => 'Real Estate Schema extension is the number one solution to enhance your real estate website with the right structured data.' , 'image' => "".SASWP_PLUGIN_URL."".'/admin_section/images/real-estate-schema-wp.png', 'bgcolor' => '#ace', 'href' => 'https://structured-data-for-wp.com/extensions/real-estate-schema/' , 'status' => saswp_is_check_plugin('real_estate_schema_updater','Res'));

$active_plugin_list   = array();
$inactive_plugin_list = array();

foreach($main_ext_array as $value){
        
    $addon_name         = $value['name'];
    $addon_image        = $value['image'];
    $addon_desc         = $value['desc'];
    $addon_bgcolor      = $value['bgcolor'];
    $addon_status       = $value['status'];
    $addon_href         = $value['href'];
    $css                = '';

    if($addon_status == false){
        $addon_status = '<label class="saswp-sts-txt inactive">'. saswp_t_string('Status') .' :<span class="saswp_inactive_key">'.saswp_t_string('Inactive').'</span></label><a target="_blank" href="'.$addon_href.'"><span class="saswp-d-btn">'.saswp_t_string('Download').'</span></a>';
    }    

    $plist =   "<li>
                <div class='saswp-features-ele'>
                <div class='saswp-ele-ic' style='background: ".$addon_bgcolor.";'>
                <img src=".esc_url($addon_image).">
                </div>
                <div class='saswp-ele-tlt'>
                <h3>".saswp_t_string($addon_name)."</h3>
                <p>".saswp_t_string($addon_desc)."</p>
                </div>    
                <div class='saswp-sts-btn' ".$css.">".$addon_status."
                </div>
                </div>
                </li>";

    if($value['status']){
        $active_plugin_list[]   = $plist; 
    }else{
        $inactive_plugin_list[] = $plist;       
    }

}

        if(!empty($active_plugin_list)){
                foreach($active_plugin_list as $value){
                        echo $value;
                }
        }
        if(!empty($inactive_plugin_list)){
                foreach($inactive_plugin_list as $value){
                        echo $value;
                }
        }

?>
</div>
 <?php
    }

function saswp_services_callback(){ ?>
   <div class="saswp-pre-ftrs-wrap">
        <ul class="saswp-features-blocks">
                        <li>
                <div class="saswp-features-ele">
                    <div class="saswp-ele-ic saswp-ele-4" style="background: #69e781;">
                                            <img src="<?php echo SASWP_PLUGIN_URL; ?>/admin_section/images/support-1.png">
                    </div>
                    <div class="saswp-ele-tlt">
                        <h3><?php echo saswp_t_string('Priority Support') ?></h3>
                        <p><?php echo saswp_t_string('We get more than 100 technical queries a day but the Priority support plan will help you skip that and get the help from a dedicated team.') ?></p>
                    </div>
                </div>
                                <a target="_blank" href="https://structured-data-for-wp.com/priority-support//">
                                    <div class="saswp-sts-btn">                 
                    <span class="saswp-d-btn-1"><?php echo saswp_t_string('Try it') ?></span>
                    </div>
                                </a>
                
            </li>
            <li>
                <div class="saswp-features-ele">
                    <div class="saswp-ele-ic saswp-ele-3">
                                            <img src="<?php echo SASWP_PLUGIN_URL; ?>/admin_section/images/news.png">
                    </div>
                    <div class="saswp-ele-tlt">
                        <h3><?php echo saswp_t_string('Google News Schema Setup') ?></h3>
                        <p><?php echo saswp_t_string('Get quick approval to Google News with our service. Our structured data experts will set up the Google News schema properly on your website.') ?></p>
                    </div>
                </div>
                            <a target="_blank" href="http://structured-data-for-wp.com/services/google-news-schema-setup/">
                                <div class="saswp-sts-btn">                 
                    <span class="saswp-d-btn-2"><?php echo saswp_t_string('Try it') ?></span>
                </div>
                            </a>
                
            </li>
            <li>
                <div class="saswp-features-ele">
                    <div class="saswp-ele-ic saswp-ele-4">
                                            <img src="<?php echo SASWP_PLUGIN_URL; ?>/admin_section/images/schema-setup-icon.png">
                    </div>
                    <div class="saswp-ele-tlt">
                        <h3><?php echo saswp_t_string('Structured Data Setup & Error Clean Up') ?></h3>
                        <p><?php echo saswp_t_string('We will help you setup Schema and Structured data on your website as per your requirements and as per recommendation by our expert developers.') ?></p>
                    </div>
                </div>
                                <a target="_blank" href="http://structured-data-for-wp.com/services/structured-data-setup-error-clean-up/">
                                    <div class="saswp-sts-btn">                 
                    <span class="saswp-d-btn-3"><?php echo saswp_t_string('Try it') ?></span>
                    </div>
                                </a>
                
            </li>                        
        </ul>
    </div>

<?php }
function saswp_amp_page_callback(){
    
        $settings = saswp_defaultSettings();  
        
        $field_objs = new saswp_fields_generator();
        
        $non_amp_enable_field = array(
			'label'  => 'Structured Data for AMP',
			'id'     => 'saswp-for-amp-checkbox',                        
                        'name'   => 'saswp-for-amp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'hidden' => array(
                             'id'   => 'saswp-for-amp',
                             'name' => 'sd_data[saswp-for-amp]',                             
                        )
		) ;                                        
                        
        if ( 
                is_plugin_active('accelerated-mobile-pages/accelerated-moblie-pages.php') || 
                is_plugin_active('amp/amp.php') || 
                is_plugin_active('better-amp/better-amp.php')  ||
                is_plugin_active('wp-amp/wp-amp.php') ||
                is_plugin_active('amp-wp/amp-wp.php') ||
                is_plugin_active('bunyad-amp/bunyad-amp.php') 
                        
                ) {                         
        }else{
            
            $non_amp_enable_field['attributes'] = array(
                 'disabled' => 'disabled'
             );
             $non_amp_enable_field['note'] = saswp_t_string('Requires'). ' <a target="_blank" href="https://wordpress.org/plugins/accelerated-mobile-pages/">AMP for WP</a> or <a target="_blank" href="https://wordpress.org/plugins/amp/">AMP</a> or <a target="_blank" href="https://wordpress.org/plugins/better-amp/">Better AMP</a> or <a target="_blank" href="https://codecanyon.net/item/wp-amp-accelerated-mobile-pages-for-wordpress-and-woocommerce/16278608">WP AMP</a> or <a target="_blank" href="https://theme-sphere.com/themes/smart-mag/">Bunyad AMP</a>';
             $settings['saswp-for-amp'] = 0;	
            
        }

                
        $meta_fields = array(
            $non_amp_enable_field,
		 array(
			'label'  => 'Structured Data for Non AMP',
			'id'     => 'saswp-for-wordpress-checkbox',
                        'name'   => 'saswp-for-wordpress-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => '',
                        'hidden' => array(
                             'id'   => 'saswp-for-wordpress',
                             'name' => 'sd_data[saswp-for-wordpress]',                             
                        )
		)                                         
	);        
         echo '<div class="saswp-heading">';
         echo '<h2>'.saswp_t_string('Enable On').'</h2>';        
         echo '</div>';
         echo '<p>'.saswp_t_string('Using this option, one can hide and show schema markup on AMP and Non AMP').'</p>';
        
        $field_objs->saswp_field_generator($meta_fields, $settings);    
}

function saswp_general_page_callback(){	
            
	$settings = saswp_defaultSettings(); 
        $field_objs = new saswp_fields_generator(); 
        $nav_menu   = wp_get_nav_menus();
        
        $meta_fields_default[] =  array(
                'label'  => 'Website Schema (HomePage)',
                'id'     => 'saswp_website_schema_checkbox', 
                'name'   => 'saswp_website_schema_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                     'id'   => 'saswp_website_schema',
                     'name' => 'sd_data[saswp_website_schema]',                             
                )
        );

        $meta_fields_default[] = array(
                'label'  => 'Sitelinks Search Box',
                'id'     => 'saswp_search_box_schema_checkbox', 
                'name'   => 'saswp_search_box_schema_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                         
                'hidden' => array(
                        'id'   => 'saswp_search_box_schema',
                        'name' => 'sd_data[saswp_search_box_schema]',                             
                )
        );
                        
        $meta_fields_default[] =  array(
                'label'  => 'Archive',
                'id'     => 'saswp_archive_schema_checkbox', 
                'name'   => 'saswp_archive_schema_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_archive_schema',
                        'name' => 'sd_data[saswp_archive_schema]',                             
                )
        );               
        $meta_fields_default[] = array(
                'label'   => 'Schema Type',
                'id'      => 'saswp_archive_schema_type',
                'name'    => 'sd_data[saswp_archive_schema_type]',
                'class'   => 'saswp_archive_schema_type_class',
                'type'    => 'select',
                'options' => array(                                
                                'Article'          => 'Article',     
                                'ScholarlyArticle' => 'ScholarlyArticle',                                     
                                'BlogPosting'      => 'BlogPosting',                                     
                                'NewsArticle'      => 'NewsArticle',          
                                'AnalysisNewsArticle' => 'AnalysisNewsArticle',    
                                'AskPublicNewsArticle' => 'AskPublicNewsArticle',      
                                'BackgroundNewsArticle' => 'BackgroundNewsArticle',       
                                'OpinionNewsArticle' => 'OpinionNewsArticle',   
                                'ReportageNewsArticle' => 'ReportageNewsArticle',     
                                'ReviewNewsArticle' => 'ReviewNewsArticle',                                                                                                                                                                                                                                                  
                                'WebPage'          => 'WebPage',
                                'ItemPage'         => 'ItemPage'
                )
        );
        if(is_plugin_active('woocommerce/woocommerce.php')){

                $meta_fields_default[] =   array(
                        'label'  => 'WooCommerce Archive',
                        'id'     => 'saswp_woocommerce_archive_checkbox', 
                        'name'   => 'saswp_woocommerce_archive_checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',                        
                        'hidden' => array(
                                'id'   => 'saswp_woocommerce_archive',
                                'name' => 'sd_data[saswp_woocommerce_archive]',                             
                        )
                );

        }                                      

        $meta_fields_default[] = array(
                'label'  => 'BreadCrumbs',
                'id'     => 'saswp_breadcrumb_schema_checkbox', 
                'name'   => 'saswp_breadcrumb_schema_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_breadcrumb_schema',
                        'name' => 'sd_data[saswp_breadcrumb_schema]',                             
                )
        );
        $meta_fields_default[] = array(
                'label'  => 'Home Page Title',
                'id'     => 'saswp_breadcrumb_home_page_title_text', 
                'name'   => 'sd_data[saswp_breadcrumb_home_page_title_text]',
                'type'   => 'text',
                'class'  => 'text saswp-text',  
                'default'=>  get_bloginfo(), 
        );
        
        $meta_fields_default[] = array(
                'label'  => 'Exclude Category',
                'id'     => 'saswp_breadcrumb_remove_cat_checkbox', 
                'name'   => 'saswp_breadcrumb_remove_cat_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_breadcrumb_remove_cat',
                        'name' => 'sd_data[saswp_breadcrumb_remove_cat]',                             
                )
        );
        $meta_fields_default[] = array(
                'label'  => 'Include Parent Category',
                'id'     => 'saswp_breadcrumb_include_parent_cat_checkbox', 
                'name'   => 'saswp_breadcrumb_include_parent_cat_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_breadcrumb_include_parent_cat',
                        'name' => 'sd_data[saswp_breadcrumb_include_parent_cat]',                             
                )
        );

        $meta_fields_default[] = array(
                'label'  => 'Comments',
                'id'     => 'saswp_comments_schema_checkbox', 
                'name'   => 'saswp_comments_schema_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_comments_schema',
                        'name' => 'sd_data[saswp_comments_schema]',                             
                )
         );

        $meta_fields_default[] = array(
                'label'  => 'Remove Version Tag',
                'id'     => 'saswp_remove_version_tag_checkbox', 
                'name'   => 'saswp_remove_version_tag_checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',                        
                'hidden' => array(
                        'id'   => 'saswp_remove_version_tag',
                        'name' => 'sd_data[saswp_remove_version_tag]',                             
                )
         );
        
            if($nav_menu){
                
             $options = array();
             
             foreach($nav_menu as $menu){
                 
                 $options[$menu->term_id] = $menu->name;
             }
             
             $options = array('' => 'Select A Menu') + $options;
             
             $meta_fields_default[] =   array(
			'label'  => 'Site Navigation Menu',
			'id'     => 'saswp_site_navigation_menu', 
                        'name'   => 'sd_data[saswp_site_navigation_menu]',
			'type'   => 'select',                        
                        'options'=> $options
                        
		); 
            }                    
        ?>

    <div class="saswp-global-container" id="saswp-general-container">
                        
        <div class="saswp-settings-list">      
            
            <div class="saswp-heading">
              <h2><?php echo saswp_t_string('General Settings'); ?></h2>              
            </div>
            <p><?php echo saswp_t_string('This is a global schema settings, to display about, contact, website, archive, breadcrumbs, comments and site navigation schema type.') ?> <a target="_blank" href="http://structured-data-for-wp.com/docs/article/what-is-general-settings-in-schema/"><?php echo saswp_t_string('Learn More') ?></a></p>   
        <ul><li><div class="saswp-about-contact-page-tooltip">
        <input  id="saswp_breadcrumb_home_page_title" name="sd_data[saswp_breadcrumb_home_page_title]" type="hidden" value="<?php if(!empty($settings['saswp_breadcrumb_home_page_title'])){ echo $settings['saswp_breadcrumb_home_page_title']; }else{ echo get_bloginfo(); } ?>">
        
        <label class="saswp-tooltip">
        <?php echo saswp_t_string('About') ?>
                <span class="saswp-tooltiptext"><?php echo saswp_t_string('Set the about page of of your website') ?></span>
                </label>
        </div>
        <div>
        <div class="saswp-about-contact-page">  

                    <label for="sd_about_page-select">
                        <select data-type="page" class="saswp-select2" name="sd_data[sd_about_page]" id="sd_about_page">
                         <?php 
                         $saved_choices = array();
                         $choices  = saswp_get_condition_list('page');               
                         
                         $choose_page[0] = array('id' => '', 'text' => 'Select Page');
                         $choices     = array_merge($choose_page, $choices);                             
                         if ( isset($settings['sd_about_page']) && $settings['sd_about_page'] !=  '' ) {

                                if(function_exists('icl_object_id')){
									
                                        $page_id = icl_object_id($settings['sd_about_page'], 'page', false,ICL_LANGUAGE_CODE);
                                        
                                        if($page_id){
                                                        $saved_choices = saswp_get_condition_list('page', '', $page_id);                        	
                                        }else{
                                                $saved_choices = saswp_get_condition_list('page', '', $settings['sd_about_page']);                        	
                                        }
                                                                                                 
                                }else{
                                        $saved_choices = saswp_get_condition_list('page', '', $settings['sd_about_page']);                        
                                }
                                
                         }

                         $html_str = '';       
                         foreach ($choices as $value) {                                                                    
                              $html_str .= '<option value="'.esc_attr($value['id']).'">'.esc_html($value['text']).'</option>';
                         }
                         if($saved_choices){
                                foreach($saved_choices as $value){
                                        $html_str .= '<option value="' . esc_attr($value['id']) .'" selected> ' .  saswp_t_string($value['text']) .'</option>';                     
                                }
                        } 

                        echo $html_str;
                         ?>                               
                        </select>
	            </label>  

        </div>
       </div>
    </li>
    <li><div class="saswp-about-contact-page-tooltip">
            <label class="saswp-tooltip">
    <?php echo saswp_t_string('Contact') ?>
                <span class="saswp-tooltiptext"><?php echo saswp_t_string('Set the contact us page of your website') ?></span>
            </label>
        </div>
        <div>
                 <div class="saswp-about-contact-page">          

                         <label for="sd_contact_page-select">
                         <select data-type="page" class="saswp-select2" name="sd_data[sd_contact_page]" id="sd_contact_page">
                         <?php 
                         $saved_choices = array();
                         $choices  = saswp_get_condition_list('page');               
                         $choose_page[0] = array('id' => '', 'text' => 'Select Page');
                         $choices     = array_merge($choose_page, $choices);                             
                         if ( isset($settings['sd_contact_page']) && $settings['sd_contact_page'] !=  '' ) {
                                
                                if(function_exists('icl_object_id')){
									
                                        $page_id = icl_object_id($settings['sd_contact_page'], 'page', false,ICL_LANGUAGE_CODE);
                                        
                                        if($page_id){
                                                        $saved_choices = saswp_get_condition_list('page', '', $page_id);                        	
                                        }else{
                                                $saved_choices = saswp_get_condition_list('page', '', $settings['sd_contact_page']);                        	
                                        }
                                                                                                 
                                }else{
                                                $saved_choices = saswp_get_condition_list('page', '', $settings['sd_contact_page']);                        
                                }

                         }

                         $html_str = '';       
                         foreach ($choices as $value) {                                                                    
                              $html_str .= '<option value="'.esc_attr($value['id']).'">'.esc_html($value['text']).'</option>';
                         }
                         if($saved_choices){
                                foreach($saved_choices as $value){
                                        $html_str .= '<option value="' . esc_attr($value['id']) .'" selected> ' .  saswp_t_string($value['text']) .'</option>';                     
                                }
                        } 

                        echo $html_str;
                         ?>                               
                        </select>
	     		 </label>       

       	 		</div>
        	        </div>
   			 </li>
			</ul>
		</div> 
        
        <?php
        
        echo '<div class="saswp-archive-div">';
        $field_objs->saswp_field_generator($meta_fields_default, $settings);
        echo '</div>';
        
        ?>
        
    </div>
    <div class="saswp-global-container" id="saswp-knowledge-container">
        
        <?php 
        
        
        $meta_fields = array(	                
                array(
			'label'   => 'Data Type',
			'id'      => 'saswp_kb_type',
                        'name'    => 'sd_data[saswp_kb_type]',
			'type'    => 'select',
			'options' => array(
                                ''             => 'Select an item',
				'Organization' => 'Organization',
				'Person'       => 'Person',
			)
                    ),
                    array(
			'label' => 'Organization Type',
			'id'    => 'saswp_organization_type',
                        'name'  => 'sd_data[saswp_organization_type]',
                        'class' => 'saswp_org_fields',
			'type'  => 'select',
			'options' => array(                                
				''                          => 'Select (Optional)',
				'Airline'                   => 'Airline',
                                'Consortium'                => 'Consortium',
                                'Corporation'               => 'Corporation',
                                'EducationalOrganization'   => 'EducationalOrganization',
                                'GovernmentOrganization'    => 'GovernmentOrganization',
                                'LibrarySystem'             => 'LibrarySystem',                                
                                'MedicalOrganization'       => 'MedicalOrganization',
                                'NewsMediaOrganization'     => 'NewsMediaOrganization',
                                'NGO'                       => 'NGO',
                                'PerformingGroup'           => 'PerformingGroup',
                                'SportsOrganization'        => 'SportsOrganization',
                                'WorkersUnion'              => 'WorkersUnion',
			)
                   ),
                array(
			'label' => 'Organization Name',
			'id'    => 'sd_name',
                        'name'  => 'sd_data[sd_name]',
                        'class' => 'regular-text saswp_org_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                'placeholder' => 'Organization Name'
                            )
		),
                array(
			'label' => 'Organization LegalName',
			'id'    => 'sd_legal_name',
                        'name'  => 'sd_data[sd_legal_name]',
                        'class' => 'regular-text saswp_org_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                'placeholder' => 'Organization LegalName'
                            )
		),                               
                array(
			'label' => 'Organization URL',
			'id'    => 'sd_url',
                        'name'  => 'sd_data[sd_url]',
                        'class' => 'regular-text saswp_org_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                'placeholder' => 'https://www.example.com'
                            )
		), 
                array(
			'label' => 'Contact Type',
			'id'    => 'saswp_contact_type',
                        'name'  => 'sd_data[saswp_contact_type]',
                        'class' => 'saswp_org_fields',
			'type'  => 'select',
			'options' => array(
                                ''                    => 'Select an item',
				'customer support'    => 'Customer Support',
				'technical support'   => 'Technical Support',
                                'billing support'     => 'Billing Support',
                                'bill payment'        => 'Bill payment',
                                'sales'               => 'Sales',
                                'reservations'        => 'Reservations',
                                'credit card support' => 'Credit Card Support',
                                'emergency'           => 'Emergency',
                                'baggage tracking'    => 'Baggage Tracking',
                                'roadside assistance' => 'Roadside Assistance',
                                'package tracking'    => 'Package Tracking',
			)                        
                   ),
                    array(
                            'label' => 'Contact Number',
                            'id'    => 'saswp_kb_telephone',
                            'name'  => 'sd_data[saswp_kb_telephone]',
                            'class' => 'regular-text saswp_org_fields',                        
                            'type'  => 'text',
                            'attributes' => array(
                                    'placeholder' => '+1-012-012-0124'
                            )
                    ),
                    array(
                            'label' => 'Contact URL',
                            'id'    => 'saswp_kb_contact_url',
                            'name'  => 'sd_data[saswp_kb_contact_url]',
                            'class' => 'regular-text saswp_org_fields',                        
                            'type'  => 'text',
                            'attributes' => array(
                                    'placeholder' => 'https://www.example.com/contact'
                            )
                    ),
                                   
                   array(
			'label' => 'Name',
			'id'    => 'sd-person-name',
                        'name'  => 'sd_data[sd-person-name]',
                        'class' => 'regular-text saswp_person_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                    'placeholder' => 'Name'
                            )
		    ),
                    array(
			'label' => 'Job Title',
			'id'    => 'sd-person-job-title',
                        'name'  => 'sd_data[sd-person-job-title]',
                        'class' => 'regular-text saswp_person_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                    'placeholder' => 'Job Title'
                            )
		    ),  
                    array(
			'label'      => 'Image',
			'id'         => 'sd-person-image',
                        'name'       => 'sd_data[sd-person-image][url]',
                        'class'      => 'upload large-text saswp_person_fields',
			'type'       => 'media',
                        'attributes' => array(
                                'readonly' => 'readonly'
                            ) 
		   ),
                    array(
			'label'  => 'Phone Number',
			'id'     => 'sd-person-phone-number',
                        'name'   => 'sd_data[sd-person-phone-number]',
                        'class'  => 'regular-text saswp_person_fields',                        
			'type'   => 'text',
                        'attributes' => array(
                                    'placeholder' => '+1-012-012-0124'
                            )
		    ),
                     array(
			'label' => 'URL',
			'id'    => 'sd-person-url',
                        'name'  => 'sd_data[sd-person-url]',
                        'class' => 'regular-text saswp_person_fields',                        
			'type'  => 'text',
                        'attributes' => array(
                                            'placeholder' => 'https://www.example.com/person'
                        )                             
		    ),
                    array(
			'label' => 'Logo',
			'id'    => 'sd_logo',
                        'name'  => 'sd_data[sd_logo][url]',
                        'class' => 'saswp-icon upload large-text saswp_kg_logo',
			'type'  => 'media',
                        'note'  => 'According to google validation tool, Logo size must be 160*50 or 600*60',
                        'attributes' => array(
                                'readonly' => 'readonly'                                
                            )    
		   ),
                
	);
        
        echo '<div class="saswp-heading">';
        echo '<h2>'.saswp_t_string('Knowledge Graph').'</h2>';                 
        echo '</div>';                
        echo '<p>'.saswp_t_string('The Knowledge Graph is a knowledge base used by Google and its services to enhance its search engine\'s results.').' <a target="_blank" href="http://structured-data-for-wp.com/docs/article/how-to-setup-knowledge-graph-in-schema-in-wordpress/">'.saswp_t_string('Learn More').'</a> </p>';
        echo '<div class="saswp-knowledge-base">';
        $field_objs->saswp_field_generator($meta_fields, $settings);
        echo '</div>';
        
        //social
        echo '<h2>'.saswp_t_string( 'Social Profile' ).'</h2>';                  
        echo '<div class="saswp-social-fileds">';
        echo '<p>'.saswp_t_string('Add your social profile, Google will automatically crawl it in Knowledge Graph').' <a target="_blank" href="https://structured-data-for-wp.com/docs/">'.saswp_t_string('Learn More').'</a></p>';
        echo '<div class="saswp-social-links">';
        echo '<table class="saswp-social-links-table">';  
        if(isset($settings['saswp_social_links']) && !empty($settings['saswp_social_links'])){
           
                foreach($settings['saswp_social_links'] as $link){
                    echo '<tr><td><input type="text" placeholder="https://www.facebook.com/profile" name="sd_data[saswp_social_links][]" value="'.esc_url($link).'"></td><td><a class="button button-default saswp-rmv-modify_row">X</a></td></tr>';
                }
            
        } 
        echo '</table>';  
        echo '</div>';
        echo '<a class="button button-default saswp-add-social-links">Add New Social Profile</a>'; 
        echo '</div>';
                
        ?>
                        
    </div>
    <div class="saswp-global-container" id="saswp-default-container">
    
        <?php
                
        $meta_fields_default = array(	                                		                             
                array(
			'label' => 'Default Image',
			'id'    => 'sd_default_image',
                        'name'  => 'sd_data[sd_default_image][url]',
                        'class' => 'saswp-sd_default_image',
			'type'  => 'media',
		),
                array(
			'label' => 'Default Post Image Width',
			'id'    => 'sd_default_image_width',
                        'name'  => 'sd_data[sd_default_image_width]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
		),
                array(
			'label' => 'Default Post Image Height',
			'id'    => 'sd_default_image_height',
                        'name'  => 'sd_data[sd_default_image_height]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
                        'note'  => saswp_t_string('According to google validation tool, Image size must be greater than or equal to 1200*728')
		)                
            
	);
        
        if(is_plugin_active('woocommerce/woocommerce.php')){
                              
                $meta_fields_default[] = array(
			'label'  => 'Product Default Review',
			'id'     => 'saswp-default-review-checkbox', 
                        'name'   => 'saswp-default-review-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',      
                        'note'   => 'This option will add a default review to a woocommerce product if reviews are not there', 
                        'hidden' => array(
                             'id'   => 'saswp_default_review',
                             'name' => 'sd_data[saswp_default_review]',                             
                        )
		);

                $meta_fields_default[] = array(
                        'label'  => 'Force to show single price for variable product',
                        'id'     => 'saswp-single-price-product-checkbox', 
                        'name'   => 'saswp-single-price-product-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'This option forces variable product\'s price range to show only selected price in schema markup', 
                        'hidden' => array(
                                'id'   => 'saswp-single-price-product',
                                'name' => 'sd_data[saswp-single-price-product]',                             
                        )
                );
                
                $meta_fields_default[] = array(
                        'label'  => 'Select Price Type',
                        'id'     => 'saswp-single-price-type', 
                        'name'   => 'sd_data[saswp-single-price-type]',
                        'type'   => 'select',
                        'class'  => 'saswp_org_fields saswp-single-price-opt',                        
                        'options' => array(
                                'high' => 'High',
                                'low'  => 'Low'
                        )
                );
                                      
        }
        
         echo '<div class="saswp-heading">';
         echo '<h2>'.saswp_t_string('Default Data').'</h2>';                  
         echo '</div>';
         echo '<p>'.saswp_t_string('If schema markup doest not have image, it adds this image to validate schema markup.').' <a target="_blank" href="http://structured-data-for-wp.com/docs/article/how-to-set-up-the-default-structured-data-values/">'.saswp_t_string('Learn More').'</a></p>';
         echo '<div class="saswp-schema-type-fields">';
         $field_objs->saswp_field_generator($meta_fields_default, $settings);
         echo '</div>';  
        
        
        ?>
    </div>        
                                                                                                                             
	<?php
                
        
}

function saswp_check_data_imported_from($plugin_post_type_name){
    
       $cc_args    = array(
                        'posts_per_page'   => -1,
                        'post_type'        => 'saswp',
                        'meta_key'         => 'imported_from',
                        'meta_value'       => $plugin_post_type_name,
                    );	
       
	$imported_from = new WP_Query( $cc_args ); 
        
        return $imported_from;
}
function saswp_import_callback(){
    
        global $sd_data;
                                
        $settings = saswp_defaultSettings();         
        $field_objs = new saswp_fields_generator();
        $meta_fields = array(				
                array(
			'label'  => 'Defragment Schema Markup',
			'id'     => 'saswp-defragment-checkbox',                        
                        'name'   => 'saswp-defragment-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'It relates all schema markups on page to a main entity and merge all markup to a single markup. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-defragment-schema-markup-and-how-to-add-it/">Learn More</a>',
                        'hidden' => array(
                             'id'   => 'saswp-defragment',
                             'name' => 'sd_data[saswp-defragment]',                             
                        )
		),
                array(
			'label'  => 'Add Schema Markup in footer',
			'id'     => 'saswp-markup-footer-checkbox',                        
                        'name'   => 'saswp-markup-footer-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'  => 'By default schema markup will be added in header section. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-add-schema-markup-in-footer-in-schema-structured-data-for-wp-amp">Learn More</a>',
                        'hidden' => array(
                             'id'   => 'saswp-markup-footer',
                             'name' => 'sd_data[saswp-markup-footer]',                             
                        )
		),
                array(
			'label'  => 'Pretty Print Schema Markup',
			'id'     => 'saswp-pretty-print-checkbox',                        
                        'name'   => 'saswp-pretty-print-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'By default schema markup will be minified format. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-pretty-print-schema-markup-in-schema-structured-data-for-wp-amp">Learn More</a>',
                        'hidden' => array(
                             'id'   => 'saswp-pretty-print',
                             'name' => 'sd_data[saswp-pretty-print]',                             
                        )
		),
                array(
			'label'  => 'MicroData CleanUp',
			'id'     => 'saswp-microdata-cleanup-checkbox',                        
                        'name'   => 'saswp-microdata-cleanup-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'It removes all the microdata generated by third party plugins which cause validation error on google testing tool. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/microdata-cleanup/">Learn More</a>',   
                        'hidden' => array(
                             'id'   => 'saswp-microdata-cleanup',
                             'name' => 'sd_data[saswp-microdata-cleanup]',                             
                        )
		),
                array(
			'label'  => 'Add All Available Images On Post',
			'id'     => 'saswp-other-images-checkbox',                        
                        'name'   => 'saswp-other-images-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'It adds all the available images on a post to schema markup. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-add-all-available-images-on-post-in-schema-structured-data-for-wp-amp">Learn More</a>',   
                        'hidden' => array(
                             'id'   => 'saswp-other-images',
                             'name' => 'sd_data[saswp-other-images]',                             
                        )
                ),  
                array(
                        'label'  => 'Allow Image Resizing',
                        'id'     => 'saswp-image-resizing-checkbox',                        
                        'name'   => 'saswp-image-resizing-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'If the featured image do not match with google image guidlines. This option creates a copy of the image and resize it as per google guidlines. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-allow-image-resizing-in-schema-structured-data-for-wp-amp">Learn More</a>',
                        'hidden' => array(
                                'id'   => 'saswp-image-resizing',
                                'name' => 'sd_data[saswp-image-resizing]',                             
                        )
                ),              
                array(
                        'label'  => 'Allow Multiple Size Image Creation',
                        'id'     => 'saswp-multiple-size-image-checkbox',                        
                        'name'   => 'saswp-multiple-size-image-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'According to Google, For best results, multiple high-resolution images with the following aspect ratios: 16x9, 4x3, and 1x1 should be there. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-allow-multiple-size-image-creation-in-schema-structured-data-for-wp-amp">Learn More</a>',   
                        'hidden' => array(
                                'id'   => 'saswp-multiple-size-image',
                                'name' => 'sd_data[saswp-multiple-size-image]',                             
                        )
                ),
                array(
                        'label'  => 'Resized Images in Separate Folder',
                        'id'     => 'saswp-resized-image-folder-checkbox',                        
                        'name'   => 'saswp-resized-image-folder-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'Store all resized images by SASWP in a separate folder "schema-and-structured-data-for-wp" for better management and optimization of images. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-resized-images-in-separate-folder-in-schema-structured-data-for-wp-amp/">Learn More</a>',   
                        'hidden' => array(
                                'id'   => 'saswp-resized-image-folder',
                                'name' => 'sd_data[saswp-resized-image-folder]',                             
                        )
                ),
                array(
			'label'  => 'YouTube API Key',
			'id'     => 'saswp-youtube-api',
                        'name'   => 'sd_data[saswp-youtube-api]',
                        'class'  => 'regular-text',                        
			'type'   => 'text',
                        'note'   => 'This option only works with VideoObject schema. 1.) Create a new project here: <a href="https://console.developers.google.com/project" target="_blank">Click here.</a> 2.) Enable "YouTube Data API" under "APIs & auth" -> APIs. 3.) Create a new server key under "APIs & auth" -> Credentials. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-youtube-api-key-in-schema-structured-data-for-wp-amp/">Learn More</a>',   
                        'attributes' => array(
                                    'placeholder' => 'AIzaSyB_WQM0iHROprml62RQj1rEYqDyUC6ddfe'
                            )
		    ),
                array(
                        'label'  => 'Add Featured Image in RSS feed',
                        'id'     => 'saswp-rss-feed-image-checkbox',                        
                        'name'   => 'saswp-rss-feed-image-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',   
                        'note'   => 'Showing images alongside news/blogs if your website or blog appears in Google News. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/what-is-add-featured-image-in-rss-feed-in-schema-structured-data-for-wp-amp/">Learn More</a>',   
                        'hidden' => array(
                                'id'   => 'saswp-rss-feed-image',
                                'name' => 'sd_data[saswp-rss-feed-image]',                             
                        )
                ),
                array(
                        'label'  => 'Full Heading',
                        'id'     => 'saswp-full-heading-checkbox', 
                        'name'   => 'saswp-full-heading-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',                        
                        'note'   => 'Google only allows to keep 110 or less than that characters in schema heading. We internally truncate to keep heading not more than 110 characters. This option will stop internal heading truncation.',
                        'hidden' => array(
                                'id'   => 'saswp-full-heading',
                                'name' => 'sd_data[saswp-full-heading]',                             
                        )
                )                  
                
	);   
        
        if( function_exists('is_super_admin') &&  is_super_admin() ){
            
            $meta_fields[] = array(
			'label'   => 'Role Based Access',
			'id'      => 'saswp-role-based-access',                        
                        'name'    => 'sd_data[saswp-role-based-access]',
			'type'    => 'multiselect',
                        'note'    => 'Choose the users whom you want to allow full access to this plugin',
                        'class'   => 'saswp-role-based-access-class',                          
                        'options' => saswp_get_user_roles()
		    );
            
        }    
           
                                                        
        $message                 = 'This plugin\'s data already has been imported. Do you want to import again?. click on button above button.';
        $schema_message          = '';
        $schema_pro_message      = '';
        $wp_seo_schema_message   = '';
        $seo_pressor_message     = '';
        $wpsso_core_message      = '';
        $aiors_message           = '';
        $wp_custom_rv_message    = '';
        $schema_for_faqs_message = '';
        $starsrating_message    = '';
        $schema_plugin         = saswp_check_data_imported_from('schema'); 
        $schema_pro_plugin     = saswp_check_data_imported_from('schema_pro');
        $wp_seo_schema_plugin  = saswp_check_data_imported_from('wp_seo_schema');
        $seo_pressor           = saswp_check_data_imported_from('seo_pressor');
        $wpsso_core            = saswp_check_data_imported_from('wpsso_core');
        $aiors                 = saswp_check_data_imported_from('aiors');
        $wp_custom_rv          = saswp_check_data_imported_from('wp_custom_rv');
        $schema_for_faqs       = saswp_check_data_imported_from('schema_for_faqs');
        $starsrating           = saswp_check_data_imported_from('starsrating');
        
        if($starsrating->post_count !=0 ){
            
            $starsrating_message = $message;
                     
        }

        if($schema_for_faqs->post_count !=0 ){
            
          $schema_for_faqs_message = $message;
               
        }
        if($wp_custom_rv->post_count !=0 ){
            
          $wp_custom_rv_message = $message;
         
        }
        if($aiors->post_count !=0 ){
            
          $aiors_message = $message;
         
        }
        
        if($wpsso_core->post_count !=0){
            
          $wpsso_core_message = $message;
         
        }
        
        if($seo_pressor->post_count !=0){
            
          $seo_pressor_message = $message;
         
        }        
	if($schema_plugin->post_count !=0){
            
          $schema_message    = $message;
         
        }
        if($schema_pro_plugin->post_count !=0){
            
          $schema_pro_message = $message;   
         
        }
        if($wp_seo_schema_plugin->post_count !=0){
            
          $wp_seo_schema_message = $message;   
         
        }        	 
                              
         ?>
        <div class="saswp-tools-container" id="saswp-tools-advanced-container">
            
         <?php   
                echo '<h2 class="saswp-advanced-heading">'.saswp_t_string('Advanced Settings').'</h2>'; 
                $field_objs->saswp_field_generator($meta_fields, $settings);                  
		echo '<h2 id="saswp-migration-heading">'.saswp_t_string('Migration').'</h2>';       	                  
        ?>	
            <ul>
                <li><div class="saswp-tools-field-title">
                        <div class="saswp-tooltip">
                                <span class="saswp-tooltiptext">
                                        <?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('Schema Plugin'); ?></strong></div>
                                        <button data-id="schema" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($schema_message).'</p>'; ?>    
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('Schema Pro'); ?></strong></div><button data-id="schema_pro" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($schema_pro_message).'</p>'; ?>                       
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('WP SEO Schema'); ?></strong></div><button data-id="wp_seo_schema" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($wp_seo_schema_message).'</p>'; ?>                       
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('SEO Pressor'); ?></strong></div><button data-id="seo_pressor" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($seo_pressor_message).'</p>'; ?>                          
                    </div>
                </li>
                
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('WPSSO Core'); ?></strong></div><button data-id="wpsso_core" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($wpsso_core_message).'</p>'; ?>                          
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('Schema – All In One Schema Rich Snippets'); ?></strong></div><button data-id="aiors" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($aiors_message).'</p>'; ?>                          
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('WP Customer Reviews'); ?></strong></div><button data-id="wp_custom_rv" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($wp_custom_rv_message).'</p>'; ?>                          
                    </div>
                </li>
                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the reviews can be imported from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('Stars Rating'); ?></strong></div><button data-id="starsrating" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($starsrating_message).'</p>'; ?>                          
                    </div>
                </li>

                <li><div class="saswp-tools-field-title"><div class="saswp-tooltip"><span class="saswp-tooltiptext"><?php echo saswp_t_string('All the settings and data you can import from this plugin when you click start importing') ?></span><strong><?php echo saswp_t_string('FAQ Schema Markup – FAQ Structured Data'); ?></strong></div><button data-id="schema_for_faqs" class="button saswp-import-plugins"><?php echo saswp_t_string('Import'); ?></button>
                        <p class="saswp-imported-message"></p>
                        <?php echo '<p>'.saswp_t_string($schema_for_faqs_message).'</p>'; ?>                          
                    </div>
                </li>
                
            </ul>                   
	<?php   
            echo '<h2 id="saswp-import-export-heading">'.saswp_t_string('Import / Export').'</h2>'; 
            $url = wp_nonce_url(admin_url('admin-ajax.php?action=saswp_export_all_settings_and_schema'), '_wpnonce');         
        ?>
        <ul>
                <li>
                    <div class="saswp-tools-field-title"><div class="saswp-tooltip"><strong><?php echo saswp_t_string('Export All Settings & Schema'); ?></strong></div><a href="<?php echo esc_url($url); ?>"class="button saswp-export-data"><?php echo saswp_t_string('Export'); ?></a>                         
                    </div>
                </li> 
                <li>
                    <div class="saswp-tools-field-title"><div class="saswp-tooltip"><strong><?php echo saswp_t_string('Import All Settings & Schema'); ?></strong></div><input type="file" name="saswp_import_backup" id="saswp_import_backup">                         
                    </div>
                </li> 
        </ul>
        <?php                
         echo '<h2 id="saswp-misc-heading">'.saswp_t_string('Reset').'</h2>'; 
         ?>
            <ul>
                <li>
                    <div class="saswp-tools-field-title">
                        <div class="saswp-tooltip"><strong><?php echo saswp_t_string('Reset Settings'); ?></strong></div><a href="#"class="button saswp-reset-data"><?php echo saswp_t_string('Reset'); ?></a>                         
                        <p><?php echo saswp_t_string('This will reset your settings and schema types'); ?></p>
                    </div>
                </li> 
                
            </ul>
            
            <ul>
                <li>
                    <div class="">
                        <div class="saswp-tooltip"><strong><?php echo saswp_t_string('Remove Data On Uninstall'); ?></strong></div><input type="checkbox" id="saswp_rmv_data_on_uninstall" name="sd_data[saswp_rmv_data_on_uninstall]" <?php echo (isset($sd_data['saswp_rmv_data_on_uninstall'])? 'checked': ''); ?>>                        
                        <p><?php echo saswp_t_string('This will remove all of its data when the plugin is deleted'); ?></p>
                    </div>
                </li> 
                
            </ul>
            
            <ul>
                <li>
                    <div class="saswp-tools-field-title">
                        
                        <div class="saswp-tooltip"><strong><?php echo saswp_t_string('Data Tracking'); ?></strong></div>
                        
                        <?php
                        
                            $settings       = saswp_defaultSettings();
                            $allow_tracking = get_option( 'wisdom_allow_tracking' );
                            
                            $plugin         = basename( SASWP_DIR_NAME_FILE, '.php' );
                       
                            if(isset($allow_tracking[$plugin])){
                                                $track_url = add_query_arg( array(
                                                        'plugin'        => $plugin,
                                                        'plugin_action'	=> 'no'
                                                ) );
                                echo '<a href="'. esc_url_raw( $track_url ).'" class="button-secondary">'.saswp_t_string( 'Disallow' ).'</a>';

                            }else{

                                $track_url = add_query_arg(array(
					'plugin' 		=> $plugin,
					'plugin_action'   	=> 'yes'
				));
                             
                                 echo '<a href="'. esc_url_raw( $track_url ).'" class="button-secondary">'.saswp_t_string( 'Allow' ).'</a>';
                                
                            }
                        
                        ?>
                                                                        
                        <p><?php echo saswp_t_string('We guarantee no sensitive data is collected'); ?>
                            <a target="_blank" href="https://structured-data-for-wp.com/docs/article/usage-data-tracking/"><?php echo saswp_t_string('Learn more'); ?></a>
                        </p>
                    </div>
                </li> 
                
            </ul>
            
        <?php    

echo '<h2 id="saswp-translation-heading">'.saswp_t_string('Translation Panel').'</h2>';

global  $translation_labels;

echo '<ul>';

if(is_array($translation_labels)){

        foreach($translation_labels as $key => $val){

        if(isset($settings[$key]) && $settings[$key] !='' ){
            $translation = $settings[$key];
        }else{
            $translation = $val;
        }               
         echo  '<li>'
             . '<div class="saswp-tools-field-title"><div class="saswp-tooltip"><strong>'.esc_attr($val).'</strong></div>'
             . '<input class="regular-text" type="text" name="sd_data['.esc_attr($key).']" value="'. esc_attr($translation).'">'
             . '</div></li>';
        }
    
    }
echo '</ul>';

        if(saswp_ext_installed_status()){

                $premium_feat_redirect =  esc_url(admin_url().'admin.php?page=structured_data_options&tab=premium_features');
                echo '<h2 id="saswp-license-heading">'.saswp_t_string('License').'</h2>
                <p> This section has been shifted to <a href="'.esc_url($premium_feat_redirect).'">Premium Features Tab</a></p>';

        }
                                        
        $add_on = array();
        
        if(is_plugin_active('1-click-indexing-api-integration-for-saswp/1-click-indexing-api-integration-for-saswp.php')){
                      
                $add_on[] = 'OCIAIFS';           
                                           
        }
        
        if(is_plugin_active('cooked-compatibility-for-schema/cooked-compatibility-for-schema.php')){
                      
           $add_on[] = 'Cooked';           
                                      
        }

        if(is_plugin_active('polylang-compatibility-for-saswp/polylang-compatibility-for-saswp.php')){
                      
                $add_on[] = 'Polylang';           
                                           
        }
        if(is_plugin_active('classifieds-plugin-compatibility/classifieds-plugin-compatibility.php')){
                      
                $add_on[] = 'CPC';           
                                           
        }

        if(is_plugin_active('wpml-schema-compatibility/wpml-schema-compatibility.php')){
                      
                $add_on[] = 'WPML';           
                                           
        }
        
        if(is_plugin_active('jobposting-schema-compatibility/jobposting-schema-compatibility.php')){
                      
                $add_on[] = 'Jobposting';           
                                           
        }
        
        if(is_plugin_active('woocommerce-compatibility-for-schema/woocommerce-compatibility-for-schema.php')){
                      
           $add_on[] = 'Woocommerce';           
                                      
        }
        if(is_plugin_active('real-estate-schema/real-estate-schema.php')){
                      
           $add_on[] = 'Res';           
                                      
        }
        if(is_plugin_active('course-schema-for-saswp/course-schema-for-saswp.php')){
                      
           $add_on[] = 'Cs';           
                                      
        }
        if(is_plugin_active('qanda-schema-for-saswp/qanda-schema-for-saswp.php')){
                      
                $add_on[] = 'qanda';           
                                           
        }
        if(is_plugin_active('faq-schema-compatibility/faq-schema-compatibility.php')){
                      
                $add_on[] = 'faq';           
                                           
        }
        if(is_plugin_active('event-schema-for-saswp/event-schema-for-saswp.php')){
                      
           $add_on[] = 'Es';           
                                      
        }
        if(is_plugin_active('recipe-schema-for-saswp/recipe-schema-for-saswp.php')){
                      
           $add_on[] = 'Rs';           
                                      
        }

        if(is_plugin_active('reviews-for-schema/reviews-for-schema.php')){
                      
           $add_on[] = 'reviews';           
                                      
        }
                
        if(!empty($add_on)){
            
            // echo '<h2 id="saswp-license-heading">'.saswp_t_string('License').'</h2>';
            
            echo '<ul>';
            
            foreach($add_on as $on){
                
                $license_key        = '';
                $license_status     = 'inactive';
                $license_status_msg = '';
                
                if(isset($sd_data[strtolower($on).'_addon_license_key'])){
                  $license_key =   $sd_data[strtolower($on).'_addon_license_key'];
                }
                
                if(isset($sd_data[strtolower($on).'_addon_license_key_status'])){
                  $license_status =   $sd_data[strtolower($on).'_addon_license_key_status'];
                }
                
                if(isset($sd_data[strtolower($on).'_addon_license_key_message'])){
                  $license_status_msg =   $sd_data[strtolower($on).'_addon_license_key_message'];
                }

                if (isset($sd_data[strtolower($on).'_addon_license_key_user_name'])) {                    
                $license_user_name =   $sd_data[strtolower($on).'_addon_license_key_user_name'];
                }

                if (isset($sd_data[strtolower($on).'_addon_license_key_download_id'])) {
                $license_download_id =   $sd_data[strtolower($on).'_addon_license_key_download_id'];
                }

                if (isset($sd_data[strtolower($on).'_addon_license_key_expires'])) {
                $license_expires =   $sd_data[strtolower($on).'_addon_license_key_expires'];
                }

                if (isset($sd_data[strtolower($on).'_addon_license_key_expires_normal'])) {
                $license_expnormal =   $sd_data[strtolower($on).'_addon_license_key_expires_normal'];
                }
                // echo '<li>';
                // echo saswp_get_license_section_html($on, $license_key, $license_status, $license_status_msg, $license_user_name, $license_download_id, $license_expires, true, false);
                // echo '</li>';
                
            }
            
            echo '</ul>';
            
        }
            
         ?>   
            
        </div>
        

        

<?php
         
}

function saswp_get_license_section_html($on, $license_key, $license_status, $license_status_msg, $license_user_name, $license_download_id, $license_expires, $license_expnormal, $label=null, $limit_status=null){
            $limits_html = $response = '';
    
            $limits = get_option('reviews_addon_reviews_limits');
    
            if(!$limit_status){
               $limits_html = '<span class="limit_span"><span style="padding:10px;">Maximum Reviews Limits '. esc_attr($limits).'</span></span>'; 
            }

            $response.= '<div class="saswp-tools-main-field-title">';
            $response.= '<div class="saswp-tools-field-title">';
               
                if($label == true && $on == 'OCIAIFS'){
                                
                        $response.= '<div class="saswp-license-label">';
                        // $response.= '<strong>'.saswp_t_string('1-Click Indexing API Integration').'</strong>';
                        $response.= '</div>';
                
                }
                if($label == true && $on == 'Polylang'){
                                
                        $response.= '<div class="saswp-license-label">';
                        // $response.= '<strong>'.saswp_t_string(''.$on.' Schema Compatibility').'</strong>';
                        $response.= '</div>';
                
                }
                if($label == true && $on == 'CPC'){
                                
                        $response.= '<div class="saswp-license-label">';
                        // $response.= '<strong>'.saswp_t_string('Classifieds Plugin Compatibility').'</strong>';
                        $response.= '</div>';
                
                }
                if($label == true && $on == 'WPML'){
                        
                        $response.= '<div class="saswp-license-label">';
                        // $response.= '<strong>'.saswp_t_string(''.$on.' Schema Compatibility').'</strong>';
                        $response.= '</div>';
                
                }
               if($label == true && $on == 'Cooked'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string(''.$on.' Compatibility For Schema').'</strong>';
                    $response.= '</div>';
                
               }
               if($label == true && $on == 'Woocommerce'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string(''.$on.' Compatibility For Schema').'</strong>';
                    $response.= '</div>';
                
               }
               
               if($label == true && $on == 'Res'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string('Real Estate Schema').'</strong>';
                    $response.= '</div>';
                
               }

               if($label == true && $on == 'Jobposting'){
                   
                $response.= '<div class="saswp-license-label">';
                // $response.= '<strong>'.saswp_t_string('JobPosting Schema Compatibility').'</strong>';
                $response.= '</div>';
            
                }
               
               if($label == true && $on == 'Cs'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string('Course Schema').'</strong>';
                    $response.= '</div>';
                
               }
               if($label == true && $on == 'Es'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string('Event Schema').'</strong>';
                    $response.= '</div>';
                
               }

               if($label == true && $on == 'qanda'){
                   
                $response.= '<div class="saswp-license-label">';
                // $response.= '<strong>'.saswp_t_string('Q&A Schema').'</strong>';
                $response.= '</div>';
            
                }

                if($label == true && $on == 'faq'){
                   
                        $response.= '<div class="saswp-license-label">';
                        // $response.= '<strong>'.saswp_t_string('FAQ Schema Compatibility').'</strong>';
                        $response.= '</div>';
                    
                }
               
               if($label == true && $on == 'Rs'){
                   
                    $response.= '<div class="saswp-license-label">';
                    // $response.= '<strong>'.saswp_t_string('Recipe Schema').'</strong>';
                    $response.= '</div>';
                
               }

                $original_license = $license_key;
                // $unreadable_license_k = $license_key;                   
                // $strlen = strlen($unreadable_license_k);
                // $show_key = "";
                // for( $i=1; $i<$strlen; $i++) {
                //     if( $i<$strlen-9 ){
                //         $show_key .= "*";
                //     }else{
                //         $show_key .= $unreadable_license_k[$i];
                //     }
                // }
                if($license_status == 'active'){
                 if ( !defined('SASWPPRO_PLUGIN_DIR')){

                    if ($license_expires<0) {
                        $license_Status_ = ''.saswp_t_string('Expired').'';
                        $license_Status_id = ' id="lic_exp"';
                    }
                    else{
                        $license_Status_ = ''.saswp_t_string('Active').'';
                        $license_Status_id = 'id="lic_active"';
                    }
                }
                else{
                            $license_Status_ = ''.saswp_t_string('Active').'';
                            $license_Status_id = 'id="lic_active"';
                        }
                        $expire_msg_before = $single_expire_msg = $expire_msg = $license_expires_class = $alert_icon = $when_active = '';
                        
                    $original_license = $license_key;
                    $license_name_ = strtolower($on);
                    $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_key."&download_id=".$license_download_id."";
                    $user_refresh_addon = '<a addon-is-expired id="'.strtolower($license_name_).'" remaining_days_org='.$license_expnormal.'  days_remaining="'.$license_expires.'" licensestatusinternal="'.$license_status.'" add-on="'.$license_name_.'" class="user_refresh_single_addon" data-attr="'.$original_license.'" add-onname="sd_data['.strtolower($license_name_).'_addon_license_key]">
                    <i addon-is-expired class="dashicons dashicons-update-alt" id="user_refresh_'.strtolower($license_name_).'"></i>
                    Refresh
                    </a>
                    <input type="hidden" license-status="inactive"  licensestatusinternal="'.$license_status.'" add-on="'.strtolower($license_name_).'" class="button button-default saswp_license_activation '.$license_status.'mode '.strtolower($license_name_).''.strtolower($license_name_).'" id="saswp_license_deactivation_internal">';

                if ( $license_expires == 'Lifetime' ) {
                    $expire_msg_before = '<span class="before_msg_active">'.esc_html__('License is', 'saswp').'</span>';
                    $single_expire_msg = " ".esc_html__('Valid for Lifetime', 'saswp')." ";
                    $renew_text = 'Renew';
                    $license_expires_class = "lifetime_";
                }
                else if( $license_expires < 0 ){
                    $expire_msg_before = '<span class="before_msg">'.esc_html__('Your', 'saswp').' <span class="less_than_zero">'.esc_html__('License is', 'saswp').'</span></span>';
                    $single_expire_msg = " ".esc_html__('Expired', 'saswp')." ";
                    $renew_text = 'Renew';
                    $license_expires_class = "expire_msg";
                 }
                 else if( $license_expires >=0 && $license_expires <=30 ){
                    $expire_msg_before = '<span class="before_msg">'.esc_html__('Your', 'saswp').' <span class="zero_to_30">'.esc_html__('License is', 'saswp').'</span></span>';
                    $license_expires_class = "zero2thirty";
                    $single_expire_msg = '<span class="saswp-addon-alert">'.esc_html__('expiring in', 'saswp').' '.$license_expires .' '.esc_html__('days', 'saswp').'</span>';
                    $renew_text = 'Renew';
                    $alert_icon = '<span class="saswp_addon_icon dashicons dashicons-warning single_addon_warning"></span>';
                }
                else{
                    $expire_msg_before = '<span class="saswp-addon-active">'.esc_html__('', 'saswp').'</span>';
                    $single_expire_msg = "".esc_html__('', 'saswp')." ".$license_expires ." ".esc_html__("days remaning", "saswp")." ";
                    $license_expires_class = "lic_is_active";
                    $renew_text = 'Renew License';
                }

                
                if ( !empty($license_expires) ) {
                    $when_active = '<span class="saswp-license-tenure" days_remaining='.$license_expires.'>'.$alert_icon.' '.$expire_msg_before.'
                <span expired-days-dataa="'.$license_expires.'" class='.$license_expires_class.'>'.$single_expire_msg.'
                <a target="blank" class="renewal-license" href="'.$renew_url.'">
                <span class="renew-lic">'.esc_html__( $renew_text , 'saswp').'</span></a>'.$user_refresh_addon.'
                </span>
                </span>';
                }
                $Reviews_h = '';
                if ($on ==  'Reviews') {
                    $Reviews_h = $limits_html;
                }
                $response.= '<div class="saswp-sts-active-main '.strtolower($on).'_addon "><label class="saswp-sts-txt '.$license_status.'">'.saswp_t_string('Status').':<span class="addon-activated_'.strtolower($on).'" '.$license_Status_id.'>'.$license_Status_.'</span>
                <input type="password" class="license_key_input_active '.strtolower($on).'_addon_license_key" value="'.esc_attr(''.$original_license.'').'" placeholder="'.saswp_t_string('Enter License Key').'" id="'.strtolower($on).'_addon_license_key">
                <a license-status="inactive" add-on="'.strtolower($on).'" class="button button-default saswp_license_activation deactive_state '.strtolower($on).''.strtolower($on).'" id="saswp_license_deactivation">'.saswp_t_string('Deactivate').'</a>'.$Reviews_h.' 
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_expires_normal" name="sd_data['.strtolower($on).'_addon_license_key_expires_normal]" value="'.esc_attr($license_expnormal).'">
                <input type="hidden" class="license_key_input_active '.strtolower($on).'_addon_license_key" placeholder="'.saswp_t_string('Enter License Key').'"  name="sd_data['.strtolower($on).'_addon_license_key]" value="'.esc_attr($original_license).'">
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_status" name="sd_data['.strtolower($on).'_addon_license_key_status]" value="'.esc_attr($license_status).'">
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_user_name" name="sd_data['.strtolower($on).'_addon_license_key_user_name]" value="'.esc_attr($license_user_name).'">
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_download_id" name="sd_data['.strtolower($on).'_addon_license_key_download_id]" value="'.esc_attr($license_download_id).'">
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_expires" name="sd_data['.strtolower($on).'_addon_license_key_expires]" value="'.esc_attr($license_expires).'">
                '.$when_active.'
                </label></div>';                
                 
            }
            elseif ( $license_status_msg !='active' && $on ==  'Reviews') {

                $response.= '<span class="saswp-sts-deactive-reviews '.strtolower($on).'_addon">
                <label class="saswp-sts-txt"><span class="saswp_inactive_Reviews">'.saswp_t_string('Status').':</span><span class="saswp_inactive_status_'.strtolower($on).'">'.saswp_t_string('Inactive').'
                </span>
                <input type="text" class="saswp_reviewslicense_key_input_inactive '.strtolower($on).'_addon_inactive" placeholder="Enter License Key" name="sd_data['.strtolower($on).'_addon_license_key]" id="'.strtolower($on).'_addon_license_key" value="">
                 <a license-status="active" add-on="'.strtolower($on).'" class="button button-default saswp_license_activation Reviews '.$on.'" id="saswp_license_activation">'.saswp_t_string('Activate').'</a>
                 </label>
                 </span>';
                    }

            else{ 
                    $final_otp = '';
                if (isset($expire_msg_before) && isset($single_expire_msg) && isset($license_expires_class) && isset($license_expires) ) {
                    $original_license = $license_key;
                    $license_name_ = strtolower($on);
                    $renew_url = "https://structured-data-for-wp.com/order/?edd_license_key=".$license_key."&download_id=".$license_download_id."";
                    $user_refresh_addon = '<a addon-is-expired remaining_days_org='.$license_expnormal.' id="'.strtolower($license_name_).'" days_remaining="'.$license_expires.'" licensestatusinternal="'.$license_status.'" add-on="'.$license_name_.'" class="user_refresh_single_addon" data-attr="'.$original_license.'" add-onname="sd_data['.strtolower($license_name_).'_addon_license_key]">
                    <i addon-is-expired class="dashicons dashicons-update-alt" id="user_refresh_'.strtolower($license_name_).'"></i>
                    Refresh
                    </a>
                    <input type="hidden" license-status="inactive"  licensestatusinternal="'.$license_status.'" add-on="'.strtolower($license_name_).'" class="button button-default saswp_license_activation '.$license_status.'mode '.strtolower($license_name_).''.strtolower($license_name_).'" id="saswp_license_deactivation_internal">';

                    $final_otp = '';
                if( $license_expires < 0 ){
                    $expire_msg_before = '<span class="expired_before_msg">'.esc_html__('Your', 'saswp-for-wp').' <span class="less_than_zero">'.esc_html__('License is', 'saswp-for-wp').'</span></span>';
                    $single_expire_msg = " ".esc_html__('Expired', 'saswp-for-wp')." ";
                    $license_expires_class = "expire_msg";
                    $final_otp = '<span class="expired-saswp-license-tenure" days_remaining='.$license_expires.'>'.$alert_icon.' '.$expire_msg_before.'
                <span expired-days-data="'.$license_expires.'" class='.$license_expires_class.'>'.$single_expire_msg.'
                <a target="blank" class="renewal-license" href="'.$renew_url.'">
                <span class="renew-lic">'.esc_html__('Renew', 'saswp-for-wp').'</span></a>'.$user_refresh_addon.'
                </span>
                </span>';
                 }
             }
             

                $original_license = $license_key;
                $response.= '<div class="saswp-sts-deactive-main '.strtolower($on).'_addon"><label class="saswp-sts-txt">'.saswp_t_string('Status').':<span id="lic_inactive" class="inactive_status_'.strtolower($on).'">'.saswp_t_string('Inactive').'</span>
                <input type="password" class="license_key_input_inactive '.strtolower($on).'_addon_inactive" placeholder="Enter License Key" name="sd_data['.strtolower($on).'_addon_license_key]" id="'.strtolower($on).'_addon_license_key" value="'.$original_license.'">
                <a license-status="active" add-on="'.strtolower($on).'" class="button button-default saswp_license_activation '.strtolower($on).'" id="saswp_license_activation">'.saswp_t_string('Activate').'</a>
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_status" name="sd_data['.strtolower($on).'_addon_license_key_status]" value="'.esc_attr($license_status).'">
                <input type="hidden" id="'.strtolower($on).'_addon_license_key_download_id" name="sd_data['.strtolower($on).'_addon_license_key_download_id]" value="'.esc_attr($license_download_id).'">

                </label>
                </div>';
                    $response .=  $final_otp ;
            }

                $response.= '</div>';
                $response.= '</div>';
                
                return $response;
    
}

function saswp_review_page_callback(){
        
        $settings = saswp_defaultSettings();         
        $field_objs = new saswp_fields_generator();
                                
        $meta_fields = array(				                               
                array(
			'label'  => 'Google Review',
			'id'     => 'saswp-google-review-checkbox',                        
                        'name'   => 'saswp-google-review-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'This option enables the google review section. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/how-to-fetch-google-reviewfree-version/">Learn More</a>',
                        'hidden' => array(
                             'id'   => 'saswp-google-review',
                             'name' => 'sd_data[saswp-google-review]',                             
                        )
		),                                
                array(
                            'label' => 'Google place API Key',
                            'id'    => 'saswp_google_place_api_key',
                            'name'  => 'sd_data[saswp_google_place_api_key]',
                            'note'  => '<a target="_blank" href="https://console.developers.google.com/apis/library">Get place API Key</a> Note : Google allows only 5 latest reviews per location',
                            'class' => '',
                            'type'  => 'text',
                  ),                 
                array(
                            'label' => '',
                            'id'    => 'saswp-google-place-section',
                            'name'  => 'sd_data[saswp-google-place-section]',
                            'type'  => 'text',
                            
                  ),                
                 array(
                            'label' => 'Review Module',
                            'id'    => 'saswp-reviews-module-section',
                            'name'  => 'sd_data[saswp-reviews-module-section]',
                            'type'  => 'text',
                            
                  )  
                                  
	);    
                    
        $csv_url  = wp_nonce_url(admin_url('admin-ajax.php?action=saswp_download_csv_review_format'), '_wpnonce');         

        ?>
        
    <div class="saswp-review-container" id="saswp-review-reviews-container">

        <div class="saswp-settings-list">
        <ul>
                <li>
                        <div class="saswp-knowledge-label"><label><?php echo saswp_t_string('Upload Reviews From CSV'); ?></label></div>
                        <div class="saswp-knowledge-field">
                         <input type="file" name="saswp_upload_rv_csv" id="saswp_upload_rv_csv" multiple="false" accept=".csv" />
                         <p><?php echo saswp_t_string('You must follow the format.'); ?> <a href="<?php echo esc_url($csv_url); ?>"><?php echo saswp_t_string('Click here');  ?></a> <?php echo saswp_t_string('to download the format.') ?></p>
                         </div>
                </li>
        </ul>
        </div>
        
        <?php 

            $meta_fields = apply_filters('saswp_modify_reviews_settings_page', $meta_fields);

            $field_objs->saswp_field_generator($meta_fields, $settings);  
            
            if(class_exists('saswp_reviews_platform_markup')){
                
                $platform_obj = new saswp_reviews_platform_markup();
                                            
                echo $platform_obj->reviews_markup();
                
            }
            
       ?>
        <div class="saswp-quick-links-div">
            <h4><?php echo saswp_t_string('Quick Links'); ?></h4>       
            <p><a href="<?php echo admin_url('edit.php?post_type=saswp_reviews'); ?>"><?php echo saswp_t_string('View Current Reviews'); ?></a></p>
            <p><a target="_blank" href="https://structured-data-for-wp.com/docs/article/how-to-display-reviews-with-collection-feature/"><?php echo saswp_t_string('How to show reviews on the website'); ?></a></p>
        </div>
         
    </div>

    <div class="saswp-review-container" id="saswp-review-rating-container">
                
       <?php 
       
       $meta_fields = array(				
                array(
			'label'  => 'Rating Box',
			'id'     => 'saswp-review-module-checkbox',                        
                        'name'   => 'saswp-review-module-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'This option enables the review metabox on every post/page. <a target="_blank" href="https://structured-data-for-wp.com/docs/article/how-to-use-rating-module-in-schema-and-structured-data/">Learn More</a>',
                        'hidden' => array(
                             'id'   => 'saswp-review-module',
                             'name' => 'sd_data[saswp-review-module]',                             
                        )
                ),
                array(
                        'label'  => 'Stars Rating',
                        'id'     => 'saswp-stars-rating-checkbox',                        
                        'name'   => 'saswp-stars-rating-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => 'This option adds rating field in wordpress default comment box <a target="_blank" href="https://structured-data-for-wp.com/docs/article/how-to-use-rating-module-in-schema-and-structured-data/">Learn More</a>',
                        'hidden' => array(
                                'id'   => 'saswp-stars-rating',
                                'name' => 'sd_data[saswp-stars-rating]',                             
                        )
                ),
                array(
                        'label'  => 'Default Rating',
                        'id'     => 'saswp-default-rating',                        
                        'name'   => 'sd_data[saswp-default-rating]',
                        'type'   => 'number',
                        'class'  => 'regular-text',
                        'note'   => 'Option to set default rating to rating field. If user does not choose rating this value will be submited',                        
                        'attributes' => array(
                                'max' => '5',
                                'min' => '1'                                
                        )
                )
           );  
       
       $field_objs->saswp_field_generator($meta_fields, $settings); 
       ?> 
    </div>
    
    <?php
        
        
}

function saswp_email_schema_callback(){
        
        $settings = saswp_defaultSettings();  
                                        
        $woocommerce = array(
			'label'  => 'Woocommerce Booking',
			'id'     => 'saswp-woocommerce-booking-main-checkbox',                        
                        'name'   => 'saswp-woocommerce-booking-main-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'hidden' => array(
                                'id'   => 'saswp-woocommerce-booking-main',
                                'name' => 'sd_data[saswp-woocommerce-booking-main]',                             
                        )
		);
        
        if(!is_plugin_active('woocommerce/woocommerce.php') || !is_plugin_active('woocommerce-bookings/woocommerce-bookings.php')){
                      
             $woocommerce['note'] = saswp_t_string('Requires').' <a target="_blank" href="https://wordpress.org/plugins/woocommerce/">Woocommerce</a>';
                                      
        }
        
        if(!is_plugin_active('woocommerce-compatibility-for-schema/woocommerce-compatibility-for-schema.php')){
                      
             $woocommerce['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="http://structured-data-for-wp.com/woocommerce-compatibility-for-schema/">WooCommerce Addon</a>';
                                      
        }
                                   
        $field_objs = new saswp_fields_generator();
        $meta_fields = array(				               
                $woocommerce,                                              
	);       
        
        $field_objs->saswp_field_generator($meta_fields, $settings);
                        
}

function saswp_compatibility_page_callback(){
        
        $settings = saswp_defaultSettings();  
        
        $wordpress_news = array(
			'label'  => 'Wordpress News',
			'id'     => 'saswp-wordpress-news-checkbox',                        
                        'name'   => 'saswp-wordpress-news-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wordpress_news'),
                        'hidden' => array(
                                'id'   => 'saswp-wordpress-news',
                                'name' => 'sd_data[saswp-wordpress-news]',                             
                        )
		);
        
        $ampforwp = array(
			'label'  => 'AMPforWP',
			'id'     => 'saswp-ampforwp-checkbox',                        
                        'name'   => 'saswp-ampforwp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('ampforwp'),
                        'hidden' => array(
                                'id'   => 'saswp-ampforwp',
                                'name' => 'sd_data[saswp-ampforwp]',                             
                        )
		);
        $bunyadamp = array(
                'label'  => 'BunyadAMP',
                'id'     => 'saswp-bunyadamp-checkbox',                        
                'name'   => 'saswp-bunyadamp-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('bunyadamp'),
                'hidden' => array(
                        'id'   => 'saswp-bunyadamp',
                        'name' => 'sd_data[saswp-bunyadamp]',                             
                )
        );
        $ampbyautomatic = array(
			'label'  => 'AMP By Automatic',
			'id'     => 'saswp-ampbyautomatic-checkbox',                        
                        'name'   => 'saswp-ampbyautomatic-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('ampbyautomatic'),
                        'hidden' => array(
                                'id'   => 'saswp-ampbyautomatic',
                                'name' => 'sd_data[saswp-ampbyautomatic]',                             
                        )
                );
        $wpreviewslider = array(
                'label'  => 'WP Review Slider',
                'id'     => 'saswp-wpreviewslider-checkbox',                        
                'name'   => 'saswp-wpreviewslider-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpreviewslider'),
                'hidden' => array(
                        'id'   => 'saswp-wpreviewslider',
                        'name' => 'sd_data[saswp-wpreviewslider]',                             
                )
        );        
        $jetpackrecipe = array(
                'label'  => 'JetPack Recipes',
                'id'     => 'saswp-jetpackrecipe-checkbox',                        
                'name'   => 'saswp-jetpackrecipe-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('jetpackrecipe'),
                'hidden' => array(
                        'id'   => 'saswp-jetpackrecipe',
                        'name' => 'sd_data[saswp-jetpackrecipe]',                             
                )
        );

        $cmp = array(
                'label'  => 'CMP – Coming Soon & Maintenance Plugin',
                'id'     => 'saswp-cmp-checkbox',                        
                'name'   => 'saswp-cmp-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('cmp'),
                'hidden' => array(
                        'id'   => 'saswp-cmp',
                        'name' => 'sd_data[saswp-cmp]',                             
                )
        );
        
        
        $wpecommerce = array(
                'label'  => 'WP eCommerce',
                'id'     => 'saswp-wpecommerce-checkbox',                        
                'name'   => 'saswp-wpecommerce-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpecommerce'),
                'hidden' => array(
                        'id'   => 'saswp-wpecommerce',
                        'name' => 'sd_data[saswp-wpecommerce]',                             
                )
        );
        $wpreviewpro = array(
                'label'  => 'WP Review Pro',
                'id'     => 'saswp-wpreviewpro-checkbox',                        
                'name'   => 'saswp-wpreviewpro-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpreviewpro'),
                'hidden' => array(
                        'id'   => 'saswp-wpreviewpro',
                        'name' => 'sd_data[saswp-wpreviewpro]',                             
                )
        );        
        $webstories = array(
                'label'  => 'Web Stories',
                'id'     => 'saswp-webstories-checkbox',                        
                'name'   => 'saswp-webstories-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('webstories'),
                'hidden' => array(
                        'id'   => 'saswp-webstories',
                        'name' => 'sd_data[saswp-webstories]',                             
                )
        );        
        $elementor_testimonial = array(
			'label'  => 'Elementor Testimonial',
			'id'     => 'saswp-elementor-checkbox',                        
                        'name'   => 'saswp-elementor-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('elementor'),
                        'hidden' => array(
                                'id'   => 'saswp-elementor',
                                'name' => 'sd_data[saswp-elementor]',                             
                        )
        );
        
        $brb = array(
                'label'  => 'Business Reviews Bundle',
                'id'     => 'saswp-brb-checkbox',                        
                'name'   => 'saswp-brb-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('brb'),
                'hidden' => array(
                        'id'   => 'saswp-brb',
                        'name' => 'sd_data[saswp-brb]',                             
                )
        );

        $ratingform = array(
                'label'  => 'Rating Form by SerdarG',
                'id'     => 'saswp-ratingform-checkbox',                        
                'name'   => 'saswp-ratingform-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ratingform'),
                'hidden' => array(
                        'id'   => 'saswp-ratingform',
                        'name' => 'sd_data[saswp-ratingform]',                             
                )
        );        

        $polylang = array(
                'label'  => 'Polylang',
                'id'     => 'saswp-polylang-checkbox',                        
                'name'   => 'saswp-polylang-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('polylang'),
                'hidden' => array(
                        'id'   => 'saswp-polylang',
                        'name' => 'sd_data[saswp-polylang]',                             
                )
        ); 
        
        $autolistings = array(
                'label'  => 'Auto Listings',
                'id'     => 'saswp-autolistings-checkbox',                        
                'name'   => 'saswp-autolistings-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('autolistings'),
                'hidden' => array(
                        'id'   => 'saswp-autolistings',
                        'name' => 'sd_data[saswp-autolistings]',                             
                )
        ); 
        
        $wpml = array(
                'label'  => 'WPML',
                'id'     => 'saswp-wpml-checkbox',                        
                'name'   => 'saswp-wpml-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpml'),
                'hidden' => array(
                        'id'   => 'saswp-wpml',
                        'name' => 'sd_data[saswp-wpml]',                             
                )
        );  

        $simplejobboard        = array(
                'label'  => 'Simple Job Board',
                'id'     => 'saswp-simplejobboard-checkbox',                        
                'name'   => 'saswp-simplejobboard-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('simplejobboard'),
                'hidden' => array(
                        'id'   => 'saswp-simplejobboard',
                        'name' => 'sd_data[saswp-simplejobboard]',                             
                )
        );

        $wpjobmanager        = array(
                'label'  => 'WP Job Manager',
                'id'     => 'saswp-wpjobmanager-checkbox',                        
                'name'   => 'saswp-wpjobmanager-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpjobmanager'),
                'hidden' => array(
                        'id'   => 'saswp-wpjobmanager',
                        'name' => 'sd_data[saswp-wpjobmanager]',                             
                )
        );

        $wpjobopenings        = array(
                'label'  => 'WP Job Openings',
                'id'     => 'saswp-wpjobopenings-checkbox',                        
                'name'   => 'saswp-wpjobopenings-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpjobopenings'),
                'hidden' => array(
                        'id'   => 'saswp-wpjobopenings',
                        'name' => 'sd_data[saswp-wpjobopenings]',                             
                )
        );

        $schemaforfaqs = array(
                'label'  => 'FAQ Schema Markup',
                'id'     => 'saswp-schemaforfaqs-checkbox',                        
                'name'   => 'saswp-schemaforfaqs-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('schemaforfaqs'),
                'hidden' => array(
                        'id'   => 'saswp-schemaforfaqs',
                        'name' => 'sd_data[saswp-schemaforfaqs]',                             
                )
        );

        $quickandeasyfaq = array(
                'label'  => 'Quick and Easy FAQs',
                'id'     => 'saswp-quickandeasyfaq-checkbox',                        
                'name'   => 'saswp-quickandeasyfaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('quickandeasyfaq'),
                'hidden' => array(
                        'id'   => 'saswp-quickandeasyfaq',
                        'name' => 'sd_data[saswp-quickandeasyfaq]',                             
                )
        );

        $easyfaqs        = array(
                'label'  => 'Easy FAQs',
                'id'     => 'saswp-easyfaqs-checkbox',                        
                'name'   => 'saswp-easyfaqs-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('easyfaqs'),
                'hidden' => array(
                        'id'   => 'saswp-easyfaqs',
                        'name' => 'sd_data[saswp-easyfaqs]',                             
                )
        );

        $accordionfaq = array(
                'label'  => 'Accordion FAQ',
                'id'     => 'saswp-accordionfaq-checkbox',                        
                'name'   => 'saswp-accordionfaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('accordionfaq'),
                'hidden' => array(
                        'id'   => 'saswp-accordionfaq',
                        'name' => 'sd_data[saswp-accordionfaq]',                             
                )
        );

        $ultimatefaqs = array(
                'label'  => 'Ultimate FAQs',
                'id'     => 'saswp-ultimatefaqs-checkbox',                        
                'name'   => 'saswp-ultimatefaqs-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ultimatefaqs'),
                'hidden' => array(
                        'id'   => 'saswp-ultimatefaqs',
                        'name' => 'sd_data[saswp-ultimatefaqs]',                             
                )
        );

        $ultimatemember = array(
                'label'  => 'Ultimate Member – User Profile, User Registration, Login & Membership Plugin',
                'id'     => 'saswp-ultimatemember-checkbox',                        
                'name'   => 'saswp-ultimatemember-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ultimatemember'),
                'hidden' => array(
                        'id'   => 'saswp-ultimatemember',
                        'name' => 'sd_data[saswp-ultimatemember]',                             
                )
        );
        $showcaseidx = array(
                'label'  => 'Showcase IDX',
                'id'     => 'saswp-showcaseidx-checkbox',                        
                'name'   => 'saswp-showcaseidx-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('showcaseidx'),
                'hidden' => array(
                        'id'   => 'saswp-showcaseidx',
                        'name' => 'sd_data[saswp-showcaseidx]',                             
                )
        );

        $arconixfaq   = array(
                'label'  => 'Arconix FAQ',
                'id'     => 'saswp-arconixfaq-checkbox',                        
                'name'   => 'saswp-arconixfaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('arconixfaq'),
                'hidden' => array(
                        'id'   => 'saswp-arconixfaq',
                        'name' => 'sd_data[saswp-arconixfaq]',                             
                )
        );

        $accordion   = array(
                'label'  => 'Accordion By PickPlugins',
                'id'     => 'saswp-accordion-checkbox',                        
                'name'   => 'saswp-accordion-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('accordion'),
                'hidden' => array(
                        'id'   => 'saswp-accordion',
                        'name' => 'sd_data[saswp-accordion]',                             
                )
        );

        $faqconcertina        = array(
                'label'  => 'FAQ Concertina',
                'id'     => 'saswp-faqconcertina-checkbox',                        
                'name'   => 'saswp-faqconcertina-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('faqconcertina'),
                'hidden' => array(
                        'id'   => 'saswp-faqconcertina',
                        'name' => 'sd_data[saswp-faqconcertina]',                             
                )
        );

        $faqschemaforpost        = array(
                'label'  => 'FAQ Schema For Pages And Posts',
                'id'     => 'saswp-faqschemaforpost-checkbox',                        
                'name'   => 'saswp-faqschemaforpost-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('faqschemaforpost'),
                'hidden' => array(
                        'id'   => 'saswp-faqschemaforpost',
                        'name' => 'sd_data[saswp-faqschemaforpost]',                             
                )
        );

        $wpfaqschemamarkup        = array(
                'label'  => 'WP FAQ Schema Markup for SEO',
                'id'     => 'saswp-wpfaqschemamarkup-checkbox',                        
                'name'   => 'saswp-wpfaqschemamarkup-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpfaqschemamarkup'),
                'hidden' => array(
                        'id'   => 'saswp-wpfaqschemamarkup',
                        'name' => 'sd_data[saswp-wpfaqschemamarkup]',                             
                )
        );

        $webfaq10        = array(
                'label'  => '10WebFAQ',
                'id'     => 'saswp-webfaq10-checkbox',                        
                'name'   => 'saswp-webfaq10-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('webfaq10'),
                'hidden' => array(
                        'id'   => 'saswp-webfaq10',
                        'name' => 'sd_data[saswp-webfaq10]',                             
                )
        );

        $masteraccordion        = array(
                'label'  => 'Master Accordion',
                'id'     => 'saswp-masteraccordion-checkbox',                        
                'name'   => 'saswp-masteraccordion-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('masteraccordion'),
                'hidden' => array(
                        'id'   => 'saswp-masteraccordion',
                        'name' => 'sd_data[saswp-masteraccordion]',                             
                )
        );

        $html5responsivefaq   = array(
                'label'  => 'HTML5 Responsive FAQ',
                'id'     => 'saswp-html5responsivefaq-checkbox',                        
                'name'   => 'saswp-html5responsivefaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('html5responsivefaq'),
                'hidden' => array(
                        'id'   => 'saswp-html5responsivefaq',
                        'name' => 'sd_data[saswp-html5responsivefaq]',                             
                )
        );

        $wpresponsivefaq = array(
                'label'  => 'WP responsive FAQ with category plugin',
                'id'     => 'saswp-wpresponsivefaq-checkbox',                        
                'name'   => 'saswp-wpresponsivefaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpresponsivefaq'),
                'hidden' => array(
                        'id'   => 'saswp-wpresponsivefaq',
                        'name' => 'sd_data[saswp-wpresponsivefaq]',                             
                )
        );

        $ameliabooking = array(
                'label'  => 'Amelia Booking',
                'id'     => 'saswp-ameliabooking-checkbox',                        
                'name'   => 'saswp-ameliabooking-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ameliabooking'),
                'hidden' => array(
                        'id'   => 'saswp-ameliabooking',
                        'name' => 'sd_data[saswp-ameliabooking]',                             
                )
        );

        $easyaccordion = array(
                'label'  => 'Easy Accordion',
                'id'     => 'saswp-easyaccordion-checkbox',                        
                'name'   => 'saswp-easyaccordion-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('easyaccordion'),
                'hidden' => array(
                        'id'   => 'saswp-easyaccordion',
                        'name' => 'sd_data[saswp-easyaccordion]',                             
                )
        );

        $helpiefaq = array(
                'label'  => 'Helpie FAQ',
                'id'     => 'saswp-helpiefaq-checkbox',                        
                'name'   => 'saswp-helpiefaq-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('helpiefaq'),
                'hidden' => array(
                        'id'   => 'saswp-helpiefaq',
                        'name' => 'sd_data[saswp-helpiefaq]',                             
                )
        );

        $mooberrybm = array(
                'label'  => 'Mooberry Book Manager',
                'id'     => 'saswp-mooberrybm-checkbox',                        
                'name'   => 'saswp-mooberrybm-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('mooberrybm'),
                'hidden' => array(
                        'id'   => 'saswp-mooberrybm',
                        'name' => 'sd_data[saswp-mooberrybm]',                             
                )
        );

        $novelist = array(
                'label'  => 'Novelist',
                'id'     => 'saswp-novelist-checkbox',                        
                'name'   => 'saswp-novelist-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('novelist'),
                'hidden' => array(
                        'id'   => 'saswp-novelist',
                        'name' => 'sd_data[saswp-novelist]',                             
                )
        );
                        
        $total_recipe_generator = array(
			'label'  => 'Total Recipe Generator',
			'id'     => 'saswp-total-recipe-generator-checkbox',                        
                        'name'   => 'saswp-total-recipe-generator-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('total_recipe_generator'),
                        'hidden' => array(
                                'id'   => 'saswp-total-recipe-generator',
                                'name' => 'sd_data[saswp-total-recipe-generator]',                             
                        )
                );
        $wp_customer_review = array(
                'label'  => 'WP Customer Reviews',
                'id'     => 'saswp-wp-customer-reviews-checkbox',                        
                'name'   => 'saswp-wp-customer-reviews-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wp_customer_reviews'),
                'hidden' => array(
                        'id'   => 'saswp-wp-customer-reviews',
                        'name' => 'sd_data[saswp-wp-customer-reviews]',                             
                )
        );        
        $simple_author_box = array(
                'label'  => 'Simple Author Box',
                'id'     => 'saswp-simple-author-box-checkbox',                        
                'name'   => 'saswp-simple-author-box-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('simple_author_box'),
                'hidden' => array(
                        'id'   => 'saswp-simple-author-box',
                        'name' => 'sd_data[saswp-simple-author-box]',                             
                )
        );        
        $ampwp = array(
			'label'  => 'AMP WP',
			'id'     => 'saswp-ampwp-checkbox',                        
                        'name'   => 'saswp-ampwp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('ampwp'),
                        'hidden' => array(
                                'id'   => 'saswp-ampwp',
                                'name' => 'sd_data[saswp-ampwp]',                             
                        )
		);
        $tevolution_events = array(
			'label'  => 'Tevolution Events',
			'id'     => 'saswp-tevolution-events-checkbox',                        
                        'name'   => 'saswp-tevolution-events-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('tevolution_events'),
                        'hidden' => array(
                                'id'   => 'saswp-tevolution-events',
                                'name' => 'sd_data[saswp-tevolution-events]',                             
                        )
                );

        $xo_event_calendar   = array(
                'label'  => 'XO Event Calendar',
                'id'     => 'saswp-xo-event-calendar-checkbox',                        
                'name'   => 'saswp-xo-event-calendar-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('xo_event_calendar'),
                'hidden' => array(
                        'id'   => 'saswp-xo-event-calendar',
                        'name' => 'sd_data[saswp-xo-event-calendar]',                             
                )
        );
        
        $events_schedule   = array(
                'label'  => 'Events Schedule',
                'id'     => 'saswp-events-schedule-checkbox',                        
                'name'   => 'saswp-events-schedule-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('events_schedule'),
                'hidden' => array(
                        'id'   => 'saswp-events-schedule',
                        'name' => 'sd_data[saswp-events-schedule]',                             
                )
        );

        $calendarize_it   = array(
                'label'  => 'Calendarize it! for WordPress',
                'id'     => 'saswp-calendarize-it-checkbox',                        
                'name'   => 'saswp-calendarize-it-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('calendarize_it'),
                'hidden' => array(
                        'id'   => 'saswp-calendarize-it',
                        'name' => 'sd_data[saswp-calendarize-it]',                             
                )
        );
        
        $woo_event_manager  = array(
                'label'  => 'WooCommerce Event Manager',
                'id'     => 'saswp-woo-event-manager-checkbox',                        
                'name'   => 'saswp-woo-event-manager-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('woo_event_manager'),
                'hidden' => array(
                                'id'   => 'saswp-woo-event-manager',
                                'name' => 'sd_data[saswp-woo-event-manager]',                             
                )
        );

        $vs_event_list   = array(
                'label'  => 'Very Simple Event List',
                'id'     => 'saswp-vs-event-list-checkbox',                        
                'name'   => 'saswp-vs-event-list-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('vs_event_list'),
                'hidden' => array(
                        'id'   => 'saswp-vs-event-list',
                        'name' => 'sd_data[saswp-vs-event-list]',                             
                )
        );

        $timetable_event = array(
                'label'  => 'Timetable and Event Schedule by MotoPress',
                'id'     => 'saswp-timetable-event-checkbox',                        
                'name'   => 'saswp-timetable-event-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('timetable_event'),
                'hidden' => array(
                        'id'   => 'saswp-timetable-event',
                        'name' => 'sd_data[saswp-timetable-event]',                             
                )
        );        
        $stachethemes_events = array(
                'label'  => 'Stachethemes Event Calendar',
                'id'     => 'saswp-stachethemes-event-calendar-checkbox',                        
                'name'   => 'saswp-stachethemes-event-calendar-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('stachethemes_event_calendar'),
                'hidden' => array(
                        'id'   => 'saswp-stachethemes-event-calendar',
                        'name' => 'sd_data[saswp-stachethemes-event-calendar]',                             
                )
        );        
        $wp_event_aggregator = array(
			'label'  => 'WP Event Aggregator',
			'id'     => 'saswp-wp-event-aggregator-checkbox',                        
                        'name'   => 'saswp-wp-event-aggregator-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wp_event_aggregator'),
                        'hidden' => array(
                                'id'   => 'saswp-wp-event-aggregator',
                                'name' => 'sd_data[saswp-wp-event-aggregator]',                             
                        )
        );
        $all_in_one_event_calendar = array(
                'label'  => 'All In One Event Calendar',
                'id'     => 'saswp-all-in-one-event-calendar-checkbox',                        
                'name'   => 'saswp-all-in-one-event-calendar-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('all_in_one_event_calendar'),
                'hidden' => array(
                        'id'   => 'saswp-all-in-one-event-calendar',
                        'name' => 'sd_data[saswp-all-in-one-event-calendar]',                             
                )
        ); 
        $event_on = array(
                'label'  => 'Event On / Event On Lite',
                'id'     => 'saswp-event-on-checkbox',                        
                'name'   => 'saswp-event-on-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('event_on'),
                'hidden' => array(
                        'id'   => 'saswp-event-on',
                        'name' => 'sd_data[saswp-event-on]',                             
                )
        );        
        $betteramp = array(
			'label'  => 'Better AMP',
			'id'     => 'saswp-betteramp-checkbox',                        
                        'name'   => 'saswp-betteramp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('betteramp'),
                        'hidden' => array(
                                'id'   => 'saswp-betteramp',
                                'name' => 'sd_data[saswp-betteramp]',                             
                        )
		);
        $wpamp = array(
			'label'  => 'WP AMP',
			'id'     => 'saswp-wpamp-checkbox',                        
                        'name'   => 'saswp-wpamp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wpamp'),
                        'hidden' => array(
                                'id'   => 'saswp-wpamp',
                                'name' => 'sd_data[saswp-wpamp]',                             
                        )
		);
        
        $taqyeem = array(
			'label'  => 'Taqyeem',
			'id'     => 'saswp-taqyeem-checkbox',                        
                        'name'   => 'saswp-taqyeem-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('taqyeem'),
                        'hidden' => array(
                                'id'   => 'saswp-taqyeem',
                                'name' => 'sd_data[saswp-taqyeem]',                             
                        )
                );
        $wp_product_review = array(
                'label'  => 'WP Product Review',
                'id'     => 'saswp-wp-product-review-checkbox',                        
                'name'   => 'saswp-wp-product-review-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wp_product_review'),
                'hidden' => array(
                        'id'   => 'saswp-wp-product-review',
                        'name' => 'sd_data[saswp-wp-product-review]',                             
                )
        ); 
        $stamped = array(
                'label'  => 'Stamped.io Product Reviews',
                'id'     => 'saswp-stamped-checkbox',                        
                'name'   => 'saswp-stamped-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('stamped'),
                'hidden' => array(
                        'id'   => 'saswp-stamped',
                        'name' => 'sd_data[saswp-stamped]',                             
                )
        );        
        $smart_crawl = array(
			'label'  => 'SmartCrawl Seo',
			'id'     => 'saswp-smart-crawl-checkbox',                        
                        'name'   => 'saswp-smart-crawl-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('smart_crawl'),
                        'hidden' => array(
                                'id'   => 'saswp-smart-crawl',
                                'name' => 'sd_data[saswp-smart-crawl]',                             
                        )
		);
        
        $the_seo_framework = array(
			'label'  => 'The SEO Framework',
			'id'     => 'saswp-the-seo-framework-checkbox',                        
                        'name'   => 'saswp-the-seo-framework-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('the_seo_framework'),
                        'hidden' => array(
                                'id'   => 'saswp-the-seo-framework',
                                'name' => 'sd_data[saswp-the-seo-framework]',                             
                        )
		);
        $homeland_theme = array(
			'label'  => 'HomeLand Theme',
			'id'     => 'saswp-homeland-checkbox',                        
                        'name'   => 'saswp-homeland-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox', 
                        'note'   => saswp_get_field_note('homeland'),
                        'hidden' => array(
                                'id'   => 'saswp-homeland',
                                'name' => 'sd_data[saswp-homeland]',                             
                        )
                );
        $ranna_recipe = array(
                'label'  => 'Ranna - Food & Recipe',
                'id'     => 'saswp-rannarecipe-checkbox',                        
                'name'   => 'saswp-rannarecipe-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox', 
                'note'   => saswp_get_field_note('rannarecipe'),
                'hidden' => array(
                        'id'   => 'saswp-rannarecipe',
                        'name' => 'sd_data[saswp-rannarecipe]',                             
                )
        );        
        $ratency = array(
                'label'  => 'Ratency - Review & Magazine Theme',
                'id'     => 'saswp-ratency-checkbox',                        
                'name'   => 'saswp-ratency-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox', 
                'note'   => saswp_get_field_note('ratency'),
                'hidden' => array(
                        'id'   => 'saswp-ratency',
                        'name' => 'sd_data[saswp-ratency]',                             
                )
        );        
        $real_homes = array(
			'label'  => 'RealHomes Theme',
			'id'     => 'saswp-realhomes-checkbox',                        
                        'name'   => 'saswp-realhomes-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('realhomes'),
                        'hidden' => array(
                                'id'   => 'saswp-realhomes',
                                'name' => 'sd_data[saswp-realhomes]',                             
                        )
		);
        $wpresidence = array(
			'label'  => 'WP Residence Theme',
			'id'     => 'saswp-wpresidence-checkbox',                        
                        'name'   => 'saswp-wpresidence-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wpresidence'),
                        'hidden' => array(
                                'id'   => 'saswp-wpresidence',
                                'name' => 'sd_data[saswp-wpresidence]',                             
                        )
                );
        $myhome = array(
                'label'  => 'My Home Theme',
                'id'     => 'saswp-myhome-checkbox',                        
                'name'   => 'saswp-myhome-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('myhome'),
                'hidden' => array(
                        'id'   => 'saswp-myhome',
                        'name' => 'sd_data[saswp-myhome]',                             
                )
        ); 

        $classipress = array(
                'label'  => 'ClassiPress',
                'id'     => 'saswp-classipress-checkbox',                        
                'name'   => 'saswp-classipress-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('classipress'),
                'hidden' => array(
                        'id'   => 'saswp-classipress',
                        'name' => 'sd_data[saswp-classipress]',                             
                )
        ); 
        
        $realestate_5 = array(
                'label'  => 'WP Pro Real Estate 5',
                'id'     => 'saswp-realestate-5-checkbox',                        
                'name'   => 'saswp-realestate-5-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('realestate_5'),
                'hidden' => array(
                        'id'   => 'saswp-realestate-5',
                        'name' => 'sd_data[saswp-realestate-5]',                             
                )
        );

        $realestate_7 = array(
                'label'  => 'WP Pro Real Estate 7',
                'id'     => 'saswp-realestate-7-checkbox',                        
                'name'   => 'saswp-realestate-7-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('realestate_7'),
                'hidden' => array(
                        'id'   => 'saswp-realestate-7',
                        'name' => 'sd_data[saswp-realestate-7]',                             
                )
        );
        
        $geo_directory = array(
                'label'  => 'GeoDirectory – Business Directory Plugin',
                'id'     => 'saswp-geodirectory-checkbox',                        
                'name'   => 'saswp-geodirectory-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('geodirectory'),
                'hidden' => array(
                        'id'   => 'saswp-geodirectory',
                        'name' => 'sd_data[saswp-geodirectory]',                             
                )
        );
        
        $learn_press = array(
			'label'  => 'LearnPress',
			'id'     => 'saswp-learn-press-checkbox',                        
                        'name'   => 'saswp-learn-press-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('learn_press'),
                        'hidden' => array(
                                'id'   => 'saswp-learn-press',
                                'name' => 'sd_data[saswp-learn-press]',                             
                )
	);
        
        $learn_dash = array(
			'label'  => 'LearnDash',
			'id'     => 'saswp-learn-dash-checkbox',                        
                        'name'   => 'saswp-learn-dash-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',  
                        'note'   => saswp_get_field_note('learn_dash'),
                        'hidden' => array(
                                'id'   => 'saswp-learn-dash',
                                'name' => 'sd_data[saswp-learn-dash]',                             
                )
        );
        $wplms = array(
                'label'  => 'WPLMS',
                'id'     => 'saswp-wplms-checkbox',                        
                'name'   => 'saswp-wplms-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',  
                'note'   => saswp_get_field_note('wplms'),
                'hidden' => array(
                        'id'   => 'saswp-wplms',
                        'name' => 'sd_data[saswp-wplms]',                             
        )
        );
        
        $lifter_lms = array(
			'label'  => 'LifterLMS',
			'id'     => 'saswp-lifter-lms-checkbox',                        
                        'name'   => 'saswp-lifter-lms-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('lifter_lms'),
                        'hidden' => array(
                                'id'   => 'saswp-lifter-lms',
                                'name' => 'sd_data[saswp-lifter-lms]',                             
                )
        );
        
        $senseilms = array(
                'label'  => 'Sensei LMS',
                'id'     => 'saswp-senseilms-checkbox',                        
                'name'   => 'saswp-senseilms-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('senseilms'),
                'hidden' => array(
                        'id'   => 'saswp-senseilms',
                        'name' => 'sd_data[saswp-senseilms]',                             
                )
        );

        $wp_event_manager = array(
			'label'  => 'WP Event Manager',
			'id'     => 'saswp-wp-event-manager-checkbox',                        
                        'name'   => 'saswp-wp-event-manager-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wp_event_manager'),
                        'hidden' => array(
                                'id'   => 'saswp-wp-event-manager',
                                'name' => 'sd_data[saswp-wp-event-manager]',                             
                )
	);

        $wp_event_solution = array(
                        'label'  => 'Eventin',
                        'id'     => 'saswp-wp-event-solution-checkbox', 
                        'name'   => 'saswp-wp-event-solution-checkbox',
                        'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',      
                        'note'   => saswp_get_field_note('wp_event_solution'),
                        'hidden' => array(
                                'id'   => 'saswp-wp-event-solution',
                                'name' => 'sd_data[saswp-wp-event-solution]',                             
                        )
        );
        
        $events_manager = array(
			'label'  => 'Events Manager',
			'id'     => 'saswp-events-manager-checkbox',                        
                        'name'   => 'saswp-events-manager-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('events_manager'),
                        'hidden' => array(
                                'id'   => 'saswp-events-manager',
                                'name' => 'sd_data[saswp-events-manager]',                             
                )
	);
        
        $events_calendar_wd = array(
			'label'  => 'Event Calendar WD',
			'id'     => 'saswp-event-calendar-wd-checkbox',                        
                        'name'   => 'saswp-event-calendar-wd-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('event_calendar_wd'),
                        'hidden' => array(
                                'id'   => 'saswp-event-calendar-wd',
                                'name' => 'sd_data[saswp-event-calendar-wd]',                             
                )
	);
        
        $event_organiser = array(
			'label'  => 'Event Organiser',
			'id'     => 'saswp-event-organiser-checkbox',                        
                        'name'   => 'saswp-event-organiser-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('event_organiser'),
                        'hidden' => array(
                                'id'   => 'saswp-event-organiser',
                                'name' => 'sd_data[saswp-event-organiser]',                             
                )
	);
        
        $modern_events_calendar = array(
			'label'  => 'Modern Events Calendar',
			'id'     => 'saswp-modern-events-calendar-checkbox',                        
                        'name'   => 'saswp-modern-events-calendar-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('modern_events_calendar'),
                        'hidden' => array(
                                'id'   => 'saswp-modern-events-calendar',
                                'name' => 'sd_data[saswp-modern-events-calendar]',                             
                )
	);
                
        $seo_press = array(
			'label'  => 'SEOPress',
			'id'     => 'saswp-seo-press-checkbox',                        
                        'name'   => 'saswp-seo-press-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('seo_press'),
                        'hidden' => array(
                                'id'   => 'saswp-seo-press',
                                'name' => 'sd_data[saswp-seo-press]',                             
                        )
		);
        $squirrly_seo = array(
			'label'  => 'Squirrly Seo',
			'id'     => 'saswp-squirrly-seo-checkbox',                        
                        'name'   => 'saswp-squirrly-seo-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('squirrly_seo'),
                        'hidden' => array(
                                'id'   => 'saswp-squirrly-seo',
                                'name' => 'sd_data[saswp-squirrly-seo]',                             
                        )
		);
        $aiosp = array(
			'label'  => 'All in One SEO Pack',
			'id'     => 'saswp-aiosp-checkbox',                        
                        'name'   => 'saswp-aiosp-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('aiosp'),
                        'hidden' => array(
                                'id'   => 'saswp-aiosp',
                                'name' => 'sd_data[saswp-aiosp]',                             
                        )
		);        
        
        $recipe_maker = array(
			'label'  => 'WP Recipe Maker',
			'id'     => 'saswp-wp-recipe-maker-checkbox',                        
                        'name'   => 'saswp-wp-recipe-maker-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wp_recipe_maker'),
                        'hidden' => array(
                                'id'   => 'saswp-wp-recipe-maker',
                                'name' => 'sd_data[saswp-wp-recipe-maker]',                             
                        )
                );

        $wpzoom = array(
                'label'  => 'Recipe Card Blocks by WPZOOM',
                'id'     => 'saswp-wpzoom-checkbox',                        
                'name'   => 'saswp-wpzoom-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpzoom'),
                'hidden' => array(
                        'id'   => 'saswp-wpzoom',
                        'name' => 'sd_data[saswp-wpzoom]',                             
                )
        );
        $video_thumbnails = array(
                'label'  => 'Video Thumbnails',
                'id'     => 'saswp-video-thumbnails-checkbox',                        
                'name'   => 'saswp-video-thumbnails-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('video_thumbnails'),
                'hidden' => array(
                        'id'   => 'saswp-video-thumbnails',
                        'name' => 'sd_data[saswp-video-thumbnails]',                             
                )
        );
        $featured_video_plus = array(
                'label'  => 'Featured Video Plus',
                'id'     => 'saswp-featured-video-plus-checkbox',                        
                'name'   => 'saswp-featured-video-plus-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('featured_video_plus'),
                'hidden' => array(
                        'id'   => 'saswp-featured-video-plus',
                        'name' => 'sd_data[saswp-featured-video-plus]',                             
                )
        );
        $yotpo = array(
                'label'  => 'Yotpo',
                'id'     => 'saswp-yotpo-checkbox',                        
                'name'   => 'saswp-yotpo-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('yotpo'),
                'hidden' => array(
                        'id'   => 'saswp-yotpo',
                        'name' => 'sd_data[saswp-yotpo]',                             
                )
        );

        $ryviu = array(
                'label'  => 'Ryviu – Product Reviews for WooCommerce',
                'id'     => 'saswp-ryviu-checkbox',                        
                'name'   => 'saswp-ryviu-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ryviu'),
                'hidden' => array(
                        'id'   => 'saswp-ryviu',
                        'name' => 'sd_data[saswp-ryviu]',                             
                )
        );

        $starsrating = array(
                'label'  => 'Stars Rating',
                'id'     => 'saswp-starsrating-checkbox',                        
                'name'   => 'saswp-starsrating-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('starsrating'),
                'hidden' => array(
                        'id'   => 'saswp-starsrating',
                        'name' => 'sd_data[saswp-starsrating]',                             
                )
        );

        $ultimate_blocks = array(
                'label'  => 'Ultimate Blocks – Gutenberg Blocks Plugin',
                'id'     => 'saswp-ultimate-blocks-checkbox',                        
                'name'   => 'saswp-ultimate-blocks-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('ultimate_blocks'),
                'hidden' => array(
                        'id'   => 'saswp-ultimate-blocks',
                        'name' => 'sd_data[saswp-ultimate-blocks]',                             
                )
        );

        $wp_tasty_recipe = array(
                'label'  => 'WP Tasty Recipe',
                'id'     => 'saswp-wptastyrecipe-checkbox',                        
                'name'   => 'saswp-wptastyrecipe-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wptastyrecipe'),
                'hidden' => array(
                        'id'   => 'saswp-wptastyrecipe',
                        'name' => 'sd_data[saswp-wptastyrecipe]',                             
                )
        );

        $recipress = array(
                'label'  => 'ReciPress',
                'id'     => 'saswp-recipress-checkbox',                        
                'name'   => 'saswp-recipress-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('recipress'),
                'hidden' => array(
                        'id'   => 'saswp-recipress',
                        'name' => 'sd_data[saswp-recipress]',                             
                )
        );        
        $wp_ultimate_recipe = array(
			'label'  => 'WP Ultimate Recipe',
			'id'     => 'saswp-wp-ultimate-recipe-checkbox',                        
                        'name'   => 'saswp-wp-ultimate-recipe-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wp_ultimate_recipe'),
                        'hidden' => array(
                                'id'   => 'saswp-wp-ultimate-recipe',
                                'name' => 'sd_data[saswp-wp-ultimate-recipe]',                             
                        )
		);
        $zip_recipes = array(
			'label'  => 'Zip Recipes',
			'id'     => 'saswp-zip-recipes-checkbox',                        
                        'name'   => 'saswp-zip-recipes-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('zip_recipes'),
                        'hidden' => array(
                                'id'   => 'saswp-zip-recipes',
                                'name' => 'sd_data[saswp-zip-recipes]',                             
                        )
		);
        $easyrecipe = array(
			'label'  => 'EasyRecipe',
			'id'     => 'saswp-easy-recipe-checkbox',                        
                        'name'   => 'saswp-easy-recipe-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('easy_recipe'),
                        'hidden' => array(
                                'id'   => 'saswp-easy-recipe',
                                'name' => 'sd_data[saswp-easy-recipe]',                             
                        )
		);
        $mediavine_create = array(
			'label'  => 'Create by Mediavine',
			'id'     => 'saswp-mediavine-create-checkbox',                        
                        'name'   => 'saswp-mediavine-create-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('mediavine_create'),
                        'hidden' => array(
                                'id'   => 'saswp-mediavine-create',
                                'name' => 'sd_data[saswp-mediavine-create]',                             
                        )
		);
        $ht_recipes = array(
			'label'  => 'HT Recipes',
			'id'     => 'saswp-ht-recipes-checkbox',                        
                        'name'   => 'saswp-ht-recipes-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('ht_recipes'),
                        'hidden' => array(
                                'id'   => 'saswp-ht-recipes',
                                'name' => 'sd_data[saswp-ht-recipes]',                             
                        )
		);
        
        $the_events_calendar = array(
			'label'  => 'The Events Calendar',
			'id'     => 'saswp-the-events-calendar-checkbox',                        
                        'name'   => 'saswp-the-events-calendar-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('the_events_calendar'),
                        'hidden' => array(
                                'id'   => 'saswp-the-events-calendar',
                                'name' => 'sd_data[saswp-the-events-calendar]',                             
                        )
		);
                        
        $kk_star = array(
			'label'  => 'kk Star Ratings',
			'id'     => 'saswp-kk-star-raring-checkbox',                        
                        'name'   => 'saswp-kk-star-raring-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('kk_star_ratings'),
                        'hidden' => array(
                                'id'   => 'saswp-kk-star-raring',
                                'name' => 'sd_data[saswp-kk-star-raring]',                             
                        )
                );

        $rmp_rating = array(
                'label'  => 'Rate my Post – WP Rating System',
                'id'     => 'saswp-rmprating-checkbox',                        
                'name'   => 'saswp-rmprating-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('rmprating'),
                'hidden' => array(
                        'id'   => 'saswp-rmprating',
                        'name' => 'sd_data[saswp-rmprating]',                             
                )
        );

        $wpdiscuz = array(
                'label'  => 'Comments – wpDiscuz',
                'id'     => 'saswp-wpdiscuz-checkbox',                        
                'name'   => 'saswp-wpdiscuz-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpdiscuz'),
                'hidden' => array(
                        'id'   => 'saswp-wpdiscuz',
                        'name' => 'sd_data[saswp-wpdiscuz]',                             
                )
        );

        $yasr = array(
			'label'  => 'Yet Another Stars Rating',
			'id'     => 'saswp-yet-another-stars-rating-checkbox',                        
                        'name'   => 'saswp-yet-another-stars-rating-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('yet_another_stars_rating'),
                        'hidden' => array(
                                'id'   => 'saswp-yet-another-stars-rating',
                                'name' => 'sd_data[saswp-yet-another-stars-rating]',                             
                        )
		);
        $wppostratings = array(
			'label'  => 'WP-PostRatings',
			'id'     => 'saswp-wppostratings-raring-checkbox',                        
                        'name'   => 'saswp-wppostratings-raring-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wp_post_ratings'),
                        'hidden' => array(
                                'id'   => 'saswp-wppostratings-raring',
                                'name' => 'sd_data[saswp-wppostratings-raring]',                             
                        )
		);
        $woocommerce = array(
			'label'  => 'Woocommerce',
			'id'     => 'saswp-woocommerce-checkbox',                        
                        'name'   => 'saswp-woocommerce-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('woocommerce'),
                        'hidden' => array(
                                'id'   => 'saswp-woocommerce',
                                'name' => 'sd_data[saswp-woocommerce]',                             
                        )
		);
        $woocommerce_bok = array(
			'label'  => 'Woocommerce Booking',
			'id'     => 'saswp-woocommerce-booking-checkbox',                        
                        'name'   => 'saswp-woocommerce-booking-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('woocommerce_bookings'),
                        'hidden' => array(
                                'id'   => 'saswp-woocommerce-booking',
                                'name' => 'sd_data[saswp-woocommerce-booking]',                             
                        )
		);
        
        $cooked = array(
			'label'  => 'Cooked',
			'id'     => 'saswp-cooked-checkbox',                        
                        'name'   => 'saswp-cooked-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('cooked'),
                        'hidden' => array(
                                'id'   => 'saswp-cooked',
                                'name' => 'sd_data[saswp-cooked]',                             
                        )
		);
        
        $woocommerce_mem = array(
			'label'  => 'Woocommerce Membership',
			'id'     => 'saswp-woocommerce-membership-checkbox',                        
                        'name'   => 'saswp-woocommerce-membership-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('woocommerce_membership'),
                        'hidden' => array(
                                'id'   => 'saswp-woocommerce-membership',
                                'name' => 'sd_data[saswp-woocommerce-membership]',                             
                        )
		);
        
        $extratheme = array(
			'label'  => 'Extra Theme By Elegant',
			'id'     => 'saswp-extra-checkbox',                        
                        'name'   => 'saswp-extra-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('extra'),
                        'hidden' => array(
                                'id'   => 'saswp-extra',
                                'name' => 'sd_data[saswp-extra]',                             
                        )
		);
        $soledad = array(
			'label'  => 'Soledad Theme',
			'id'     => 'saswp-soledad-checkbox',                        
                        'name'   => 'saswp-soledad-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('soledad'),
                        'hidden' => array(
                                'id'   => 'saswp-soledad',
                                'name' => 'sd_data[saswp-soledad]',                             
                        )
                );
        $enfold = array(
                'label'  => 'Enfold Theme',
                'id'     => 'saswp-enfold-checkbox',                        
                'name'   => 'saswp-enfold-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('enfold'),
                'hidden' => array(
                        'id'   => 'saswp-enfold',
                        'name' => 'sd_data[saswp-enfold]',                             
                )
        );
        $reviews_wp_theme = array(
                'label'  => 'Reviews WP Theme',
                'id'     => 'saswp-wp-theme-reviews-checkbox',                        
                'name'   => 'saswp-wp-theme-reviews-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('reviews'),
                'hidden' => array(
                        'id'   => 'saswp-wp-theme-reviews',
                        'name' => 'sd_data[saswp-wp-theme-reviews]',                             
                )
        );        
        $sabaidiscuss = array(
                'label'  => 'SabaiDiscuss',
                'id'     => 'saswp-sabaidiscuss-checkbox',                        
                'name'   => 'saswp-sabaidiscuss-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('sabaidiscuss'),
                'hidden' => array(
                            'id'   => 'saswp-sabaidiscuss',
                            'name' => 'sd_data[saswp-sabaidiscuss]',                             
                )
        );
        $dwquestiton = array(
			'label'  => 'DW Question Answer',
			'id'     => 'saswp-dw-question-answer-checkbox',                        
                        'name'   => 'saswp-dw-question-answer-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('dw_qna'),
                        'hidden' => array(
                                    'id'   => 'saswp-dw-question-answer',
                                    'name' => 'sd_data[saswp-dw-question-answer]',                             
                        )
                );
        $wpqa_builder = array(
                'label'  => 'WPQA Builder',
                'id'     => 'saswp-wpqa-checkbox',                        
                'name'   => 'saswp-wpqa-checkbox',
                'type'   => 'checkbox',
                'class'  => 'checkbox saswp-checkbox',
                'note'   => saswp_get_field_note('wpqa'),
                'hidden' => array(
                                'id'   => 'saswp-wpqa',
                                'name' => 'sd_data[saswp-wpqa]',
                )
        );        
        
        $bbpress = array(
			'label'  => 'bbPress',
			'id'     => 'saswp-bbpress-checkbox',                        
                        'name'   => 'saswp-bbpress-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('bb_press'),
                        'hidden' => array(
                                    'id'   => 'saswp-bbpress',
                                    'name' => 'sd_data[saswp-bbpress]',                             
                        )
		);
                
        $yoast      = array(
			'label'   => 'Yoast SEO Plugin',
			'id'      => 'saswp-yoast-checkbox',                        
                        'name'    => 'saswp-yoast-checkbox',
			'type'    => 'checkbox',
                        'note'   => saswp_get_field_note('yoast_seo'),
                        'class'   => 'checkbox saswp-checkbox',
                        'hidden'  => array(
                                'id'   => 'saswp-yoast',
                                'name' => 'sd_data[saswp-yoast]',                             
                        )
                );
        $metatagmanager      = array(
                'label'   => 'Meta Tag Manager',
                'id'      => 'saswp-metatagmanager-checkbox',                        
                'name'    => 'saswp-metatagmanager-checkbox',
                'type'    => 'checkbox',
                'note'   => saswp_get_field_note('metatagmanager'),
                'class'   => 'checkbox saswp-checkbox',
                'hidden'  => array(
                        'id'   => 'saswp-metatagmanager',
                        'name' => 'sd_data[saswp-metatagmanager]',                             
                )
        );        
        $slimseo      = array(
                'label'   => 'Slim SEO',
                'id'      => 'saswp-slimseo-checkbox',                        
                'name'    => 'saswp-slimseo-checkbox',
                'type'    => 'checkbox',
                'note'   => saswp_get_field_note('slimseo'),
                'class'   => 'checkbox saswp-checkbox',
                'hidden'  => array(
                        'id'   => 'saswp-slimseo',
                        'name' => 'sd_data[saswp-slimseo]',                             
                )
        );        
        $rankmath      = array(
			'label'   => 'Rank Math',
			'id'      => 'saswp-rankmath-checkbox',                        
                        'name'    => 'saswp-rankmath-checkbox',
			'type'    => 'checkbox',
                        'class'   => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('rank_math'),
                        'hidden'  => array(
                                'id'   => 'saswp-rankmath',
                                'name' => 'sd_data[saswp-rankmath]',                             
                        )
		); 
        
         $easy_testimonials = array(
			'label'  => 'Easy Testimonials',
			'id'     => 'saswp-easy-testimonials-checkbox',                        
                        'name'   => 'saswp-easy-testimonials-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('easy_testimonials'),
                        'hidden' => array(
                                'id'   => 'saswp-easy-testimonials',
                                'name' => 'sd_data[saswp-easy-testimonials]',                             
                        )
		);
         $bne_testimonials = array(
			'label'  => 'BNE Testimonials',
			'id'     => 'saswp-bne-testimonials-checkbox',                        
                        'name'   => 'saswp-bne-testimonials-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('bne_testimonials'),
                        'hidden' => array(
                                'id'   => 'saswp-bne-testimonials',
                                'name' => 'sd_data[saswp-bne-testimonials]',                             
                        )
		);
         
         $testimonial_pro = array(
			'label'  => 'Testimonial Pro',
			'id'     => 'saswp-testimonial-pro-checkbox',                        
                        'name'   => 'saswp-testimonial-pro-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('testimonial_pro'),
                        'hidden' => array(
                                'id'   => 'saswp-testimonial-pro',
                                'name' => 'sd_data[saswp-testimonial-pro]',                             
                        )
		);
         $strong_testimonials = array(
			'label'  => 'Strong Testimonials',
			'id'     => 'saswp-strong-testimonials-checkbox',                        
                        'name'   => 'saswp-strong-testimonials-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('strong_testimonials'),
                        'hidden' => array(
                                'id'   => 'saswp-strong-testimonials',
                                'name' => 'sd_data[saswp-strong-testimonials]',                             
                        )
		);
         $WordLift = array(
			'label'  => 'WordLift',
			'id'     => 'saswp-wordlift-checkbox',                        
                        'name'   => 'saswp-wordlift-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('wordlift'),
                        'hidden' => array(
                                'id'   => 'saswp-wordlift',
                                'name' => 'sd_data[saswp-wordlift]',                             
                        )
		);
        
        $flex_lmx = array(
			'label'  => 'FlexMLS IDX Plugin',
			'id'     => 'saswp-flexmlx-compativility-checkbox', 
                        'name'   => 'saswp-flexmlx-compativility-checkbox',
			'type'   => 'checkbox',
                        'class'  => 'checkbox saswp-checkbox',
                        'note'   => saswp_get_field_note('flex_mls_idx'),
                        'hidden' => array(
                             'id'   => 'saswp-flexmlx-compativility',
                             'name' => 'sd_data[saswp-flexmlx-compativility]',                             
                        )
		);
                
        if(!is_plugin_active('woocommerce-compatibility-for-schema/woocommerce-compatibility-for-schema.php')){
                      
             $woocommerce_bok['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="http://structured-data-for-wp.com/woocommerce-compatibility-for-schema/">Woocommerce Addon</a>';
                                      
        }
        
        if(!is_plugin_active('cooked-compatibility-for-schema/cooked-compatibility-for-schema.php')){
                          
             $cooked['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="http://structured-data-for-wp.com/cooked-compatibility-for-schema/">Cooked Addon</a>';
             
         }
         
         if(!is_plugin_active('real-estate-schema/real-estate-schema.php')){
                          
             $homeland_theme['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $real_homes['note']     = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $wpresidence['note']    = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $myhome['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $realestate_5['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $realestate_7['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';
             $geo_directory['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';             
             $showcaseidx['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/extensions/">Real Estate Schema Addon</a>';             
                          
         }
         
         if(!is_plugin_active('course-schema-for-saswp/course-schema-for-saswp.php')){
                          
             $learn_press['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/course-schema/">Course Schema Addon</a>';
             $learn_dash['note']  = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/course-schema/">Course Schema Addon</a>';
             $lifter_lms['note']  = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/course-schema/">Course Schema Addon</a>';
             $wplms['note']       = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/course-schema/">Course Schema Addon</a>';
             $senseilms['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/course-schema/">Course Schema Addon</a>';
             
         }

         if(!is_plugin_active('jobposting-schema-compatibility/jobposting-schema-compatibility.php')){
                          
                $simplejobboard['note']      = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/jobposting-schema/">JobPosting Schema Compatibility Addon</a>';                        
                $wpjobopenings['note']       = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/jobposting-schema/">JobPosting Schema Compatibility Addon</a>';                        
                $wpjobmanager['note']        = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/jobposting-schema/">JobPosting Schema Compatibility Addon</a>';                        
          
         }

         if(!is_plugin_active('faq-schema-compatibility/faq-schema-compatibility.php')){
                          
                $quickandeasyfaq['note']      = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $accordionfaq['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $helpiefaq['note']            = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $ultimatefaqs['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $arconixfaq['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $wpresponsivefaq['note']      = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                                                                
                $easyaccordion['note']        = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $html5responsivefaq['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $faqconcertina['note']        = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $accordion['note']            = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $easyfaqs['note']             = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $masteraccordion['note']      = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $wpfaqschemamarkup['note']    = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $faqschemaforpost['note']     = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $webfaq10['note']             = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        
                $enfold['note']               = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/faq-schema/">FAQ Schema Compatibility Addon</a>';                        

         }
         if(!is_plugin_active('reviews-for-schema/reviews-for-schema.php')){
                          
                $wpreviewslider['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/reviews-for-schema/">Reviews For Schema</a>';
                $ultimatemember['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/reviews-for-schema/">Reviews For Schema</a>';
         }
         if(!is_plugin_active('polylang-compatibility-for-saswp/polylang-compatibility-for-saswp.php')){
                          
                $polylang['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/polylang-compatibility-for-saswp/">Polylang Compatibility For SASWP Addon</a>';                        
         }
         if(!is_plugin_active('classifieds-plugin-compatibility/classifieds-plugin-compatibility.php')){
                          
                $autolistings['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/classifieds-plugin-compatibility/">Classifieds Plugin Compatibility Addon</a>';
         }
         if(!is_plugin_active('wpml-schema-compatibility/wpml-schema-compatibility.php')){
                          
                $wpml['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/wpml-schema-compatibility">WPML Schema Compatibility Addon</a>';                        
         }
         if(!is_plugin_active('qanda-schema-for-saswp/qanda-schema-for-saswp.php')){
                          
                $sabaidiscuss['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/qanda-schema/">Q&A Schema Compatibility Addon</a>';                        
                $wpqa_builder['note'] = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/qanda-schema/">Q&A Schema Compatibility Addon</a>';                        
         }
       
         if(!is_plugin_active('event-schema-for-saswp/event-schema-for-saswp.php')){
                          
             $ameliabooking['note']               = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $the_events_calendar['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $events_calendar_wd['note']          = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $wp_event_manager['note']            = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $wp_event_solution['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $events_manager['note']              = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $event_organiser['note']             = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $modern_events_calendar['note']      = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';
             $tevolution_events['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $wp_event_aggregator['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $stachethemes_events['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $timetable_event['note']             = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $xo_event_calendar['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $events_schedule['note']             = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $calendarize_it['note']              = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $woo_event_manager['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $vs_event_list['note']               = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $all_in_one_event_calendar['note']   = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             $event_on['note']                    = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Event Schema Addon</a>';               
             
         }
         
         if(!is_plugin_active('recipe-schema-for-saswp/recipe-schema-for-saswp.php')){

             $jetpackrecipe['note']              = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/recipe-schema/">Recipe Schema Addon</a>';                          
             $zip_recipes['note']                = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/recipe-schema/">Recipe Schema Addon</a>';             
             $wp_ultimate_recipe['note']         = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/recipe-schema/">Recipe Schema Addon</a>';             
             $mediavine_create['note']           = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/recipe-schema/">Recipe Schema Addon</a>';             
             $ht_recipes['note']                 = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/recipe-schema/">Recipe Schema Addon</a>';
             $easyrecipe['note']                 = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Recipe Schema Addon</a>';                            
             $total_recipe_generator['note']     = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Recipe Schema Addon</a>';                            
             $ranna_recipe['note']               = saswp_t_string('This feature requires').' <a target="_blank" href="https://structured-data-for-wp.com/event-schema/">Recipe Schema Addon</a>';                            
             
         }
         
                                                 
        $field_objs = new saswp_fields_generator();
        
        $meta_fields = array(
                $ampforwp,
                $bunyadamp,
                $ampbyautomatic,
                $cmp,
                $betteramp,
                $wpamp,
                $ampwp,
                $kk_star,
                $rmp_rating,
                $elementor_testimonial,
                $brb,
                $ratingform,
                $wpdiscuz,
                $yasr,
                $wp_customer_review,
                $wpreviewslider,
                $simple_author_box,  
                $wppostratings,
                $wpreviewpro,
                $bbpress,
                $webstories,
                $wpecommerce,
                $woocommerce,                
                $woocommerce_bok,
                $woocommerce_mem,
                $cooked, 
                $soledad,
                $enfold,
                $reviews_wp_theme,
                $taqyeem,
                $wp_product_review,
                $stamped,
                $extratheme,
                $dwquestiton,
                $wpqa_builder,
                $sabaidiscuss,                
                $yoast,
                $polylang,
                $autolistings,
                $wpml,
                $metatagmanager,
                $slimseo,
                $smart_crawl,
                $seo_press,
                $the_seo_framework,
                $aiosp,
                $squirrly_seo,                
                $recipe_maker,
                $recipress,
                $jetpackrecipe,
                $wpzoom,
                $video_thumbnails,
                $featured_video_plus,
                $yotpo,
                $ryviu,
                $starsrating,
                $ultimate_blocks,
                $wp_tasty_recipe,
                $wp_ultimate_recipe,
                $zip_recipes,
                $ranna_recipe,
                $total_recipe_generator,
                $easyrecipe,
                $mediavine_create,
                $ht_recipes,
                $rankmath,
                $homeland_theme,
                $real_homes,
                $ratency,
                $wpresidence,
                $myhome,
                $classipress,
                $realestate_5,
                $realestate_7,
                $geo_directory,
                $learn_press,
                $learn_dash,
                $lifter_lms,
                $senseilms,
                $wplms,
                $ameliabooking,
                $the_events_calendar,
                $wp_event_manager,
                $wp_event_solution,
                $events_manager,
                $events_calendar_wd,
                $event_organiser,
                $modern_events_calendar,
                $tevolution_events,
                $wp_event_aggregator,
                $all_in_one_event_calendar,
                $event_on,
                $stachethemes_events,
                $timetable_event,
                $xo_event_calendar,
                $calendarize_it,
                $events_schedule,
                $woo_event_manager,
                $vs_event_list,
                $easy_testimonials,
                $bne_testimonials,
                $testimonial_pro,
                $strong_testimonials,
                $wordpress_news,
                $WordLift,
                $schemaforfaqs,
                $quickandeasyfaq,
                $simplejobboard,
                $wpjobmanager,
                $wpjobopenings,
                $accordionfaq,
                $ultimatefaqs,
                $ultimatemember,
                $showcaseidx,
                $arconixfaq,
                $faqconcertina,
                $faqschemaforpost,
                $wpfaqschemamarkup,
                $webfaq10,
                $masteraccordion,
                $easyfaqs,
                $accordion,
                $html5responsivefaq,
                $wpresponsivefaq,
                $easyaccordion,
                $helpiefaq,
                $mooberrybm,
                $novelist,
                $flex_lmx
                
	);  
                
         $flex_mlx_extra_fields = array();
         $flex_mlx_extra_fields[] = array(
                        'label' => 'Name',
			'id'    => 'sd-seller-name',
                        'name'  => 'sd_data[sd-seller-name]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
        );
         $flex_mlx_extra_fields[] = array(
                        'label' => 'Addres',
			'id'    => 'sd-seller-address',
                        'name'  => 'sd_data[sd-seller-address]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
        );
         $flex_mlx_extra_fields[] = array(
                        'label' => 'Telephone',
			'id'    => 'sd-seller-telephone',
                        'name'  => 'sd_data[sd-seller-telephone]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
        );
         $flex_mlx_extra_fields[] = array(
                        'label' => 'Price Range',
			'id'    => 'sd-seller-price-range',
                        'name'  => 'sd_data[sd-seller-price-range]',
                        'class' => 'regular-text',                        
			'type'  => 'text',
        );
        $flex_mlx_extra_fields[] = array(
			'label' => 'URL',
			'id'    => 'sd-seller-url',
                        'name'  => 'sd_data[sd-seller-url]',
                        'class' => 'regular-text',
			'type'  => 'text',
		);                                
        $flex_mlx_extra_fields[] = array(
			'label' => 'Image',
			'id'    => 'sd_seller_image',
                        'name'  => 'sd_data[sd_seller_image][url]',
                        'class' => 'saswp-sd_seller_image',
			'type'  => 'media',
	);
                
        ?> 

        <div class="saswp-compatibility-container" id="saswp-active-compatibility-container">
            
           <?php
            $act_meta_fields = $meta_fields;
             
            $active_plugins = saswp_compatible_active_list();
             
            foreach ($act_meta_fields as $key => $field){
                                  
                 if($field['hidden']['id'] == 'saswp-woocommerce-booking' || $field['hidden']['id'] == 'saswp-woocommerce-membership'){
                     
                     if(!array_search('saswp-woocommerce', $active_plugins)){
                                         
                         unset($act_meta_fields[$key]);
                     
                     }
                                          
                 }else{
                 
                     if(!array_search($field['hidden']['id'], $active_plugins)){
                                         
                         unset($act_meta_fields[$key]);
                     
                     }
                     
                 }
                 
                 
             }
            if($act_meta_fields){
                $field_objs->saswp_field_generator($act_meta_fields, $settings);
            }
                                                              
            if ( is_plugin_active('flexmls-idx/flexmls_connect.php') && isset($settings['saswp-flexmlx-compativility']) && $settings['saswp-flexmlx-compativility'] == 1) {
            
                echo '<div class="saswp-seller-div">';
                echo '<strong>'.saswp_t_string('Real estate agent info :').'</strong>';

                $field_objs->saswp_field_generator($flex_mlx_extra_fields, $settings);

                echo '</div>';    
            }
            
            ?>
            
        </div>    

        <div class="saswp-compatibility-container" id="saswp-inactive-compatibility-container">
            
            <?php
            
            $ina_meta_fields = $meta_fields;
             
            $active_plugins = saswp_compatible_active_list();
             
            foreach ($ina_meta_fields as $key => $field){
                                  
                 if($field['hidden']['id'] == 'saswp-woocommerce-booking' || $field['hidden']['id'] == 'saswp-woocommerce-membership'){
                     
                     if(array_search('saswp-woocommerce', $active_plugins)){
                                         
                         unset($ina_meta_fields[$key]);
                     
                     }
                                          
                 }else{
                 
                     if(array_search($field['hidden']['id'], $active_plugins)){
                                         
                         unset($ina_meta_fields[$key]);
                     
                     }
                     
                 }
                                  
             }
            if($ina_meta_fields){
                $field_objs->saswp_field_generator($ina_meta_fields, $settings);
            }
            
            ?>
            
        </div>    
        <?php
                        
}

function saswp_support_page_callback(){
            
    ?>
     <div class="saswp_support_div">
            <strong><?php echo saswp_t_string('If you have any query, please write the query in below box or email us at') ?> <a href="mailto:team@magazine3.in">team@magazine3.in</a>. <?php echo saswp_t_string('We will reply to your email address shortly') ?></strong>
       
            <ul>
                <li>
                   <input type="text" id="saswp_query_email" name="saswp_query_email" placeholder="email">
                </li>
                <li>                    
                    <div><textarea rows="5" cols="60" id="saswp_query_message" name="saswp_query_message" placeholder="Write your query"></textarea></div>
                    <span class="saswp-query-success saswp_hide"><?php echo saswp_t_string('Message sent successfully, Please wait we will get back to you shortly'); ?></span>
                    <span class="saswp-query-error saswp_hide"><?php echo saswp_t_string('Message not sent. please check your network connection'); ?></span>
                </li>
                <li>
                    <strong><?php echo saswp_t_string('Are you a premium customer ?'); ?></strong>  
                    <select id="saswp_query_premium_cus" name="saswp_query_premium_cus">                       
                        <option value=""><?php echo saswp_t_string('Select'); ?></option>
                        <option value="yes"><?php echo saswp_t_string('Yes'); ?></option>
                        <option value="no"><?php echo saswp_t_string('No'); ?></option>
                    </select>                      
                </li>
                <li><button class="button saswp-send-query"><?php echo saswp_t_string('Send Message'); ?></button></li>
            </ul>            
                   
        </div>
    <?php
    
   echo  '<h1>'.saswp_t_string( 'Frequently Asked Questions.' ).'</h1> 
          <br>          
          <h3>1Q) '.saswp_t_string( 'Is there a Documentation Available?' ).'</h3>
	  <p class="saswp_qanda_p">A) '.saswp_t_string( 'The Documentation is always updated and available at ' ).'<a href="http://structured-data-for-wp.com/docs/" target="_blank"><strong>http://structured-data-for-wp.com/docs/</strong></a></p>
          
	  <h3>2Q) '.saswp_t_string( 'How can I setup the Schema and Structured data for individual pages and posts?' ).'</h3>
	  <p class="saswp_qanda_p">A) '.saswp_t_string( 'Just with one click on the Structured data option, you will find an add new options window in the structured data option panel. Secondly, you need to write the name of the title where, if you would like to set the individual Page/Post then you can set the Page/Post type equal to the Page/Post(Name).' ).'</p>

	  <h3>3Q) '.saswp_t_string( 'How can I check the code whether the structured data is working or not?' ).'</h3>
	  <p class="saswp_qanda_p">A) To check the code, the first step we need to take is to copy the code of a page or post then visit the <a href="https://search.google.com/structured-data/testing-tool" target="_blank">Structured data testing tool</a> by clicking on code snippet. Once we paste the snippet we can run the test.</p>

	  <h3> 4Q) '.saswp_t_string( 'How can I check whether the pages or posts are valid or not?' ).'</h3>
	  <p class="saswp_qanda_p"> A) '.saswp_t_string( 'To check the page and post validation, please visit the' ).' <a href="https://search.google.com/structured-data/testing-tool" target="_blank">'.saswp_t_string( 'Structured data testing tool' ).'</a> '.saswp_t_string( 'and paste the link of your website.' ).' '.saswp_t_string( 'Once we click on run test we can see the result whether the page or post is a valid one or not.' ).'</p>

	  <h3>5Q) '.saswp_t_string( 'Where should users contact if they faced any issues?' ).'</h3>
	  <p class="saswp_qanda_p">A) '.saswp_t_string( 'We always welcome all our users to share their issues and get them fixed just with one click to the link' ).' team@magazine3.in or <a href="https://structured-data-for-wp.com/contact-us/" target="_blank">'.saswp_t_string( 'Support link' ).'</a></p><br>';
}

/**
 * Enqueue CSS and JS
 */
function saswp_enqueue_style_js( $hook ) { 
             
        global $saswp_metaboxes;

        $translable_txt = array(
                'attach_review'     => saswp_t_string( 'Attach reviews to this schema type'  ),
                'place_id'          => saswp_t_string( 'Place ID'  ),
                'reviews'           => saswp_t_string( 'Reviews'  ),
                'fetch'             => saswp_t_string( 'Fetch'  ),
                'step_in'           => saswp_t_string( 'Reviews count should be in step of 10'  ),
                'blocks_zero'       => saswp_t_string( 'Blocks value is zero'  ),
                'success'           => saswp_t_string( 'Success' ),
                'enter_place_id'    => saswp_t_string( 'Please enter place id'  ),
                'enter_api_key'     => saswp_t_string( 'Please enter api key'  ),
                'enter_rv_api_key'  => saswp_t_string( 'Please enter reviews api key'  ),
                'using_schema'      => saswp_t_string( 'Thanks for using Structured Data!'  ),
                'do_you_want'       => saswp_t_string( 'Do you want the latest on '  ),
                'sd_update'         => saswp_t_string( 'Structured Data update'  ),
                'before_others'     => saswp_t_string( ' before others and some best resources on monetization in a single email? - Free just for users of Structured Data!'  ),
                'fill_email'        => saswp_t_string( 'Please fill in your name and email.'  ),
                'invalid_email'     => saswp_t_string( 'Your email address is invalid.'  ),
                'list_id_invalid'   => saswp_t_string( 'Your list ID is invalid.'  ),
                'already_subsribed' => saswp_t_string( 'You\'re already subscribed!'  ),
                'subsribed'         => saswp_t_string( 'Please enter reviews api key'  ),
                'try_again'         => saswp_t_string( 'Please enter reviews api key'  ),
                'language'          => saswp_t_string( 'Language'  )
        );
        
        $post_type = '';
        
        $current_screen = get_current_screen(); 
       
        if(isset($current_screen->post_type)){                  
            $post_type = $current_screen->post_type;                
        }    
        
        if($saswp_metaboxes || $post_type == 'saswp' || $post_type == 'saswp-collections' || $post_type == 'saswp_reviews' || $hook == 'saswp_page_structured_data_options' || $hook == 'saswp_page_collection' || $hook == 'term.php' ){

        $all_schema_array = array();
        
        $mappings_file = SASWP_DIR_NAME . '/core/array-list/schemas.php';
                
        if ( file_exists( $mappings_file ) ) {
            $all_schema_array = include $mappings_file;
        }
        
        $post_id = get_the_ID();

        if(isset($_GET['tag_ID'])){
                $post_id = intval($_GET['tag_ID']);
        }

        $req_from = 'post';

        if(isset($_GET['tag_ID'])){
                $req_from = 'taxonomy';
        }

        $data = array(     
            'current_url'                  => saswp_get_current_url(), 
            'post_id'                      => $post_id,
            'ajax_url'                     => admin_url( 'admin-ajax.php' ),            
            'saswp_security_nonce'         => wp_create_nonce('saswp_ajax_check_nonce'),  
            'new_url_selector'             => esc_url(admin_url()).'post-new.php?post_type=saswp',
            'new_url_href'                 => htmlspecialchars_decode(wp_nonce_url(admin_url('index.php?page=saswp_add_new_data_type&'), '_wpnonce')),            
            'collection_post_add_url'      => esc_url(admin_url()).'post-new.php?post_type=saswp-collections',
            'collection_post_add_new_url'  => htmlspecialchars_decode(wp_nonce_url(admin_url('admin.php?page=collection'), '_wpnonce')),
            'collections_page_url'         => htmlspecialchars_decode(admin_url('edit.php?post_type=saswp-collections')),
            'reviews_page_url'             => htmlspecialchars_decode(admin_url('edit.php?post_type=saswp_reviews')),
            'post_type'                    => $post_type,   
            'page_now'                     => $hook,
            'saswp_settings_url'           => esc_url(admin_url('edit.php?post_type=saswp&page=structured_data_options')),
            'saswp_schema_types'           =>  $all_schema_array,
            'trans_based_on'               => saswp_t_string(saswp_label_text('translation-based-on')),
            'trans_reviews'                => saswp_t_string(saswp_label_text('translation-reviews')),
            'trans_self'                   => saswp_t_string(saswp_label_text('translation-self')),
            'translable_txt'               => $translable_txt,
            'is_rtl'                       => is_rtl(),     
            'tag_ID'                       => isset($_GET['tag_ID']) ? intval($_GET['tag_ID']) : '',
            'req_from'                     => $req_from,     

        );
                        
        $data = apply_filters('saswp_localize_filter',$data,'saswp_localize_data');
	// Color picker CSS
	// @refer https://make.wordpress.org/core/2012/11/30/new-color-picker-in-wp-3-5/
        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );	
	// Everything needed for media upload
        wp_enqueue_media();
        
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
                       	
        wp_enqueue_script( 'saswp-timepicker-js', SASWP_PLUGIN_URL . 'admin_section/js/jquery.timepicker.js', array( 'jquery' ), SASWP_VERSION);        
        wp_enqueue_style( 'saswp-timepicker-css', SASWP_PLUGIN_URL . 'admin_section/css/jquery.timepicker.css', false , SASWP_VERSION );

        if( !class_exists('TM_Builder_Core') ){

                wp_enqueue_script( 'jquery-ui-datepicker' );
                wp_register_style( 'jquery-ui', SASWP_PLUGIN_URL. 'admin_section/css/jquery-ui.css' );
                wp_enqueue_style( 'jquery-ui' ); 

        }
       
        wp_enqueue_script( 'wp-color-picker-alpha', SASWP_PLUGIN_URL . 'admin_section/js/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ), SASWP_VERSION, true );
                       
        wp_enqueue_script( 'saswp-functions-list', SASWP_PLUGIN_URL . 'admin_section/js/'.(SASWP_ENVIRONMENT == 'production' ? 'functions-list.min.js' : 'functions-list.js'), false, SASWP_VERSION );
        
        wp_register_script( 'saswp-main-js', SASWP_PLUGIN_URL . 'admin_section/js/'.(SASWP_ENVIRONMENT == 'production' ? 'main-script.min.js' : 'main-script.js'), array('jquery','wp-color-picker'), SASWP_VERSION , true );
                        
        wp_localize_script( 'saswp-main-js', 'saswp_localize_data', $data );
        
        wp_enqueue_script( 'saswp-main-js' );
        
        wp_enqueue_style( 'saswp-main-css', SASWP_PLUGIN_URL . 'admin_section/css/'.(SASWP_ENVIRONMENT == 'production' ? 'main-style.min.css' : 'main-style.css'), false , SASWP_VERSION );
        
        // wp_enqueue_style( 'saswp-frontend-css', SASWP_PLUGIN_URL . 'admin_section/css/'.(SASWP_ENVIRONMENT == 'production' ? 'saswp-frontend.min.css' : 'saswp-frontend.css'), false , SASWP_VERSION );	
        // wp_enqueue_script( 'saswp-rateyo-front-js', SASWP_PLUGIN_URL . 'admin_section/js/jquery.rateyo.min.js', array('jquery', 'jquery-ui-core'), SASWP_VERSION , true );                                                                                        
        // wp_enqueue_style( 'jquery-rateyo-min-css', SASWP_PLUGIN_URL . 'admin_section/css/'.(SASWP_ENVIRONMENT == 'production' ? 'jquery.rateyo.min.css' : 'jquery.rateyo.min.css'), false, SASWP_VERSION );
        
        wp_style_add_data( 'saswp-main-css', 'rtl', 'replace' );
        
        apply_filters('saswp_wp_enqueue_more_script', '');

        }                
        
}

function saswp_enqueue_saswp_select2_js( $hook ) { 
        
        global $saswp_metaboxes;
        
        $post_type = '';
        
        $current_screen = get_current_screen(); 
       
        if(isset($current_screen->post_type)){                  
            $post_type = $current_screen->post_type;                
        }    
        
        if($saswp_metaboxes || $post_type == 'saswp' || $post_type == 'saswp-collections' || $post_type == 'saswp_reviews' || $hook == 'saswp_page_structured_data_options' || $hook == 'saswp_page_collection' || $hook == 'term.php'  ){

        //DIGINEX theme compatibility starts         
        wp_dequeue_script( 'select2-js' );                
        //DIGINEX theme compatibility ends 
        if($post_type != 'case27_listing_type'){
                wp_dequeue_script( 'select2' );
                wp_deregister_script( 'select2' );
        }
         
        // Dequeue mediclinic theme's select2 on schema dashboard to remove conflict.
        wp_dequeue_script( 'mkdf-select2-script' );        
        
        if($post_type == 'saswp'){

                //conflict with jupitor theme fixed starts here
                wp_dequeue_script( 'mk-select2' );
                wp_deregister_script( 'mk-select2' );                
                //conflict with jupitor theme fixed ends here                
                wp_dequeue_script( 'wds-shared-ui' );
                wp_deregister_script( 'wds-shared-ui' );
                wp_dequeue_script( 'pum-admin-general' );
                wp_deregister_script( 'pum-admin-general' );
                //Hide vidoe pro select2 on schema type dashboard
                wp_dequeue_script( 'cmb-select2' );
                wp_deregister_script( 'cmb-select2' );
                
        }
                
        wp_enqueue_style('saswp-select2-style', SASWP_PLUGIN_URL. 'admin_section/css/select2.min.css' , false, SASWP_VERSION);
        wp_enqueue_script('select2', SASWP_PLUGIN_URL. 'admin_section/js/select2.min.js', array( 'jquery'), SASWP_VERSION, true);
        wp_enqueue_script('select2-extended-script', SASWP_PLUGIN_URL. 'admin_section/js/select2-extended.min.js', array( 'jquery' ), SASWP_VERSION, true);
        	                                        
        }                
        
}

function saswp_dequeue_other_select2_on_saswp_screen(){

        global $saswp_metaboxes;
        
        $post_type = $hook = '';        
        $current_screen = get_current_screen(); 
        
        if(isset($current_screen->id)){
                $hook = $current_screen->id;         
        }

        if(isset($current_screen->post_type)){                  
            $post_type = $current_screen->post_type;                
        }    
        
        if($saswp_metaboxes || $post_type == 'saswp' || $post_type == 'saswp-collections' || $post_type == 'saswp_reviews' || $hook == 'saswp_page_structured_data_options' || $hook == 'saswp_page_collection' ){

                wp_dequeue_script( 'forminator-shared-ui' ); 
                wp_dequeue_script( 'select-two-min-js' );
		wp_dequeue_script( 'ppress-select2' );
                
                //Conflict with Impreza theme	
                wp_dequeue_script( 'usof-select2' );
                wp_deregister_script( 'usof-select2' );		
        	                                        
        }  
          
}

add_action( 'admin_enqueue_scripts', 'saswp_enqueue_saswp_select2_js',9999 );
add_action( 'admin_footer', 'saswp_dequeue_other_select2_on_saswp_screen',9999 );

add_action( 'admin_enqueue_scripts', 'saswp_enqueue_style_js' );

//This is for remove the js conflicts of forminator plugin
function saswp_forminatorPlugin_dequeue_script() {

        $post_type = '';        
        $current_screen = get_current_screen(); 

        if(isset($current_screen->post_type)){                  
            $post_type = $current_screen->post_type;                
        }    
        
        if($post_type == 'saswp'){
                wp_dequeue_script( 'shared-ui');

                wp_dequeue_script( 'forminator-shortcode-generator');
        }
}
add_action( 'admin_footer', 'saswp_forminatorPlugin_dequeue_script',20 );

function saswp_option_page_capability( $capability ) {         
    return saswp_current_user_can();         
}

add_filter( 'option_page_capability_sd_data_group', 'saswp_option_page_capability' );

function saswp_pre_update_settings($value, $old_value,  $option){
    
        // if(!function_exists('is_super_admin') || !function_exists('wp_get_current_user') ) {
        //         require_once( ABSPATH . '/wp-includes/capabilities.php' );
        //         require_once( ABSPATH . '/wp-includes/pluggable.php' );
        // }   
        
        if( function_exists('is_super_admin') && function_exists('wp_get_current_user') ){

                   if(!is_super_admin()){
    
                        if(isset($old_value['saswp-role-based-access'])){
                           $value['saswp-role-based-access'] = $old_value['saswp-role-based-access']; 
                        }
                        
                    }else{
                        
                        if(isset($value['saswp-role-based-access']) && !empty($value['saswp-role-based-access'])){
                                if(!in_array('administrator', $value['saswp-role-based-access'])){
                                    array_push($value['saswp-role-based-access'], 'administrator');
                                }
                        }else{
                                $value['saswp-role-based-access'] = array();
                                array_push($value['saswp-role-based-access'], 'administrator');
                        }
                                
                    }

        }   

        return $value; 
}

add_filter('pre_update_option_sd_data', 'saswp_pre_update_settings',10,3);