<?php
namespace LeoGalleguillos\Sentence\Model\Service;

use Exception;
use LeoGalleguillos\Sentence\Model\Service as SentenceService;

class Variations
{
    public function __construct(
        SentenceService\ReplaceWords $replaceWordsService
    ) {
        $this->replaceWordsService = $replaceWordsService;
    }

    public function getVariations(
        string $sentence,
        int $numberOfVariations,
        int $startingDividend = 0,
        float $maxPercent = 33
    ) : array {
        $currentDividend = $startingDividend;
        $variations      = [];

        for ($variationCount = 1; $variationCount <= $numberOfVariations; $variationCount++) {
            $variations[] = $this->replaceWordsService->replaceWords(
                $sentence,
                $currentDividend,
                $maxPercent
            );
            $currentDividend++;
        }
        return $variations;
    }
}
