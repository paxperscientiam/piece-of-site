<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Menu;


class SubMenu extends Base
{
    private $item;
    private $list = [];

    private $subMenu;

    private $header;

    public function __construct(string $header = null)
    {
        $this->subMenu = self::$dom->createElement("ul");
        $this->header = $header;
    }

    public function addItem($thing)
    {

        $this->item = self::$dom->createElement("li");


        $this->subMenu->appendChild($this->item);
        // $this->list[] = $this->item;
        if (is_string($thing)) {
            $this->item->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }

        return $this;
    }

    public function anchorThis($item)
    {
        if (!is_null($this->header)) {
            $item->textContent = $this->header;
        }
        $this->setClasses();
        $item->appendChild($this->subMenu);
    }
}
