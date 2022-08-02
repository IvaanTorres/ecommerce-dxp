<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/** A product */
#[ORM\Entity]
#[ApiResource(
  //! Only the "item_query", "collection_query" and "create" operations are allowed for this resource.
  graphql: ['item_query', 'collection_query', 'create']
)]
class Product {
    /** The product id */
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    private ?int $id = null;
    /** The product name */
    #[ORM\Column] 
    #[Assert\NotBlank]
    private string $name = '';
    // Notice the "cascade" option below, this is mandatory if you want Doctrine to automatically persist the related entity
    /**
     * @var Offer[]|ArrayCollection
     *
     */
    #[ORM\OneToMany(targetEntity: Offer::class, mappedBy: 'product', cascade: ['persist'])] 
    public iterable $offers;

    public function __construct()
    {
        $this->offers = new ArrayCollection(); // Initialize $offers as a Doctrine collection
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    // Adding both an adder and a remover as well as updating the reverse relation is mandatory
    // if you want Doctrine to automatically update and persist (thanks to the "cascade" option) the related entity
    public function addOffer(Offer $offer): void
    {
        $offer->product = $this;
        $this->offers->add($offer);
    }

    public function removeOffer(Offer $offer): void
    {
        $offer->product = null;
        $this->offers->removeElement($offer);
    }
}