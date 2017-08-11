<?PHP// namespace Ramoose\PieceOfSite\Generators;

/**
 * @SuppressWarnings(PHPMD.ElseExpression)
 */
class Menu
{
    private $dom;
    private $frag;
    private $container;
    private $lii;
    private $anchor;
    //
    private $menuSelection;
    private $menuType = [
        "simple" => "simple",
        "dropdown" => "dropdown",
        "drilldown" => "drilldown",
        "accordion" => "accordion-menu",
        "topbar" => "top-bar"
    ];
    private $menuData = [
        "dropdown" => "data-dropdown-menu",
        "drilldown" => "data-drilldown",
        "accordion" => "data-accordion-menu"
    ];
    private $classes = [];
    private $nestedOrientation;


    public function __construct(string $type = null)
    {
        $this->menuSelection = $type;
        try {
            if ($type !== null) {
                if (!array_key_exists($type, $this->menuType)) {
                    throw new \Exception("Supported menu types: ".implode(", ", array_keys($this->menuType)));
                }
                $this->classes[] = $this->menuType[$type];
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
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
        //
        $this->lii = $this->dom->createElement("li");
        $this->anchor = $this->dom->createElement("a");
        //
        $this->classes[] = "menu";
    }



    public function align(string $alignment)
    {
        try {
            switch ($alignment) {
                case "right":
                    $this->classes[] = "align-right";
                    break;
                case "center":
                    $this->classes[] = "align-center";
                    break;
                case "expanded":
                    $this->classes[] = "expanded";
                    break;
                case "left":
                    // 'left' is the default alignment
                    break;
                default:
                    throw new \Exception("Menu alignment '$alignment' unknown.");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $this;
    }

    public function orient(string $orientation, $nestedOrientation = "horizontal")
    {
        try {
            if (!in_array($nestedOrientation, ["vertical", "horizontal"])) {
                throw new \Exception("Allowed orientation for sub-menus: vertical, horizontal.");
            }
            $this->nestedOrientation = $nestedOrientation;
        } catch (\Exception $e) {
            echo $e->getMessage();
        }

        try {
            switch ($orientation) {
                case "v":
                case "vertical":
                    $this->classes[] = "vertical";
                    break;
                case "h":
                case "horizontal":
                    // do nothing cause this is default
                    break;
                default:
                    throw new \Exception("Menu orientation '$orientation' unknown.");
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
        return $this;
    }

    public function setLinks(array $links)
    {
        $rai = new \RecursiveArrayIterator($links);
        $rii = new \RecursiveIteratorIterator($rai, \RecursiveIteratorIterator::SELF_FIRST);
        //
        $rii->next();
        //
        while ($rii->valid()) {
            //
            $depth = $rii->getDepth();
            //
            $lii = clone $this->lii;

            $anchor = clone $this->anchor;

            if (!in_array($rii->current(), ["", null])) {
                $anchor->textContent = $rii->key();
                $lii->appendChild($anchor);
                //
            } else {
                $lii->textContent = $rii->key();
                $lii->setAttribute("class", "menu-text");
            }
            //
            if ($depth == 0) {
                $this->container->appendChild($lii);
            }

            if ($rii->callHasChildren()) {
                //
                $ull = $this->dom->createElement("ul");

                $ull->setAttribute("class", "nested menu ".$this->nestedOrientation);
                $lii->appendChild($ull);
                $anchor->setAttribute("href", "#");
                //
                $rgc = $rii->callGetChildren();
                while ($rgc->valid()) {
                    d($rii->key());
                    //
                    $llii = $this->dom->createElement("li");
                    $aaa = $this->dom->createElement("a");
                    $aaa->textContent = $rgc->key();
                    //
                    if ($rgc->hasChildren()) {
                        $aaa->setAttribute("href","#");
                    }
                    if (!$rgc->hasChildren()) {
                        $aaa->setAttribute("href", $rgc->current());
                    }
                    $llii->appendChild($aaa);
                    $ull->appendChild($llii);
                    $rgc->next();
                }
            }
            if (!$rii->callHasChildren()) {
                $anchor->setAttribute("href", $rii->current());
            }

            $rii->next();
        }
        return $this;
    }

    public function addDataAttribute(string $dataAttribute)
    {
        $this->container->appendChild($this->dom->createAttribute($dataAttribute));
    }

    private function setClasses()
    {
        $classes = implode(" ", $this->classes);
        //
        $this->container->setAttribute("class", $classes);
        //
        if (array_key_exists($this->menuSelection, $this->menuData)) {
            $this->container->appendChild($this->dom->createAttribute($this->menuData[$this->menuSelection]));
        }
    }
    private function assemble()
    {
        //
    }
    public function getHTML()
    {
        $this->setClasses();
        $this->assemble();
        //
        return $this->dom->saveHTML();
    }
}
