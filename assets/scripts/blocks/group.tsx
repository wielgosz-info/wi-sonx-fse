/**
 * Allows to add "lang" attribute to the Group block.
 *
 * TODO: make it a plugin.
 */

/* global wp */

const { addFilter } = wp.hooks;
const { __ } = wp.i18n;
const { createHigherOrderComponent } = wp.compose;
const { InspectorAdvancedControls } = wp.blockEditor;
const { TextControl, ExternalLink } = wp.components;

addFilter(
	'blocks.registerBlockType',
	'wi-sonx-fse/lang-attr/attributes',
	(settings) => {
		if (settings.name === 'core/group') {
			settings.attributes = {
				...settings.attributes,
				lang: {
					type: 'string',
					source: 'attribute',
					attribute: 'lang',
					selector: '*',
				},
			};
		}
		return settings;
	}
);

addFilter(
	'blocks.getSaveContent.extraProps',
	'wi-sonx-fse/lang-attr/props',
	(extraProps, blockType, attributes) => {
		if (blockType.name === 'core/group' && attributes.lang) {
			extraProps.lang = attributes.lang;
		}
		return extraProps;
	}
);

addFilter(
	'editor.BlockEdit',
	'wi-sonx-fse/lang-attr/input',
	createHigherOrderComponent((BlockEdit) => {
		return (props) => {
			const { lang } = props.attributes;

			return (
				<>
					<BlockEdit {...props} />
					{props.name === 'core/group' && props.isSelected && (
						<InspectorAdvancedControls>
							<TextControl
								label={__('Language code', 'wi-sonx-fse')}
								help={
									<>
										{__(
											'Enter the language code for this group.',
											'wi-sonx-fse'
										)}
										<ExternalLink
											href={__(
												'https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang'
											)}
										>
											{__(
												'Learn more about lang attribute',
												'wi-sonx-fse'
											)}
										</ExternalLink>
									</>
								}
								value={lang}
								placeholder={__(
									'en-US, pl, no…',
									'wi-sonx-fse'
								)}
								onChange={(value) =>
									props.setAttributes({
										lang: value,
									})
								}
								autoCapitalize="none"
								autoComplete="off"
							/>
						</InspectorAdvancedControls>
					)}
				</>
			);
		};
	}, 'withLangAttrControl')
);
