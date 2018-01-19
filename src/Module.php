<?php
namespace LeoGalleguillos\Sentence;

use LeoGalleguillos\Sentence\Model\Service as SentenceService;

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
                    );
                },
            ],
        ];
    }
}
