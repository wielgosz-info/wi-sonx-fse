// WordPress webpack config.
const defaultConfig = require('@wordpress/scripts/config/webpack.config');

// Plugins.
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts');

// Utilities.
const path = require('path');
const glob = require('fast-glob');
const scriptKeys = ['index', 'script', 'view', 'editor'];

// Add any a new entry point by extending the webpack config.
module.exports = {
	...defaultConfig,
	...{
		entry: {
			'../assets/build/editor': path.resolve(
				process.cwd(),
				'assets/scripts',
				'editor.ts'
			),
			'../assets/build/main': path.resolve(
				process.cwd(),
				'assets/scripts',
				'main.ts'
			),
			...Object.fromEntries(
				glob.globSync( path.resolve(
					process.cwd(),
					'blocks/*',
					`{${scriptKeys.join(',')}}.{ts,tsx,js,jsx}`
				)).map((file) => {
					const parts = /blocks\/([\w-]+)\/([\w-]+)\..*$/.exec(
						file
					);
					return [`../blocks/${parts[1]}/build/${parts[2]}`, file];
				})
			),
		},
		plugins: [
			// Include WP's plugin config.
			...defaultConfig.plugins,

			// Removes the empty `.js` files generated by webpack but
			// sets it after WP has generated its `*.asset.php` file.
			new RemoveEmptyScriptsPlugin({
				stage: RemoveEmptyScriptsPlugin.STAGE_AFTER_PROCESS_PLUGINS,
			}),
		],
	},
};
