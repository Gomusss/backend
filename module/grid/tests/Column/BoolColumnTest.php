<?php
/**
 * Copyright © Bold Brand Commerce Sp. z o.o. All rights reserved.
 * See license.txt for license details.
 */

namespace Ergonode\Grid\Tests\Column;

use Ergonode\Grid\Column\BoolColumn;
use Ergonode\Grid\FilterInterface;
use PHPUnit\Framework\TestCase;

/**
 */
class BoolColumnTest extends TestCase
{
    /**
     */
    public function testGetters(): void
    {
        $field = 'Any field';
        $label = 'Any label';
        $filter = $this->createMock(FilterInterface::class);

        $column = new BoolColumn($field, $label, $filter);
        $this->assertSame($field, $column->getField());
        $this->assertSame($label, $column->getLabel());
        $this->assertSame($filter, $column->getFilter());
        $this->assertSame(BoolColumn::TYPE, $column->getType());
    }

    /**
     */
    public function testRender(): void
    {
        $field = 'Any id';
        $label = 'Any label';
        $record = [$field => true];

        $column = new BoolColumn($field, $label);
        $result = $column->render($field, $record);
        $this->assertSame($record[$field], $result);
    }
}
