<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;


class SubMenu extends Menu
{
    private $item;
    private $list = [];

    private $subMenu;

    private $header;

    public function __construct($header)
    {
        $this->subMenu = self::$dom->createElement("ul");


        $this->header = $header;
    }

    public function addItem($thing)
    {
        $this->item = self::$dom->createElement("li");
        $this->item->textContent = $thing;

        $this->subMenu->appendChild($this->item);
        // $this->list[] = $this->item;
        return $this;
    }

    public function anchorThis($item)
    {
        $item->textContent = $this->header;
        $item->appendChild($this->subMenu);
    }
}
