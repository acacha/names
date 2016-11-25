<?php

namespace Acacha\Names\Exceptions;


/**
 * Class ModelHaveNoKey.
 */
class ModelHaveNoKey extends \Exception
{
    protected $message = "Model doesn't have key. Please save/create model before using alternative name attributes";
}