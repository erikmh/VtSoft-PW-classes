<?php namespace VtSoft;

class HtmlElImg extends HtmlElement {

#	Set these $cf- variables to your Cloudflare imagedelivery settings as appropriate
private string $cf_src_def = "0540";
private string $cf_var_1 = "0060";
private string $cf_var_2 = "0120";
private string $cf_var_3 = "0240";
private string $cf_var_4 = "0360";
private string $cf_var_5 = "0540";
private string $cf_var_6 = "0720";
private string $cf_var_7 = "0960";
private string $cf_var_8 = "1440";
private string $cf_var_9 = "1920";
private string $cf_base_url = "https://image.jrrt.me/";		#	<—— usually	https://imagedelivery.net/<ACCOUNT_HASH>/` or
															#		  		https://example.com/cdn-cgi/imagedelivery/<ACCOUNT_HASH>/


public string $alt;
public string $cfImageID;
public string $crossorigin;
public string $decoding;
public string $elementtiming;
public string $fetchpriority;
public string $height;
public string $loading;
public string $referrerpolicy;
public string $sizes;
public string $src;
public string $srcset;
public string $usemap;
public string $width;

public function setAlt(string $alt): void {
	if (!isset($alt) || $alt == ""):
    	$this->alt = "";
        return;
    endif;

	$this->alt = "alt='" . $alt . "' ";
}

public function setCfImageID(string $cfImageID): void {
    if (!isset($cfImageID)):
        $this->cfImageID = "";
        return;
    endif;

    $this->cfImageID = $cfImageID;
}

public function setCrossorigin(string $crossorigin): void {
	if (!isset($crossorigin) || $crossorigin == ""):
    	$this->crossorigin = "";
        return;
    endif;

    $crossorigin = mb_strtolower($crossorigin);
    if ($crossorigin == "anonymous" || $crossorigin == "use-credentials"):
        $this->crossorigin = "crossorigin='" . $crossorigin . "' ";
    else:
        $this->crossorigin = "";
    endif;
}

public function setDecoding(string $decoding): void {
	if (!isset($decoding) || $decoding == ""):
    	$this->decoding = "";
        return;
    endif;

    $decoding = mb_strtolower($decoding);
    if ($decoding == "async" || $decoding == "sync" || $decoding == "auto"):
        $this->decoding = "decoding='" . $decoding . "' ";
    else:
        $this->decoding = "";
    endif;
}

public function setElementtiming(string $elementtiming): void {
	if (!isset($elementtiming) || $elementtiming == ""):
    	$this->elementtiming = "";
        return;
    endif;

	$this->elementtiming = "elementtiming='" . $elementtiming . "' ";
}

public function setFetchpriority(string $fetchpriority): void {
	if (!isset($fetchpriority) || $fetchpriority == ""):
    	$this->fetchpriority = "";
        return;
    endif;

    $fetchpriority = mb_strtolower($fetchpriority);
    if ($fetchpriority == "high" || $fetchpriority == "low" || $fetchpriority == "auto"):
        $this->fetchpriority = "fetchpriority='" . $fetchpriority . "' ";
    else:
        $this->fetchpriority = "";
    endif;
}

public function setHeight(int $height): void {
	if (!isset($height)):
    	$this->height = "";
        return;
    endif;

    if ($height == 0):
        $this->height = "";
    else:
        $this->height = "height='" . $height . "' ";
    endif;
}

public function setLoading(string $loading): void {
	if (!isset($loading)):
    	$this->loading = "";
        return;
    endif;

    $loading = mb_strtolower($loading);
    if ($loading == "eager" || $loading == "lazy"):
        $this->loading = "loading='" . $loading . "' ";
    else:
        $this->loading = "";
    endif;
}

public function setReferrerpolicy(string $referrerpolicy): void {
	if (!isset($referrerpolicy)):
    	$this->referrerpolicy = "";
        return;
    endif;

    $referrerpolicy = mb_strtolower($referrerpolicy);
    if ($referrerpolicy == "no-referrer" || $referrerpolicy == "no-referrer-when-downgrade" || $referrerpolicy == "origin" || $referrerpolicy == "origin-when-cross-origin" || $referrerpolicy == "same-origin" || $referrerpolicy == "strict-origin" || $referrerpolicy == "strict-origin-when-cross-origin" || $referrerpolicy == "unsafe-url"):
        $this->referrerpolicy = "referrerpolicy='" . $referrerpolicy . "' ";
    else:
        $this->referrerpolicy = "";
    endif;
}

public function setSizes(string $sizes): void {
	if (!isset($sizes) || $sizes == ""):
    	$this->sizes = "";
        return;
    endif;

	$this->sizes = "sizes='" . $sizes . "' ";
}

public function setSrc(string $src): void {
	if (!isset($src) || $src == ""):
    	$this->src = "";
        return;
    endif;

	$this->src = "src='" . $src . "' ";
}

public function setSrcset(string $srcset): void {
	if (!isset($srcset) || $srcset == ""):
    	$this->srcset = "";
        return;
    endif;

	$this->srcset = "srcset='" . $srcset . "' ";
}

public function setUsemap(string $usemap): void {
	if (!isset($usemap) || $usemap == ""):
    	$this->usemap = "";
        return;
    endif;

	$this->usemap = "usemap='" . $usemap . "' ";
}

public function setWidth(string $width): void {
	if (!isset($width)):
    	$this->width = "";
        return;
    endif;

    if ($width == 0):
        $this->width = "";
    else:
        $this->width = "width='" . $width . "' ";
    endif;
}

public function render() {
	if ($this->cfImageID !== ""):

//	shortcut for Cloudflare-hosted adaptive images
// 		$img->setHeight(3356); 	#		<—— intrinsic image height
// 		$img->setWidth(2880);	#		<—— intrinsic image width
// 		$img->setAlt("Karen smiles over her menu at a corner porch table; inset: I smile back");
// 		$img->setCfImgURL("https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300");
// 		$img->setTitle("1gqit-xxxx-vermont-softworks-logo");		#	<—— for my own reference; optional
// 		$img->render();
//	will yield:
//		<img
//			height="3356"
//			width="2880"
//			src="https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0540"
//			loading="lazy"
//			sizes="auto"
//			alt="Karen smiles over her menu at a corner porch table; inset: I smile back"
//			title="1gqit-7913-sarduccis-anticipation-with-kanie"
//			srcset="
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0060 60w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0120 120w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0240 240w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0360 360w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0540 540w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0720 720w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w0960 960w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w1440 1440w,
//				https://image.jrrt.me/ac192a71-050c-4758-aebc-5f55da1ca300/w1920 1920w
//			"
//	make sure to include in your CSS:
//		img {
//			width: 100%;
//			height: auto;
//		}


		if (isset($this->src) || isset($this->srcset) || isset($this->loading) || isset($this->sizes)):
			# This method automatically constructs standard src, loading, sizes, and srcset attributes
			# for Cloudflare Images. If the user has provided any of those, we should gracefully exit.
			return "";
		endif;

		$this->loading = "loading='lazy' ";
		$this->sizes = "sizes='auto' ";
		$this->src = "src='" . $this->cf_base_url . $this->cfImageID . "/w" . $this->cf_src_def . "' ";
		$this->srcset =
			"srcset='" .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_1} {$this->cf_var_1}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_2} {$this->cf_var_2}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_3} {$this->cf_var_3}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_4} {$this->cf_var_4}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_5} {$this->cf_var_5}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_6} {$this->cf_var_6}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_7} {$this->cf_var_7}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_8} {$this->cf_var_8}w, " .
				"{$this->cf_base_url}{$this->cfImageID}/w{$this->cf_var_9} {$this->cf_var_9}w' "
		;
	endif;

	return (
		'<img' .
		rtrim(
			' ' .
			$this->renderNobleGlobals() .
			($this->height ?? "") .
			($this->width ?? "") .
			($this->sizes ?? "") .
			($this->loading ?? "") .
			($this->alt ?? "") .
			($this->src ?? "") .
			($this->crossorigin ?? "") .
			($this->decoding ?? "") .
			($this->elementtiming ?? "") .
			($this->fetchpriority ?? "") .
			($this->referrerpolicy ?? "") .
			($this->srcset ?? "") .
			($this->usemap ?? "") .
			$this->renderPlebianGlobals()
		) .
		' />'
	);
}
}
