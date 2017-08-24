<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $header;

    public function __construct(string $header = null)
    {
        $this->header = $header;
    }

    protected function anchorThisTo($item, $link, $dom)
    {
        $subMenu = $dom->createElement("ul");
        if (!is_null($this->header)) {
            $anchorLink = $dom->createElement("a");
            $anchorLink->textContent = $this->header;
        }
        $link->textContent = $this->header;
        $anchorLink->textContent = "NOPE";
        $item->appendChild($anchorLink);
        $item->appendChild($subMenu);
        d($this->subMenuClasses);
        $this->setClasses($subMenu, $this->subMenuClasses);
        //
        return $this;
    }
}
