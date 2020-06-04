import { __ } from '@wordpress/i18n';
import { registerBlockType } from '@wordpress/blocks';

const Edit = ( { className } ) => {
	return <div className={ className }>Edit content</div>;
};

const Save = () => {
	return <div className="sample-block">Saved content</div>;
};

const options = {
	icon: 'carrot',
	title: __( 'Sample block', 'textdomain' ),
	category: 'common',
	edit: Edit,
	save: Save,
};

registerBlockType( 'basic-boilerplate/sample-block', options );
