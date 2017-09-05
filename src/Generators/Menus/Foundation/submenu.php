<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class SubMenu
{
    public $header;

    public function __construct($dom, string $header = null)
    {
        $this->subUll = $dom->createElement("ul");
        $this->header = $header;
        $this->dom = $dom;
    }

    public function addItem($thing, string $blob = "#")
    {
        $item = $this->dom->createElement("li");
        $link = $this->dom->createElement("a");
        $link->textContent = $thing;
        $link->setAttribute("href", $blob);
        $item->appendChild($link);
        $this->subUll->appendChild($item);
        //
        return $this;
    }
}
