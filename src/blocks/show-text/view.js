// Disclaimer: Importing the `store` using a global is just a temporary solution.
const { store } = window.__experimentalInteractivity;

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
