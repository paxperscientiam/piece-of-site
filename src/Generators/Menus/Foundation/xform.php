<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class XForm
{
    public $classes = [];

    public function align(string $alignment)
    {
        $this->classes = $this->menu->classes;
        $alignment = strtolower($alignment);
        try {
            switch ($alignment) {
                case "right":
                case "r":
                    $this->menu->classes[] = "align-right";
                    break;
                case "center":
                case "c":
                    $this->menu->classes[] = "align-center";
                    break;
                case "expanded":
                case "e":
                case "x":
                    $this->menu->classes[] = "expanded";
                    break;
                case "left":
                case "l":
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

    public function orient(string $orientation)
    {
        $this->classes = $this->menu->classes;
        $orientation = strtolower($orientation);
        try {
            switch ($orientation) {
                case "v":
                case "vertical":
                    $this->menu->classes[] = "vertical";
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
}
