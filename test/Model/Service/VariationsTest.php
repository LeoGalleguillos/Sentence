<?php
namespace LeoGalleguillos\SentenceTest\Model\Service;

use Exception;
use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use LeoGalleguillos\Word\Model\Entity as WordEntity;
use LeoGalleguillos\Word\Model\Service as WordService;
use PHPUnit\Framework\TestCase;

class VariationsTest extends TestCase
{
    protected function setUp()
    {
        $this->replaceWordsServiceMock = $this->createMock(
            SentenceService\ReplaceWords::class
        );
        $this->variationsService = new SentenceService\Variations(
            $this->replaceWordsServiceMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            SentenceService\Variations::class,
            $this->variationsService
        );
    }

    public function testGetVariations()
    {
        $this->replaceWordsServiceMock->method('replaceWords')->will(
            $this->onConsecutiveCalls(
                'sentence one', 'sentence two', 'sentence three', 'sentence four'
            )
        );
        $variations = $this->variationsService->getVariations(
            'this is the sentence',
            3,
            5,
            50
        );
        $this->assertSame(
            [
                'sentence one',
                'sentence two',
                'sentence three',
            ],
            $variations
        );
    }
}
