import { store } from '@wordpress/interactivity';

store({
	actions: {
		sessionPlugin: {
			showSpoiler: ({ context }) => {
				context.hidden = !context.hidden;
			},
		},
	},
});
