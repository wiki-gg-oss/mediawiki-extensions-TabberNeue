<?php
declare( strict_types=1 );

namespace MediaWiki\Extension\TabberNeue\Components;

class TabberComponentTab implements TabberComponent {
	public function __construct(
		private string $name,
		private string $label,
		private string $content,
		private bool $addTabPrefix
	) {
	}

	public function getTemplateData(): array {
		$name = $this->name;
		// begin wiki.gg: bring back legacy IDs for URL compatibility
		$id = $name;
		// end wiki.gg

		return [
			'label' => $this->label,
			'content' => $this->content,
			'array-tab-attributes' => [
				[
					'key' => 'id',
					'value' => "$id-label"
				],
				[
					'key' => 'href',
					'value' => "#$id"
				],
				[
					'key' => 'aria-controls',
					'value' => $id
				]
			],
			'array-tabpanel-attributes' => [
				[
					'key' => 'id',
					'value' => $id
				],
				[
					'key' => 'aria-labelledby',
					'value' => "$id-label"
				]
			]
		];
	}
}
