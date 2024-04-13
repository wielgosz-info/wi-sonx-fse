import icons from './icons';

const variations = [];

Object.entries(icons).forEach(([key, icon]) => {
	variations.push({
		name: key,
		title: `${icon.displayName || key}`,
		icon: {
			foreground: '#5ac3b4',
			src: icon,
		},
		attributes: { icon: key },
		isActive: (blockAttributes, variationAttributes) =>
			blockAttributes.icon.toLowerCase() ===
			variationAttributes.icon.toLowerCase(),
	});
});

if (variations.length) {
	variations[0].isDefault = true;
}

export default variations;
