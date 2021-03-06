<?php

/*
 * This file is part of the Rest-Control package.
 *
 * (c) Kamil Szela <kamil.szela@cothe.pl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RestControl\Validators;

use Zend\Validator\Uri;

/**
 * Class URIValidator
 */
class URIValidatorAdapter extends AbstractValidatorAdapter
{
    /**
     * {@inheritdoc}
     */
    public function isValid($value, array $options = [])
    {
        $validator = $this->getValidator(Uri::class);

        return $validator->isValid($value);
    }
}