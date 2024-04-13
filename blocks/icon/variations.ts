import icons from './icons';

const variations = [];

Object.entries(icons).forEach( ( [key, icon] ) => {
	variations.push( {
		name: key,
		title: `${icon.displayName || key}`,
		icon: icon,
		attributes: { icon: key },
		isActive: ( blockAttributes, variationAttributes ) =>
			blockAttributes.icon === variationAttributes.icon,
	} );
});

if ( variations.length ) {
	variations[0].isDefault = true;
}

export default variations;
