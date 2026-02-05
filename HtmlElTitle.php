<?php namespace VtSoft;

class HtmlElTitle extends HtmlElement {
public string $content;

public function setContent(string $content): void {
	if (!isset($content)):
		$this->content = "";
		return;
	endif;
	$this->content = trim($content);
}

public function render(): string {
	return (
		"<title " .
		trim($this->renderAllGlobals()) .
		">" .
		$this->content .
		"</title>"
	);
}
}
