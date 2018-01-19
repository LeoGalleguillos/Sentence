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
}
