wp.domReady(function () {
	wp.blocks.registerBlockStyle('core/verse', [
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'no-padding',
			label: 'No Padding',
		},
	]);
});
