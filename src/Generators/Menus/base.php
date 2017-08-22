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

        if (is_string($thing)) {
            $this->item->appendChild($this->link);
            $this->link->textContent = $thing;
        }
        if ($thing instanceof SubMenu) {
            $thing->anchorThis($this->item);
        }
        self::$domList[] = $this->item;
        return $this;
    }

    protected function setClasses(\DOMElement $obj, $classes)
    {
        if (!empty(self::$classes)) {
            $classes = implode(" ", $classes);
            $obj->setAttribute("class", $classes);
        }
        return $this;
    }

    protected function setData(\DOMElement $obj, array $data)
    {
        if (!empty($data)) {
            $data = implode(" ", self::$menuData);
            $obj->appendChild(self::$dom->createAttribute($data));
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
        self::$classes[] = "menu";
        $this->setClasses(self::$container, self::$classes);
        $this->setData(self::$container, self::$menuData);
        $this->assemble();
        //
        return self::$dom->saveHTML();
    }
}
