<?php

namespace Medialeads\Apiv3Client\Common;

interface ProductInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getTitle();

    public function getImage();

    /**
     * @return array
     */
    public function getImages();

    /**
     * @return int
     */
    public function getIdProductGroup();

    /**
     * @return int
     */
    public function getIdProduct();

    /**
     * @return int
     */
    public function getIdSupplier();

    /**
     * @return string
     */
    public function getSupplierName();

    /**
     * @return string
     */
    public function getReferenceSupplier();

    /**
     * @return string
     */
    public function getReference();

    public function getPrice();

    /**
     * @return string
     */
    public function getUniqKey();
}
