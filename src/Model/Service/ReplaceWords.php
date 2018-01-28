<?php
namespace LeoGalleguillos\Sentence\Model\Service;

use Exception;
use LeoGalleguillos\Word\Model\Service as WordService;

class ReplaceWords
{
    /**
     * Construct.
     *
     * @param WordService\Synonym $synonymService
     */
    public function __construct(
        WordService\Synonym $synonymService
    ) {
        $this->synonymService = $synonymService;
    }

    /**
     * Replace words.
     *
     * @param string $sentence
     * @param int $dividend Used to determine which synonym to choose
     * @param float $maxPercent Max percent of words to replace
     * @return string
     */
    public function replaceWords(
        string $sentence,
        int $dividend,
        float $maxPercent = 33
    ) : string {
        $words = preg_split('/\s+/', $sentence);

        $numberOfWordsReplaced = 0;

        foreach ($words as $index => $word) {
            try {
                $synonym = $this->synonymService->getSynonymWithCapitalization(
                    $word,
                    $dividend
                );
                $words[$index] = $synonym->word;
                $numberOfWordsReplaced++;
            } catch (Exception $exception) {

            }
        }

        return implode(' ', $words);
    }
}
