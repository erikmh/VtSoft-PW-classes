<?php namespace VtSoft;

class HtmlElMeta extends HtmlElement
{
    public string $charset;
    public string $content;
    public string $httpEquiv;
    public string $name;

    public function setCharset(string $charset): void
    {
        $this->charset = "charset='" . $charset . "' ";
    }
    public function setContent(string $content): void
    {
        $this->content = "content='" . $content . "' ";
    }
    public function setHttpEquiv(string $httpEquiv): void
    {
        $this->httpEquiv = "httpEquiv='" . $httpEquiv . "' ";
    }
    public function setName(string $name): void
    {
        $this->name = "name='" . $name . "' ";
    }

    public function render()
    {
        return "<meta" .
            rtrim(
                " " .
                    $this->renderNobleGlobals() .
                    ($this->charset ?? "") .
                    ($this->content ?? "") .
                    ($this->httpEquiv ?? "") .
                    ($this->name ?? "") .
                    $this->renderPlebianGlobals()
            ) .
            " />";
    }
}
