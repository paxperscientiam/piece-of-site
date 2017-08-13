<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;


class Simple extends Menu implements MenuInterface
{
    private $item;
    private $subMenu;

    public function __construct()
    {
        self::$classes[] = "simple";
        self::$subMenuClasses[] = "nested menu";
    }

    /**
     * @param string|SubMenu
     */
    public function addItem($thing)
    {
        $this->item = self::$dom->createElement("li");
        if (is_string($thing)) {

            $this->item->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }

        self::$domList[] = $this->item;
        return $this;
    }

}
