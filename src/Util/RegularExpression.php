<?php
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

/**
 * Error handler that converts PHP errors and warnings to exceptions.
 */
class RegularExpression
{
    /**
     * @param string $pattern
     * @param string $subject
     * @param null   $matches
     * @param int    $flags
     * @param int    $offset
     *
     * @throws \Exception
     *
     * @return false|int
     */
    public static function safeMatch($pattern, $subject, $matches = null, $flags = 0, $offset = 0)
    {
        $handler_terminator = ErrorHandler::handleErrorOnce();
        $match              = \preg_match($pattern, $subject, $matches, $flags, $offset);
        $handler_terminator();

        return $match;
    }
}
