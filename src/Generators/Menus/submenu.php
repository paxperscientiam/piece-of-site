<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    protected $subDom;
    protected $subContainer;
    protected $subFrag;
    //
    protected $header;

    public function __construct(string $header = null)
    {
        $this->header = $header;
        //
        $this->subDom = new \DOMDocument();
        $this->subDom->encoding = 'UTF-8';
        $this->subDom->formatOutput = true;
        $this->subDom->normalizeDocument();
        //
        $this->subFrag = $this->subDom->createDocumentFragment();
        $this->subContainer = $this->subDom->createElement("ul");
        $this->subFrag->appendChild($this->subContainer);
        $this->subDom->appendChild($this->subFrag);
    }

    public function addItem($thing)
    {
        $item = $this->subDom->createElement("li");
        $link = $this->subDom->createElement("a");
        $link->textContent = $thing;
        $item->appendChild($link);
        //
        return $this;
    }

    protected function anchorThisTo($link, $dom)
    {
        if (!is_null($this->header)) {
            $anchorLink = $dom->createElement("a");
            $anchorLink->textContent = $this->header;
        }
        $link->textContent = $this->header;
        //
        return $this;
    }
}
