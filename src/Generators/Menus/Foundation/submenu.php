<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

class SubMenu
{
    public $header;

    public function __construct($dom, string $header = null)
    {
        $this->subUll = $dom->createElement("ul");

        $this->dom = $dom;
        $this->header = $header;
        ///
    }

    public function addItem($thing, string $blob = '#')
    {
        $item = $this->dom->createElement("li");
        $link = $this->dom->createElement("a");

        $link->setAttribute("href", $blob);

        $item->appendChild($link);

        if ($thing instanceof $this) {
            $link->textContent = $thing->header;

            $item->appendChild($thing->subUll);

            $this->subUll->appendChild($item);
        }

        if (is_string($thing)) {
            $link->textContent = $thing;
            $this->dom->appendChild($item, $this->subUll);
        }

        //
        return $this;
    }
}
