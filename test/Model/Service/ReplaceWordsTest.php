<?php
namespace LeoGalleguillos\SentenceTest\Model\Service;

use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use PHPUnit\Framework\TestCase;

class ReplaceWordsTest extends TestCase
{
    protected function setUp()
    {
        $this->replaceWordsService = new SentenceService\ReplaceWords();
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
