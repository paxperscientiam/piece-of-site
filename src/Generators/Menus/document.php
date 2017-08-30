<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Document
{
    protected $dom;
    protected $frag;

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
        $element = $this->dom->createElement($tag);
        $this->frag->appendChild($element);
        $this->dom->appendChild($this->frag);
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

    public function appendChildX($child, $parent = null)
    {
        if (is_null($parent)) {
            $parent = $this->frag;
        }
        if ($child instanceof \DOMElement) {
            $parent->appendChild($child);
            $this->dom->appendChild($this->frag);
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

    public function setClasses(array $classes, \DOMElement $element)
    {
        if (!empty($classes)) {
            $classes = implode(" ", $classes);
            $element->setAttribute("class", $classes);
        }
    }

    public function setData(array $data, \DOMElement $element)
    {
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
