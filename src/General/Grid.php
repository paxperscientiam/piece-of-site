<?php namespace Ramoose\PieceOfSite\General;

class Grid
{
    private $gridOptions = ["xy", "float", "flex"];

    public function __construct(string $gridSelection)
    {
        $this->gridSelection = $gridSelection;

        try {
            if (!in_array($this->gridSelection, $this->gridOptions, true)) {
                throw new \Exception("Exception! Valid grid choices: ". implode(", ", $this->gridOptions));
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
