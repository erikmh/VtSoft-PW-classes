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

public function setAs(string $as): void {
	$this->as = "as='" . $as . "' ";
}

public function setCrossorigin(string $crossorigin): void {
	if (is_null($crossorigin)):
		$this->crossorigin = "";
		return;
	endif;
	$crossorigin = strtolower(trim($crossorigin));
	switch ($crossorigin):
		case "" || "anonymous":
			$crossorigin = "crossorigin='anonymous' ";
				break;
		case "use-credentials":
			$crossorigin = "crossorigin='use-credentials' ";
			break;
		default:
	endswitch;
	$this->crossorigin = "crossorigin='" . $crossorigin . "' ";
}

public function setHref(string $href): void {
	if (is_null($href)):
		$this->href = "";
		return;
	endif;
	$this->href = "href='" . $href . "' ";
}

public function setHreflang(string $hreflang): void {
	if (is_null($hreflang)):
		$this->hreflang = "";
		return;
	endif;
	$this->hreflang = "hreflang='" . $hreflang . "' ";
}

public function setMedia(string $media): void {
	if (is_null($media)):
		$this->media = "";
		return;
	endif;
	$this->media = "media='" . $media . "' ";
}

public function setReferrerpolicy(string $referrerpolicy): void {
	if (is_null($referrerpolicy)):
		$this->referrerpolicy = "";
		return;
	endif;
	$this->referrerpolicy = "referrerpolicy='" . $referrerpolicy . "' ";
}

public function setRel(string $rel): void {
	if (is_null($rel)):
		$this->rel = "";
		return;
	endif;
	$this->rel = "rel='" . $rel . "' ";
}

public function setSizes(string $sizes): void {
	if (is_null($sizes)):
		$this->sizes = "";
		return;
	endif;
	$this->sizes = "sizes='" . $sizes . "' ";
}

public function setType(string $type): void {
	if (is_null($type)):
		$this->type = "";
		return;
	endif;
	$this->type = "type='" . $type . "' ";
}

public function render() {
	return "<link " .
		rtrim(
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
		" />";
}
}
