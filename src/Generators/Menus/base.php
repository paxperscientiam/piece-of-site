<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Base extends Menu implements MenuInterface
{
    protected $dom;
    protected $container;
    protected $frag;
    protected $subMenu;
    //
    protected $classes = [];
    protected $subMenuClasses = [];
    //
    protected $menuData = [];
    protected $subMenuData = [];
    protected $domList = [];
    //
    protected $objMenu;

    public function __construct($objMenu)
    {
        $this->objMenu = $objMenu;
        //
        $this->dom = new \DOMDocument();
        $this->dom->encoding = 'UTF-8';
        $this->dom->formatOutput = true;
        $this->dom->normalizeDocument();
        //
        $this->frag = $this->dom->createDocumentFragment();
        $this->container = $this->dom->createElement("ul");
        //
        $this->frag->appendChild($this->container);
        $this->dom->appendChild($this->frag);
    }
    /**
     * @param string|SubMenu, string
     */
    public function addItem($thing, string $href = "#")
    {
        //  d("parent",$thing, $this);
        if (!($thing instanceof SubMenu)) {
            $item = $this->dom->createElement("li");
            $link = $this->dom->createElement("a");

            $link->setAttribute("href", $href);
            $item->appendChild($link);
            $reflected = (new \ReflectionClass($this))->getShortName();
            if ($reflected === "SubMenu") {
                d($thing, $this, get_called_class());
                return $this;
            }
        }
        if ($thing instanceof SubMenu) {
            $subDom = $thing->subDom;
            $subItem = $subDom->createElement("li");
            $subLink = $subDom->createElement("a");

            $this->importNode($subItem);
            //
            // $link->setAttribute("href", $href);
            // $item->appendChild($link);
            // $this->subMenu = $this->dom->createElement("ul");
            // $item->appendChild($this->subMenu);
            // $this->setClasses($this->subMenu, $this->objMenu->subMenuClasses);
            // $this->setData($this->subMenu, $this->objMenu->subMenuData);
            // $thing->anchorThisTo($link, $this->dom);
        }
        if (is_string($thing)) {
            $link->textContent = $thing;
        }
        // might condition test NOT submenu...
        $this->domList[] = $item;

        return $this;
    }

    protected function setClasses(\DOMElement $obj, array $classes)
    {
        if (!empty($classes)) {
            $classes = implode(" ", $classes);
            $obj->setAttribute("class", $classes);
        }
        return $this;
    }

    protected function setData(\DOMElement $obj, array $data)
    {
        if (!empty($data)) {
            $data = implode(" ", $data);
            $obj->appendChild($this->dom->createAttribute($data));
        }
    }

    private function importNode($subItem)
    {
        $this->dom->importNode($subItem, TRUE);
    }

    private function assemble()
    {
        foreach ($this->domList as $item) {
            $this->container->appendChild($item);
        }
    }

    public function saveHTML()
    {
        $this->classes[] = "menu";
        $this->setClasses($this->container, $this->objMenu->classes);
        $this->setData($this->container, $this->objMenu->menuData);
        $this->assemble();
        //
        return $this->dom->saveHTML();
    }
}
