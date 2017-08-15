<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Base extends Menu implements MenuInterface
{
    private $item;
    private $node;
    private $anchor;

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

    private function setClasses()
    {
        self::$classes[] = "menu";
        $classes = implode(" ", self::$classes);
        //
        self::$container->setAttribute("class", $classes);
        //
        // if (array_key_exists($this->menuSelection, $this->menuData)) {
        //     $this->container->appendChild($this->dom->createAttribute($this->menuData[$this->menuSelection]));
        // }
    }

    private function setData()
    {
        if (!empty(self::$menuData)) {
            $data = implode(" ", self::$menuData);
            self::$container->appendChild(self::$dom->createAttribute($data));
        }
    }

    private function assemble()
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
