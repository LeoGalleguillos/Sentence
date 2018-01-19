<?php
namespace LeoGalleguillos\SentenceTest\Model\Service;

use Exception;
use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use LeoGalleguillos\Word\Model\Entity as WordEntity;
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

        $this->wordEntity1         = new WordEntity\Word();
        $this->wordEntity1->wordId = 1;
        $this->wordEntity1->word   = 'test';

        $this->wordEntity2         = new WordEntity\Word();
        $this->wordEntity2->wordId = 2;
        $this->wordEntity2->word   = 'Experiment';

        $this->wordEntity3         = new WordEntity\Word();
        $this->wordEntity3->wordId = 3;
        $this->wordEntity3->word   = 'wonderful';

        $this->wordEntity4         = new WordEntity\Word();
        $this->wordEntity4->wordId = 4;
        $this->wordEntity4->word   = 'phrase';
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
        $this->synonymServiceMock->method('getSynonymWithCapitalization')->will(
            $this->onConsecutiveCalls(
                $this->wordEntity2,
                $this->throwException(new Exception('Unable to get synonyms.')),
                $this->wordEntity3,
                $this->wordEntity4
            )
        );
        $sentence = 'Test this awesome sentence.';
        $this->assertSame(
            'Experiment this wonderful phrase',
            $this->replaceWordsService->replaceWords($sentence, 0)
        );
    }
}
