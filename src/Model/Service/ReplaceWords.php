<?php
namespace LeoGalleguillos\Sentence\Model\Service;

use LeoGalleguillos\Word\Model\Service as WordService;

class ReplaceWords
{
    public function __construct(
        WordService\Synonym $synonymService
    ) {
        $this->synonymService = $synonymService;
    }

    /**
     * Replace words.
     *
     * @param string $sentence
     * @param float $maxPercent Max percent of words to replace
     * @param int $dividend Used to determine which synonym to choose
     * @return $sentence
     */
    public function replaceWords(
        string $sentence,
        float $maxPercent = 33,
        int $dividend = 0
    ) : string {
        $words = preg_split('/\s+/', $sentence);
        return $sentence;
    }
}
