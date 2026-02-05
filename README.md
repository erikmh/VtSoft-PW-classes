# VtSoft-PW-classes

These are multi-use classes for ProcessWire web development, to be used by (at least) Anduin and Fangorn.

The One True Version lives in GitHub.

---

## Version log

- v2025-03-27
	- created new class HtmlElScript
	- corrected HtmlElTitle->render() to properly include “content”
	- hardened HtmlElTitle->setContent()
	- hardened HtmlElElLink->setCrossOrigin()
	- corrected syntax in HtmlElement->setClass()
	- created HtmlElement->renderAllGlobals()
	- conformed to Coding Style PER 2.0
		- changed quotation marking in HtmlElement->setDraggable
		- changed array style in HtmlElement->setEnterKeyHint, ->setInputMode
		- removed parens in HtmlElement->setHidden, ->setInert, ->setPopover, ->setSpellcheck, ->setTranslate, 
		- added parens to return statements in HtmlElement->renderNobleGlobals and ->renderPlebianGlobals
- v2025-03-21:	Harmonized divergent versions; created this file.
- v2025-02-13:	Creation.
