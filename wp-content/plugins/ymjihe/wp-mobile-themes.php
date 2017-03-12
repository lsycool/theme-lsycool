<?php
/*
Plugin Name: 主题设置
Plugin URI: http://www.ymjihe.com
Description: WordPress手机主题设置(来自源码集合汉化)
Version: 1.5
Author: ymjihe
Author URI: http://www.ymjihe.com/
*/

require 'wp-mobile-themes.class.php';

$options = get_option('wp_mobile_themes_options');
$mobileThemeName = $options['mobile_theme'];
if(!$mobileThemeName) {
	$mobileThemeName = get_current_theme();
}
$tabletThemeName = $options['tablet_theme'];
if(!$tabletThemeName) {
	$tabletThemeName = get_current_theme();
}
new WPMobileThemes($mobileThemeName, $tabletThemeName);

function actionLinks( $links ) {
	$settingsLink = '<a href="/wp-admin/themes.php?page=wp-mobile-themes.php">' . __('设置', 'wp-mobile-themes') . '</a>'; 
	array_unshift($links, $settingsLink);
	return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'actionLinks');

load_plugin_textdomain('wp-mobile-themes', '/wp-content/plugins/wp-mobile-themes/languages/');

class WPMobileThemesOptions {

	private function getOptions() {
		$options = get_option('wp_mobile_themes_options');
		if(!is_array($options)) {
			$options['mobile_theme'] = '';
			$options['tablet_theme'] = '';
			update_option('wp_mobile_themes_options', $options);
		}
		return $options;
	}

	public function updateOptions() {

		if(isset($_POST['wp_mobile_themes_save'])) {
			$options = WPMobileThemesOptions::getOptions();
			$themeNames = WPMobileThemesOptions::getThemeNames();
			$options['mobile_theme'] = $_POST['mobile_theme'];
			$options['tablet_theme'] = $_POST['tablet_theme'];

			if(!WPMobileThemesOptions::isThemeIncluded($options['mobile_theme'], $themeNames)) {
				$options['mobile_theme'] = WPMobileThemesOptions::getDefaultThemeName();
			}
	
			if(!WPMobileThemesOptions::isThemeIncluded($options['tablet_theme'], $themeNames)) {
				$options['tablet_theme'] = WPMobileThemesOptions::getDefaultThemeName();
			}
	
			update_option('wp_mobile_themes_options', $options);

		} else {
			WPMobileThemesOptions::getOptions();
		}

		add_theme_page(__('Mobile Themes', 'wp-mobile-themes'), __('手机主题设置', 'wp-mobile-themes'), 'edit_theme_options', basename(__FILE__), array('WPMobileThemesOptions', 'display'));
	}

	public function display() {
		$options = WPMobileThemesOptions::getOptions();
		$themeNames = WPMobileThemesOptions::getThemeNames();
		$mobileThemeName = $options['mobile_theme'];
		$tabletThemeName = $options['tablet_theme'];
?>

<div class="wrap">
	<div class="icon32" id="icon-options-general"><br /></div>
	<h2><?php _e('手机平板主题设置', 'wp-mobile-themes'); ?></h2>

	<?php if(!empty($_POST)) : ?>
		<div class='updated fade'><p><?php _e('Settings <strong>saved</strong>.', 'wp-mobile-themes'); ?></p></div>
	<?php endif; ?>

	<div id="poststuff" class="has-right-sidebar">
		<div id="post-body">
			<div id="post-body-content">
				<form action="#" method="POST" name="wp_mobile_themes_form">
					<table class="form-table">
						<tbody>

							<tr valign="top">
								<td colspan="2">
									<p><?php printf(__('使用手机和平板访问网站的用户将看到以下选择的主题界面，而桌面用户依然看到 <a href="/wp-admin/themes.php">%1$s</a>主题界面.', 'wp-mobile-themes'), WPMobileThemesOptions::getDefaultThemeName()); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php _e('移动设备主题', 'wp-mobile-themes'); ?></th>
								<td>
									<select name="mobile_theme">
										<?php
											foreach ($themeNames as $themeName) {
												$selectedProperty = '';
												$defaultTip = '';

												if($themeName == $mobileThemeName) {
													$selectedProperty = ' selected="selected"';
												}
												if($themeName == WPMobileThemesOptions::getDefaultThemeName()) {
													$defaultTip = __(' (默认主题)', 'wp-mobile-themes');
												}
												echo '<option value="' . $themeName . '"' . $selectedProperty . '>' . htmlspecialchars($themeName) . $defaultTip . '</option>';
											}
										?>
									<select>
									<p class="description"><?php _e('手机主题将应用在 安卓,苹果,等手机和小型移动设备上。', 'wp-mobile-themes'); ?></p>
								</td>
							</tr>

							<tr valign="top">
								<th scope="row"><?php _e('平板设备主题', 'wp-mobile-themes'); ?></th>
								<td>
									<select name="tablet_theme">
										<?php
											foreach ($themeNames as $themeName) {
												$selectedProperty = '';
												$defaultTip = '';

												if($themeName == $tabletThemeName) {
													$selectedProperty = ' selected="selected"';
												}
												if($themeName == WPMobileThemesOptions::getDefaultThemeName()) {
													$defaultTip = __(' (默认主题)', 'wp-mobile-themes');
												}
												echo '<option value="' . $themeName . '"' . $selectedProperty . '>' . htmlspecialchars($themeName) . $defaultTip . '</option>';
											}
										?>
									<select>
									<p class="description"><?php _e('平板主题将应用平板设备上显示', 'wp-mobile-themes'); ?></p>
								</td>
							</tr>

						</tbody>
					</table>

					<p class="submit">
						<input class="button-primary" type="submit" name="wp_mobile_themes_save" value="<?php _e('保存更改', 'wp-mobile-themes'); ?>" />
					</p>
				</form>
			</div>
		</div>

	</div>
</div>

<?php
	}

	private function getThemeNames() {
		$themes = get_themes();
		$themeNames = array_keys($themes);
		natcasesort($themeNames);

		return $themeNames;
	}

	private function getDefaultThemeName() {
		$themeName = get_current_theme();

		return $themeName;
	}

	private function isThemeIncluded($obj, $list) {
		foreach ($list as $item) {
			if($item == $obj) {
				return true;
			}
		}

		return false;
	}
}

add_action('admin_menu', array('WPMobileThemesOptions', 'updateOptions'));
?>
