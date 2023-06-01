// Disclaimer: Importing the `store` using a global is just a temporary solution.
const { store } = window.__experimentalInteractivity;

store({
	selectors: {
		bifrost: {
			currentAnswer: ({ state }) => {
				if (!state.bifrost.currentQuestion) {
					return 'No answer selected';
				} else {
					return state.bifrost.currentQuestion.nextElementSibling
						.innerText;
				}
			},
		},
	},
});
