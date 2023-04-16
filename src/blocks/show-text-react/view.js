import { useState, useEffect } from '@wordpress/element';

const Comp = () => {
	const [hidden, setHidden] = useState(true);

	useEffect(() => {
		// Log the value of `show` each time it changes.
		console.log(`Hidden: ${hidden}`);
	}, [hidden]);

	const toggle = () => {
		setHidden(!hidden);
	};

	return (
		<div>
			<button onClick={toggle}>Toggle</button>
			<div hidden={hidden} class="hidden-text">
				<p>Some text!</p>
			</div>
		</div>
	);
};

wp.element.render(<Comp />, document.getElementById('root-show-text'));
