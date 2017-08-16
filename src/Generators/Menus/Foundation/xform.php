<?PHP namespace Ramoose\PieceOfSite\Generators\Menus\Foundation;

use Ramoose\PieceOfSite\Generators\Menus\Base;

class XForm extends Base
{
    public function align(string $alignment)
    {
        $alignment = strtolower($alignment);
        try {
            switch ($alignment) {
                case "right":
                    self::$classes[] = "align-right";
                    break;
                case "center":
                    self::$classes[] = "align-center";
                    break;
                case "expanded":
                    self::$classes[] = "expanded";
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

    public function orient(string $orientation)
    {
        $orientation = strtolower($orientation);
        try {
            switch ($orientation) {
                case "v":
                case "vertical":
                    self::$classes[] = "vertical";
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
