// Disclaimer: Importing the `store` using a global is just a temporary solution.
const { store } = window.__experimentalInteractivity;

store({
	actions: {
		sessionPlugin: {
			showSpoiler: ({ context }) => {
				context.hidden = !context.hidden;
			},
		},
	},
});
