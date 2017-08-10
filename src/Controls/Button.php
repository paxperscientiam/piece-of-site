<?PHP namespace Ramoose\PieceOfSite\Controls;

use Ramoose\PieceOfSite\Foundation;

class Button extends Foundation
{
    public $button;
    private $elType;
    private $types = ["action" => "button",
                      "link" => "link"];
    private $colors = ["primary", "secondary", "success", "alert", "warning"];

    private $classes = ["button"];

    public function __construct(Foundation $foundation)
    {
        $this->button = $foundation->doc->createElement("button");
        $this->button->setAttribute("type", "button");


        $foundation->body->appendChild($this->button);

        $buttonType = "action";
        $this->test($buttonType);

        $this->elType = $this->types[$buttonType];

        // if ($buttonParent === null) {
        //     d($this->Foundation()->fragment);die();
        //     //            $this->Foundation->fragment->appendChild($this->button);
        // }
    }


    public function text(string $text = "")
    {
        $this->button->textContent = $text;
        return $this;
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, $this->colors, true)) {
            $this->classes[] = $method;
            return $this;
        }
        try {
            throw new \Exception("Exception! Valid button colors: ". implode(", ", $this->colors));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function create()
    {

        $this->button->setAttribute("class", implode(" ", $this->classes));
        //
        //return $this->button->saveHTML();
        return $this->button;
    }

    private function test($userButtonType)
    {
        try {
            if (!array_key_exists($userButtonType, $this->types)) {
                throw new \Exception("Exception! Valid button choices: ". implode(", ", $this->types));
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
