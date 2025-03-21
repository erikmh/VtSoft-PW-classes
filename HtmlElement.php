<?php namespace VtSoft;

abstract class HtmlElement {

    #	by rights these should be “private” properties; however, for efficiency’s sake
    #	we’re allowing clients to unset them directly. Setting them directly is therefore
    #	technically allowed, but MUST not be done.

    public string $accessKey;
    public string $class;
    public string $contentEditable;
    public string $dir;
    public string $draggable;
    public string $enterKeyHint;
    public string $hidden;
    public string $id;
    public string $inert;
    public string $inputMode;
    public string $lang;
    public string $popover;
    public string $spellcheck;
    public string $style;
    public string $tabIndex;
    public string $title;
    public string $translate;

    public function setAccessKey(string $accessKey): void {
        if (!isset($accessKey) || $accessKey == ""):
            $this->accessKey = "";
            return;
        endif;
        $this->accessKey = "accessKey='" . mb_substr($accessKey, 0, 1) . "' ";
    }

    public function setClass(string $class): void {
        if (!isset($class) || $class == ""):
            $this->class = "";
            return;
        endif;
        $this->class = "class='" . $class . "' ";
    }

    public function setContentEditable(bool $contentEditable): void {
        if (!isset($contentEditable)):
            $this->contentEditable = "";
            return;
        endif;
        $this->contentEditable = $contentEditable
            ? "contentEditable='true' "
            : "contentEditable='false' ";
    }

    public function setDir(string $dir): void {
        if (!isset($dir) || $dir == ""):
            $this->dir = "";
            return;
        endif;
        $dir = mb_strtolower($dir);
        if ($dir == "ltr" || $dir == "rtl" || $dir == "auto"):
            $this->dir = "dir='" . $dir . "' ";
        else:
            $this->dir = "";
        endif;
    }

    public function setDraggable(string $draggable): void {
        if (!isset($draggable) || $draggable == ""):
            $this->draggable = "";
            return;
        endif;
        $draggable = mb_strtolower($draggable);
        $draggable = mb_substr($draggable, 0, 1);
        switch ($draggable):
            case "t" || "1":
                $this->dir = "draggable='true' ";
                return;
            case "f" || "0":
                $this->dir = "draggable='false' ";
                return;
            case "a":
                $this->dir = "draggable='auto' ";
                return;
            default:
                $this->draggable = "";
                return;
        endswitch;
    }

    public function setEnterKeyHint(string $enterKeyHint): void {
        if (!isset($enterKeyHint) || $enterKeyHint == ""):
            $this->enterKeyHint = "";
            return;
        endif;
        #	$enterKeyHint = mb_trim(mb_strtolower($enterKeyHint));		<——— NOT UNTIL PHP 8.4.0!!! 🙄
        $enterKeyHint = trim(mb_strtolower($enterKeyHint));
        $values = ["done", "enter", "go", "next", "previous", "search", "send"];
        if (!in_array($enterKeyHint, $values)):
            $this->enterKeyHint = "";
            return;
        endif;
        $this->enterKeyHint = "enterKeyHint='" . $enterKeyHint . "' ";
    }

    public function setHidden(bool $hidden): void {
        if (!isset($hidden)):
            $this->hidden = "";
            return;
        endif;
        $this->hidden = $hidden ? "hidden " : "";
    }

    public function setID(string $id): void {
        if (!isset($id) || $id == ""):
            $this->id = "";
            return;
        endif;
        #	$id = preg_replace('[\s]*(?U).*/u', '\\1', $id);		<——— can’t get this to work, and it would slow it down lots anyway; just don’t include any spaces, per HTML5 spec, OK?
        $this->id = "id='" . $id . "' ";
    }

    public function setInert(bool $inert): void {
        if (!isset($inert)):
            $this->inert = "";
            return;
        endif;
        $this->inert = $inert ? "inert " : "";
    }

    public function setInputMode(string $inputMode): void {
        if (!isset($inputMode) || $inputMode == ""):
            $this->inputMode = "";
            return;
        endif;
        #	$inputMode = mb_trim(mb_strtolower($inputMode));		<——— NOT UNTIL PHP 8.4.0!!! 🙄
        $inputMode = trim(mb_strtolower($inputMode));
        $values = [
            "decimal",
            "email",
            "none",
            "numeric",
            "search",
            "tel",
            "text",
            "url",
        ];
        if (!in_array($inputMode, $values)):
            $this->$inputMode = "";
            return;
        endif;
        $this->inputMode = "inputMode='" . $inputMode . "' ";
    }

    public function setLang(string $lang): void {
        if (!isset($lang) || $lang == ""):
            $this->lang = "";
            return;
        endif;
        $this->lang = "lang=" . $lang . "' ";
    }

    public function setPopover(bool $popover): void {
        if (!isset($popover)):
            $this->popover = "";
            return;
        endif;
        $this->popover = $popover ? "popover " : "";
    }

    public function setSpellcheck(bool $spellcheck): void {
        if (!isset($spellcheck)):
            $this->spellcheck = "";
            return;
        endif;
        $this->spellcheck = $spellcheck
            ? "spellcheck='true' "
            : "spellcheck='false' ";
    }

    public function setStyle(string $style): void {
        if (!isset($style) || $style == ""):
            $this->style = "";
            return;
        endif;
        $this->style = "style=" . $style . "' ";
    }

    public function setTabIndex(int $tabIndex): void {
        if (!isset($tabIndex)):
            $tabIndex = "";
            return;
        endif;
        $this->tabIndex = "tabIndex='" . strval($tabIndex) . "' ";
    }

    public function setTitle(string $title): void {
        if (!isset($title) || $title == ""):
            $this->title = "";
            return;
        endif;
        $this->title = "title=" . $title . "' ";
    }

    public function setTranslate(bool $translate): void {
        if (!isset($translate)):
            $this->translate = "";
            return;
        endif;
        $this->translate = $translate ? "translate='yes' " : "translate='no' "; #	<——— I didn’t write the specs
    }

    protected function renderNobleGlobals(): string {
        return ($this->id ?? "") . ($this->class ?? "");
    }

    protected function renderPlebianGlobals(): string
    {
        return ($this->accessKey ?? "") .
            ($this->contentEditable ?? "") .
            ($this->dir ?? "") .
            ($this->draggable ?? "") .
            ($this->enterKeyHint ?? "") .
            ($this->hidden ?? "") .
            ($this->inert ?? "") .
            ($this->inputMode ?? "") .
            ($this->lang ?? "") .
            ($this->popover ?? "") .
            ($this->spellcheck ?? "") .
            ($this->style ?? "") .
            ($this->tabIndex ?? "") .
            ($this->title ?? "") .
            ($this->translate ?? "");
    }
}
