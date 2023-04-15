import { useState, useEffect } from '@wordpress/element';

const Comp = () => {
	const [show, setShow] = useState(false);

	useEffect(() => {
		// Log the value of `show` each time it changes.
		console.log(`Show: ${show}`);
	}, [show]);

	const toggle = () => {
		setShow(!show);
	};

	return (
		<div>
			<button onClick={toggle}>Toggle</button>
			{show && (
				<div class="hidden-text">
					<p>Some text!</p>
				</div>
			)}
		</div>
	);
};

wp.element.render(<Comp />, document.getElementById('root'));
