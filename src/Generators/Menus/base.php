<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

class Base extends Menu implements MenuInterface
{
    protected $dom;
    protected $container;
    protected $frag;
    //
    protected $classes = [];
    protected $subMenuClasses = [];
    protected $menuData = [];
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
        // //
        $this->frag = $this->dom->createDocumentFragment();
        $this->container = $this->dom->createElement("ul");
        // //
        $this->frag->appendChild($this->container);
        $this->dom->appendChild($this->frag);
    }
    /**
     * @param string|SubMenu, string
     */
    public function addItem($thing, string $href = "#")
    {
        $item = $this->dom->createElement("li");
        $link = $this->dom->createElement("a");

        $link->setAttribute("href", $href);
        $item->appendChild($link);

        $reflect = new \ReflectionClass(get_called_class());

        if ($reflect->getShortName() === 'SubMenu') {
            $this->subMenu->appendChild($item);
        }

        if ($thing instanceof SubMenu) {
            $thing->anchorOBThisTo($item, $link, $this->dom);
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

    protected function assemble()
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
