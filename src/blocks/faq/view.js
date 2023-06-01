// Disclaimer: Importing the `store` using a global is just a temporary solution.
const { store } = window.__experimentalInteractivity;

store({
	state: {
		bifrost: {
			currentQuestion: null,
		},
	},
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
	actions: {
		bifrost: {
			toggleQuestion: ({ context, state, ref }) => {
				context.hiddenQuestion = !context.hiddenQuestion;
				state.bifrost.currentQuestion = ref;
			},
		},
	},
	effects: {
		bifrost: {
			closeQuestion: ({ state, context, ref }) => {
				if (state.bifrost.currentQuestion !== ref) {
					context.hiddenQuestion = true;
				}
			},
		},
	},
});
