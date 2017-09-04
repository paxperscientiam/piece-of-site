<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Document
{
    public $dom;
    public $frag;
    public $hook;

    public function __construct()
    {
        $this->dom = new \DOMDocument();
        $this->dom->encoding = 'UTF-8';
        $this->dom->formatOutput = true;
        $this->dom->normalizeDocument();
        //
        $this->frag = $this->dom->createDocumentFragment();
    }

    public function createChunk(string $tag)
    {
        $this->hook = $this->dom->createElement($tag);
        $this->frag->appendChild($this->hook);
        $this->dom->appendChild($this->frag);
        return $this->hook;
    }

    public function createElement(string $tag)
    {
        return $this->dom->createElement($tag);
    }

    public function createNElements(array $tags)
    {
        foreach ($tags as $tag) {
            $elements[] = $this->dom->createElement($tag);
        }
        return $elements;
    }

    public function appendChild($child, $parent = null)
    {
        if (is_null($parent)) {
            $parent = $this->frag;
        }

        if ($child instanceof \DOMElement) {
            $parent->appendChild($child);
        }

        if ($child instanceof \DOMDocumentFragment) {
            //            d($this->dom->saveHTML());
            // $ull = $this->dom->createElement("ul");
            // $laa = $this->dom->createElement("a");
            // $child->appendChild($ull);
            // $parent->appendChild($child);
        }
        if (is_array($child)) {
            $this->appendChildren($child, $parent);
        }
    }


    private function appendChildren(array $children, \DOMElement $parent)
    {
        foreach ($children as $child) {
            if ($child instanceof \DOMElement) {
                $parent->appendChild($child);
            }
        }
    }

    public function setLink(string $href, \DOMElement $link)
    {
        $link->setAttribute("href", $href);
    }

    public function setClasses(array $classes, \DOMElement $element)
    {
        if (!empty($classes)) {
            $classes = implode(" ", $classes);
            $element->setAttribute("class", $classes);
        }
        return $element;
    }

    public function importNode($node)
    {
        return $this->dom->importNode($node, true);
    }

    public function setData(array $data, \DOMElement $element)
    {
        // may need to account for extant data (same for classes)
        if (!empty($data)) {
            $data = implode(" ", $data);
            $element->appendChild($this->dom->createAttribute($data));
        }
    }

    public function saveHTML()
    {
        return $this->dom->saveHTML();
    }
}
