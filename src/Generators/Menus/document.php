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
    }

    public function createChunk(string $tag)
    {
        $this->frag = $this->dom->createDocumentFragment();
        $element = $this->dom->createElement($tag);
        $this->frag->appendChild($element);
        $this->dom->appendChild($this->frag);
        return $element;
    }

    public function createElement(string $tag)
    {
        return $this->dom->createElement($tag);
    }

    public function appendChild($child, \DOMElement $parent)
    {
        if ($child instanceof \DOMElement) {
            $parent->appendChild($child);
        }
        if (is_array($child)) {
            $this->appendChildren($child, $parent);
        }
    }

    private function appendChildren(array $children, \DOMElement $parent)
    {
        foreach ($children as $child) {
            if ($child instanceof \DOMElement) {
                d($child);
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
