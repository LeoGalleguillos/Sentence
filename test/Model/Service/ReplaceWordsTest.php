<?php
namespace LeoGalleguillos\SentenceTest\Model\Service;

use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use LeoGalleguillos\Word\Model\Service as WordService;
use PHPUnit\Framework\TestCase;

class ReplaceWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->synonymServiceMock = $this->createMock(
            WordService\Synonym::class
        );
        $this->replaceWordsService = new SentenceService\ReplaceWords(
            $this->synonymServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            SentenceService\ReplaceWords::class,
            $this->replaceWordsService
        );
    }

    public function testReplaceWords()
    {
        $sentence = 'This is the amazing sentence.';
        $this->assertSame(
            $sentence,
            $this->replaceWordsService->replaceWords($sentence)
        );
    }
}
