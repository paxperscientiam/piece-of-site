<?PHP namespace Ramoose\PieceOfSite\Generators\Menus;

use Ramoose\PieceOfSite\Generators\Menus\Foundation\Submenu;

class Base
{
    public $menu;
    public $doc;
    public $lii;
    public $laa;
    public $ull;
    public $ele;
    //
    //
    public function __construct(Document $doc, $objMenu)
    {
        $this->doc = $doc;
        $this->menu = $objMenu;
        //
        $this->ele = $this->doc->createChunk("ul");
        //
        if (isset($this->menu->classes)) {
            $this->doc->setClasses($this->menu->classes, $this->ele);
        }
        if (isset($this->menu->menuData)) {
            $this->doc->setData($this->menu->menuData, $this->ele);
        }
    }

    public function addItem($thing, string $blob = "#")
    {
        $this->lii = $this->doc->createElement("li");
        $this->laa = $this->doc->createElement("a");
        //
        $this->doc->appendChild($this->laa, $this->lii);
        $this->doc->appendChild($this->lii, $this->ele);

        if (is_string($thing)) {
            $this->laa->textContent = $thing;
        }
        if ($thing instanceof Submenu) {
            $this->laa->textContent = $thing->header;
            $this->doc->appendChild($this->laa, $this->lii);
            $this->doc->setClasses($this->menu->subMenuClasses, $thing->subUll);

            if (isset($this->menu->firstllClass)) {
                $this->doc->setClasses($this->lii, $this->menu->firstllClass);
            }

            $this->doc->appendChild($thing->subUll, $this->lii);
        }

        $this->doc->setLink($blob, $this->laa);
        //
        return $this;
    }

    public function saveHTML()
    {
        return $this->doc->saveHTML();
    }
}
