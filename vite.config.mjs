/** @type {import('vite').UserConfig} */

import { globSync } from 'glob';
import { v4wp } from '@kucrut/vite-for-wp';
import { wp_scripts } from '@kucrut/vite-for-wp/plugins';
import react from '@vitejs/plugin-react';

const themeDir = '.';
const scriptKeys = ['index', 'script', 'view', 'editor', 'style'];

export default {
	build: {
		rollupOptions: {
			external: [
				'@wordpress/interactivity',
			]
		}
	},
	plugins: [
		v4wp({
			input: {
				main: `${themeDir}/assets/scripts/main.ts`,
				editor: `${themeDir}/assets/scripts/editor.ts`,
				...Object.fromEntries(
					globSync(
						`${themeDir}/blocks/**/{${scriptKeys.join(',')}}.{ts,tsx,js,jsx}`
					).map((file) => {
						const parts = /blocks\/([\w-]+)\/([\w-]+)\..*$/.exec(
							file
						);
						return [`${parts[1]}-${parts[2]}`, file];
					})
				),
			},
			outDir: `${themeDir}/dist`, // Optional, defaults to 'dist'.
		}),
		wp_scripts(),
		react({
			jsxRuntime: 'classic',
			jsxImportSource: '@wordpress/element',
		}),
	],
};
