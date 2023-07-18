import { store } from '@wordpress/interactivity';

store({
	actions: {
		sessionPlugin: {
			toggle: ({ context }) => {
				context.hidden = !context.hidden;
			},
		},
	},
	effects: {
		sessionPlugin: {
			logShow: ({ context }) => {
				console.log('Hidden: ' + context.hidden);
			},
		},
	},
});
