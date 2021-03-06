<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\TestCase\Traits;

use RestControl\TestCase\Request;

trait RequestTrait
{
    /**
     * @param null|mixed $body
     *
     * @return $this
     */
    public function body($body = null)
    {
        return $this->_add(Request::CO_BODY, func_get_args());
    }

    /**
     * @param array $formParams
     *
     * @return $this
     */
    public function formParams(array $formParams = [])
    {
        return $this->_add(Request::CO_FORM_PARAMS, func_get_args());
    }

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function header($name, $value)
    {
        return $this->_add(Request::CO_HEADER, [$name, $value]);
    }
}