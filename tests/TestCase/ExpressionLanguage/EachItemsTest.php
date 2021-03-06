<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\Tests\TestCase\ExpressionLanguage;

use PHPUnit\Framework\TestCase;
use RestControl\TestCase\ExpressionLanguage\EachItems;
use RestControl\TestCase\ExpressionLanguage\Expression;

class EachItemsTest extends TestCase
{
    public function testChecker()
    {
        $checker = new EachItems();

        $this->assertSame('eachItems', $checker->getName());

        $this->assertTrue($checker->check(
            $this->getExpression([
                [new Expression('lessThan', [20])]
            ]),
            [
                14,
                15,
                16,
            ]
        ));

        $this->assertFalse($checker->check(
            $this->getExpression([
                [new Expression('lessThan', [20])]
            ]),
            [
                14,
                20,
                16,
            ]
        ));
    }

    /**
     * @param array $params
     *
     * @return Expression
     */
    protected function getExpression(array $params = [])
    {
        return new Expression('eachItems', $params);
    }
}