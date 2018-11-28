<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 14:38
 */
namespace AppWorkBundle;

/**
 * Interface JsonableInterface
 */
interface JsonableInterface
{
    
    /**
     * @param bool $bPrettify
     * @return string
     */
    public function toJson(bool $bPrettify = FALSE): string;
    
}