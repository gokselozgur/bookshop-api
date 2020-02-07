<?php
// api/src/Document/Offer.php

namespace App\Document;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(iri="http://schema.org/Offer")
 *
 * @ODM\Document
 */
class Offer
{
    /**
     * @ODM\Id(strategy="INCREMENT", type="integer")
     */
    private $id;

    /**
     * @ODM\Field
     */
    public $description;

    /**
     * @ODM\Field(type="float")
     * @Assert\NotBlank
     * @Assert\Range(min=0, minMessage="The price must be superior to 0.")
     * @Assert\Type(type="float")
     */
    public $price;

    /**
     * @ODM\ReferenceOne(targetDocument=Product::class, inversedBy="offers", storeAs="id")
     */
    public $product;

    public function getId(): ?int
    {
        return $this->id;
    }
}