<?php declare(strict_types = 1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
	->withPaths([__DIR__ . '/BellangeloCodingStandard', __DIR__ . '/tests'])
	->withSkip([__DIR__ . '/tests/Commands/data'])
	->withPreparedSets(codeQuality: true, codingStyle: true, typeDeclarations: true, privatization: true, naming: true, earlyReturn: true)
	->withPhpSets()
	->withRootFiles()
	->withImportNames();
