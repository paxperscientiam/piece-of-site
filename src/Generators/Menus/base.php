<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Base extends Menu implements MenuInterface
{
    /**
     * @param string|SubMenu, string
     */
    public function addItem($thing, string $href = "#")
    {
        $item = self::$dom->createElement("li");
        $link = self::$dom->createElement("a");

        $link->setAttribute("href", $href);
        $item->appendChild($link);

        $reflect = new \ReflectionClass(get_called_class());

        if ($reflect->getShortName() === 'SubMenu') {
            $this->subMenu->appendChild($item);
        }

        if ($thing instanceof SubMenu) {
            $thing->anchorThisTo($item, $link);
        }

        if (is_string($thing)) {
            //            d($thing);
            $link->textContent = $thing;
        }

        if ($reflect->getShortName() === 'Dropdown') {
            self::$domList[] = $item;
        }

        return $this;
    }

    protected function setClasses(\DOMElement $obj, array $classes)
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
            $data = implode(" ", $data);
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
