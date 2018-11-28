<?php
/**
 * Copyright (c) 2018.
 */
/**
 * User: abdullah
 * Date: 22.11.2018
 * Time: 10:00
 */
namespace AppWorkBundle\Html;

/**
 * Class Document
 */
final class Document extends \DOMDocument
{

    /**
     * Document constructor
     *
     * @param string|null $sVersion [optional] The version number of the document as part of the XML declaration
     * @param string|null $sEncoding [optional] The encoding of the document as part of the XML declaration
     * @return void
     */
    public function __construct(?string $sVersion = NULL, ?string $sEncoding = NULL)
    {
        parent::__construct($sVersion, $sEncoding);
        $this->registerNodeClass('\DOMElement', Tag::class);
        $this->registerNodeClass('\DOMAttr', TagAttribute::class);
    }

    /**
     * @param string|null $sVersion [optional]
     * @param string|null $sEncoding [optional]
     * @return Document
     */
    public static function create(?string $sVersion = NULL, ?string $sEncoding = NULL): Document
    {
        return new static($sVersion, $sEncoding);
    }

}