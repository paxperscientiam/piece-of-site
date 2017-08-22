<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Base extends Menu implements MenuInterface
{
    private $item;
    private $link;

    /**
     * @param string|SubMenu
     */
    public function addItem($thing, string $href = "#")
    {
        $this->item = self::$dom->createElement("li");
        $this->link = self::$dom->createElement("a");
        //
        $this->link->setAttribute("href", $href);
        $this->item->appendChild($this->link);

        if (is_string($thing)) {
            $this->link->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }
        self::$domList[] = $this->item;
        return $this;
    }

    protected function setClasses()
    {
        self::$classes[] = "menu";

        if (!empty(self::$classes)) {
            $classes = implode(" ", self::$classes);
            self::$container->setAttribute("class", $classes);
        }
    }

    protected function setData()
    {
        if (!empty(self::$menuData)) {
            $data = implode(" ", self::$menuData);
            self::$container->appendChild(self::$dom->createAttribute($data));
        }
    }

    protected function assemble()
    {
        foreach (self::$domList as $item) {
            self::$container->appendChild($item);
        }
    }

    public function saveHTML()
    {
        $this->setClasses();
        $this->setData();
        $this->assemble();
        //
        return self::$dom->saveHTML();
    }
}
