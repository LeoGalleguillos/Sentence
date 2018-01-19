<?php
namespace LeoGalleguillos\Sentence;

use LeoGalleguillos\Sentence\Model\Service as SentenceService;
use LeoGalleguillos\Word\Model\Service as WordService;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                SentenceService\ReplaceWords::class => function ($serviceManager) {
                    return new SentenceService\ReplaceWords(
                        $serviceManager->get(WordService\Synonym::class)
                    );
                },
            ],
        ];
    }
}
