<?PHP namespace App\Moose\Generators;
// @codingStandardsIgnoreFile
use App\Moose\Data\Handlers\Filesystem;
use App\Moose\Data\Handlers\UrlBuilder;
use App\Moose\Util\Path\Join as Path;


abstract class Gallery
{
    protected $recursive;
    protected $path;
    protected $contents;

    // in html
    abstract public function __construct(Filesystem $filesystem);
    abstract public function buildList(string $path, $max);
    abstract public function getHTML();
}

// dynamic gallery based on what not
class FoundationGallery extends Gallery
{
    protected $recursive;
    protected $path;
    protected $contents;
    protected $max;
    private   $count = 0;

    public function __construct(Filesystem $filesystem)
    {
        $this->filesystem = $filesystem;
        $this->doc = new \DOMDocument();
        $this->doc->encoding = 'UTF-8';
        $this->doc->formatOutput = true;
        $this->doc->normalizeDocument();
    }

    public function buildList(
        string $path = "./",
        $max = -1
    ) {

        $this->path = $path;
        $this->recursive = false;
        $this->max = $max;

        $this->contents = $this->filesystem->get()->listContents($this->path, $this->recursive);

        // Gallery Root
        $this->domFrag = $this->doc->createDocumentFragment();
        $this->divRoot = $this->doc->createElement("div");
        $this->divRoot->setAttribute("class", "small-up-1 medium-up-2 large-up-3 row");

        // Item
        $this->divItem = $this->doc->createElement("div");
        $this->divItem->setAttribute("class", "columns");

        // Image
        $this->img = $this->doc->createElement("img");

        // Assemble
        $this->domFrag->appendChild($this->divRoot);
        $this->doc->appendChild($this->domFrag);

        // shuffle
        shuffle($this->contents);
        foreach ($this->contents as $object) {
            if ($object['type'] === 'file' && $object['extension'] === 'png') {
                if ($this->count++ === $this->max) {
                    break;
                }

                $this->path = $object['path'];

                // Clone wars
                $img = clone $this->img;
                $divItemClone = clone $this->divItem;

                //$url = $request->sign();
                $divItemClone->setAttribute("href", $this->path);

                $img->setAttribute("src", $this->path);
                $img->setAttribute("alt", "derp");

                // Assemble
                $divItemClone->appendChild($img);
                $this->divRoot->appendChild($divItemClone);
            }
        }
    }

    public function getHTML()
    {
        return $this->doc->saveHTML();
    }
}
