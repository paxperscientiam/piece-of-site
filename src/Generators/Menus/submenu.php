<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $anchorLink;
    protected $subMenu;

    public function __construct(string $header = null)
    {
        $this->header = $header;
        $this->subMenu = self::$dom->createElement("ul");
        if (!is_null($header)) {
            $this->anchorLink = self::$dom->createElement("a");
            $this->anchorLink->textContent = $this->header;
        }
    }

    public function anchorThisTo($item, $link)
    {
        $link->textContent = $this->header;
        //        $this->anchorLink->textContent = "NOPE";
        //        $item->appendChild($this->anchorLink);
        $item->appendChild($this->subMenu);
        $this->setClasses($this->subMenu, self::$subMenuClasses);
    }
}
