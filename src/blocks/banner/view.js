import { store } from '@wordpress/interactivity';

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
