// Disclaimer: Importing the `store` using a global is just a temporary solution.
const { store } = window.__experimentalInteractivity;

store({
	actions: {
		sessionPlugin: {
			zoom: ({ context, event }) => {
				context.isZooming = true;
				const x = event.offsetX;
				const y = event.offsetY;
				event.currentTarget.style.transformOrigin = `${x}px ${y}px`;
			},
			resetZoom: ({ context }) => {
				context.isZooming = false;
			},
		},
	},
});
