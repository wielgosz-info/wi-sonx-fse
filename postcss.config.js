module.exports = {
	parser: false,
	map: false,
	plugins: {
		'postcss-nested': {},
		'postcss-import': {},
		'postcss-custom-media': {},
		...(process.env.NODE_ENV === 'production'
			? {
					cssnano: {},
				}
			: {}),
	},
};
