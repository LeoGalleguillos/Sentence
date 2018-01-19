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
     * @param float $percent
     * @return $sentence
     */
    public function replaceWords(string $sentence, float $percent = 33) : string
    {
        return $sentence;
    }
}
