<?php namespace VtSoft;

class HtmlElLink extends HtmlElement {

public string $as;
public string $crossorigin;
public string $href;
public string $hreflang;
public string $media;
public string $referrerpolicy;
public string $rel;
public string $sizes;
public string $type;


public function setAs(string $as): void {$this->as = "as='" . $as . "' ";}
public function setCrossorigin(string $crossorigin): void {$this->crossorigin = "crossorigin='" . $crossorigin . "' ";}
public function setHref(string $href): void {$this->href = "href='" . $href . "' ";}
public function setHreflang(string $hreflang): void {$this->hreflang = "hreflang='" . $hreflang . "' ";}
public function setMedia(string $media): void {$this->media = "media'" . $media . "' ";}
public function setReferrerpolicy(string $referrerpolicy): void {$this->referrerpolicy = "referrerpolicy'" . $referrerpolicy . "' ";}
public function setRel(string $rel): void {$this->rel = "rel='" . $rel . "' ";}
public function setSizes(string $sizes): void {$this->sizes = "sizes='" . $sizes . "' ";}
public function setType(string $type): void {$this->type = "type='" . $type . "' ";}

public function render() {
	return (
		"<link" .
		rtrim (
			" " .
			$this->renderNobleGlobals() .
			($this->as ?? "") .
			($this->crossorigin ?? "") .
			($this->media ?? "") .
			($this->referrerpolicy ?? "") .
			($this->rel ?? "") .
			($this->href ?? "") .
			($this->sizes ?? "") .
			($this->type ?? "") .
			$this->renderPlebianGlobals()
		) .
		" />"
	);
}
}
