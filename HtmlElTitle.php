<?php namespace VtSoft;

class HtmlElTitle extends HtmlElement {
    public string $content;

    public function setContent(string $content): void {
        $this->content = trim($content);
    }

    public function render(): string {
        return (
        	"<title>" .
            trim(
                $this->renderNobleGlobals() .
                ($this->content ?? "") .
                $this->renderPlebianGlobals()
            ) .
            "</title>"
        );
    }
}
