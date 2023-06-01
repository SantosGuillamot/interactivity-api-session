import { __ } from '@wordpress/i18n';
import { useBlockProps, RichText } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	const { question, answer } = attributes;

	return (
		<div {...useBlockProps()}>
			<RichText
				value={question}
				tagname="p"
				onChange={(newValue) => setAttributes({ question: newValue })}
			/>
			<hr />
			<RichText
				value={answer}
				tagname="p"
				onChange={(newValue) => setAttributes({ answer: newValue })}
			/>
		</div>
	);
}
