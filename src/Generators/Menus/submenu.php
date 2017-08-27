<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    protected $header;
    protected $subMenuClasses;

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
        $item->appendChild($subMenu);
        //
        return $this;
    }
}
