<?php
/**
 * Expose appearance tools when in development mode
 *
 * @package WI\SonxFSE
 */

namespace WI\SonxFSE\Dev;

class AppearanceTools extends \WI\SonxFSE\Utils\Singleton {
	public function __construct() {
		add_filter( 'wp_theme_json_data_theme', array( $this, 'enable_all_appearance_tools' ) );
	}

	/**
	 * Enable all appearance tools when in development mode.
	 * Has similar effect to setting `appearanceTools: true` in `theme.json`,
	 * but enables a bit more than just \WP_Theme_JSON::APPEARANCE_TOOLS_OPT_INS,
	 * since by default we turn everything off.
	 *
	 * @param \WP_Theme_JSON_Data $theme_json
	 *
	 * @return \WP_Theme_JSON_Data
	 */
	public function enable_all_appearance_tools( $theme_json ) {
		$appearance_tools = array(
			'version'  => 2,
			'settings' => array(
				'border'     => array(
					'color'  => true,
					'radius' => true,
					'width'  => true,
					'style'  => true,
				),
				'color'      => array(
					'background' => true,
					'text'       => true,
					'heading'    => true,
					'link'       => true,
					'button'     => true,
					'caption'    => true,
				),
				'background' => array(
					'backgroundImage' => true,
					'backgroundSize'  => true,
				),
				'dimensions' => array(
					'aspectRatio' => true,
					'minHeight'   => true,
				),
				'layout'     => array(
					'allowEditing'                  => true,
					'allowCustomContentAndWideSize' => true,
				),
				'lightbox'   => array(
					'enabled'      => true,
					'allowEditing' => true,
				),
				'position'   => array(
					'sticky' => true,
				),
				'spacing'    => array(
					'blockGap'          => true,
					'margin'            => true,
					'padding'           => true,
					'customSpacingSize' => true,
				),
				'typography' => array(
					'customFontSize' => true,
					'fontStyle'      => true,
					'fontWeight'     => true,
					'letterSpacing'  => true,
					'lineHeight'     => true,
					'textColumns'    => true,
					'textDecoration' => true,
					'writingMode'    => true,
					'textTransform'  => true,
					'dropCap'        => true,
				),
			),
		);

		return $theme_json->update_with( $appearance_tools );
	}
}
