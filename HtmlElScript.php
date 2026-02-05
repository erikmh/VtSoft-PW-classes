<?php namespace VtSoft;

class HtmlElScript extends HtmlElement {

public string $async;
public string $blocking;
public string $content;
public string $crossorigin;
public string $defer;
public string $fetchpriority;
public string $integrity;
public string $nomodule;
public string $referrerpolicy;
public string $src;
public string $type;

public function setAsync(bool $async): void {
	if (!isset($async)):
		$this->async = "";
		return;
	endif;
	$this->async = ($async ? "async " : "");
}

public function setBlocking(bool $blocking): void {
	if (!isset($blocking)):
		$this->blocking = "";
		return;
	endif;
	$blocking = strtolower(trim($blocking));
	if ($blocking !== "render"):
		$this->blocking = "";
		return;
	endif;
	$this->blocking = "blocking='render' ";
}

public function setContent(string $content): void {
	if (!isset($content)):
		$this->content = "";
		return;
	endif;
	$this->content = trim($content);
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

public function setDefer(bool $defer): void {
	if (!isset($defer)):
		$this->defer = "";
		return;
	endif;
	$this->defer = ($defer ? "defer " : "");
}

public function setFetchPriority(string $fetchpriority): void {
	if (!isset($fetchpriority)):
		$this->fetchpriority = "";
		return;
	endif;
	$fetchpriority = strtolower(trim($fetchpriority));
	if ($fetchpriority !== "high" || "low" || "auto"):
		$this->$fetchpriority = "";
		return;
	endif;
	$this->fetchpriority = "fetchpriority='" . $fetchpriority . "' ";
}

public function setIntegrity(string $integrity): void {
	if (!isset($integrity)):
		$this->integrity = "";
		return;
	endif;
	$this->integrity = "integrity='" . $integrity . "' ";
}

public function setNomodule(bool $nomodule): void {
	if (!isset($nomodule)):
		$this->nomodule = "";
		return;
	endif;
	$this->nomodule = ($nomodule ? "nomodule " : "");
}

public function setReferrerpolicy(string $referrerpolicy): void {
	if (!isset($referrerpolicy)):
		$this->referrerpolicy = "";
		return;
	endif;
	$this->referrerpolicy = "referrerpolicy='" . $referrerpolicy . "' ";
}

public function setSrc(string $src): void {
	if (!isset($src) || $src == ""):
		$this->src = "";
		return;
	endif;
	$this->src = "src='" . $src . "' ";
}

public function setType(string $type): void {
	if (!isset($type)):
		$this->type = "";
		return;
	endif;
	$this->type = "type='" . $type . "' ";
}

public function render() {
	return (
		"<script " .
		trim(
			$this->renderNobleGlobals() .
			($this->async ?? "") .
			($this->blocking ?? "") .
			($this->crossorigin ?? "") .
			($this->defer ?? "") .
			($this->fetchpriority ?? "") .
			($this->integrity ?? "") .
			($this->nomodule ?? "") .
			($this->referrerpolicy ?? "") .
			($this->src ?? "") .
			($this->type ?? "") .
			$this->renderPlebianGlobals()
		) .
		">" .
		($this->content ?? "") .
		"</script>"
	);
}
}
