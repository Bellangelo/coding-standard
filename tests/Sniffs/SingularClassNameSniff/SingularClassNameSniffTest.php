<?php

declare(strict_types=1);

namespace Bellangelo\CodesnifferNamingConventions\Sniffs;

use SlevomatCodingStandard\Sniffs\TestCase;

class SingularClassNameSniffTest extends TestCase
{
    public function testClassNameEndsInPlural(): void
    {
        $report = self::checkFile(__DIR__ . '/data/PluralInClassNames.php');

        self::assertSame(1, $report->getErrorCount());

        self::assertSniffError(
            $report,
            7,
            SingularClassNameSniff::CODE_PLURAL_IN_CLASS_NAME,
            'Class name should end in singular'
        );

        self::assertAllFixedInFile($report);
    }

    public function testClassNameEndsInSingular(): void
    {
        $report = self::checkFile(__DIR__ . '/data/NoPluralInClassName.php');

        self::assertSame(0, $report->getErrorCount());
    }

    public function testClassNameEndsInSButIsSingular(): void
    {
        $report = self::checkFile(__DIR__ . '/data/SingularWordThatEndsInSCrisis.php');

        self::assertSame(0, $report->getErrorCount());
    }

    public function testClassNameUsesPluralButDoesNotEndInS(): void
    {
        $report = self::checkFile(__DIR__ . '/data/PluralWordWithoutSChildren.php');

        self::assertSame(0, $report->getErrorCount());
    }
}