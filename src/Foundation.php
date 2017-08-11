<?php
/*
 * Generate content elements for Foundation for Sites by Zurb.
 */

namespace Ramoose\PieceOfSite\FoundationSites;

use Ramoose\PieceOfSite\Util\Resource;

class Foundation
{

    protected $doc;
    protected $html;
    protected $head;
    protected $body;
    //
    public function __construct()
    {
        $this->doc = new \DOMDocument;
        $this->doc->encoding = 'UTF-8';
        $this->doc->formatOutput = true;
        $this->doc->normalizeDocument();
        //
        $this->fragment = $this->doc->createDocumentFragment();
        //
        $this->createFrame();
    }

    private function createFrame()
    {
        $this->name = "testes";
        $this->body = $this->doc->createElement("body");
        $this->head = $this->doc->createElement("head");
        $this->html = $this->doc->createElement("html");

        $this->html->appendChild($this->head);
        $this->html->appendChild($this->body);
        $this->fragment->appendChild($this->html);
        //
        $this->doc->appendChild($this->fragment);
    }

    public function add(...$things)
    {
        foreach ($things as $thing) {
            if ($thing instanceof Resource) {
                $this->head->appendChild($thing->el);
            }
        }
        return $this;
    }

    public function print()
    {
        return $this->doc->saveHTML();
    }
}
