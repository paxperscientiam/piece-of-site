<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;

class SubMenu extends Base
{
    private $anchorLink;
    protected $subMenu;

    public function __construct(string $header = null)
    {
        $this->subMenu = self::$dom->createElement("ul");
        if (!is_null($header)) {
            $this->anchorLink = self::$dom->createElement("a");
            $this->anchorLink->textContent = $header;
        }
    }

    public function anchorThisTo($item)
    {
        $item->appendChild($this->anchorLink);
        //
        $this->setClasses($this->subMenu, self::$subMenuClasses);
        $item->appendChild($this->subMenu);
    }
}
