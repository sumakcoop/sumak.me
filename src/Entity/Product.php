<?php
// This file is part of Sumak.me
// Copyright (C) 2020,2021 Asociación SUMAK <info (at) sumakcoop (dot) org
// 
// Sumak.me is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
// 
// Sumak.me is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
// 
// You should have received a copy of the GNU Affero General Public License
// along with Sumak.me.  If not, see <http://www.gnu.org/licenses/>.

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="sumak_product", indexes={@ORM\Index(name="fk_id_parent", columns={"id_parent"})})
 * @ORM\Entity
 */
class Product
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="id_default_category", type="integer", nullable=false)
     */
    private $idDefaultCategory;

    /**
     * @var int
     *
     * @ORM\Column(name="id_seller", type="integer", nullable=false)
     */
    private $idSeller;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=10, nullable=false)
     */
    private $type;

    /**
     * @var string|null
     *
     * @ORM\Column(name="reference", type="string", length=100, nullable=true)
     */
    private $reference;

    /**
     * @var string|null
     *
     * @ORM\Column(name="ean13", type="string", length=100, nullable=true)
     */
    private $ean13;

    /**
     * @var int
     *
     * @ORM\Column(name="on_sale", type="integer", nullable=false)
     */
    private $onSale;

    /**
     * @var int
     *
     * @ORM\Column(name="active", type="integer", nullable=false)
     */
    private $active;

    /**
     * @var int
     *
     * @ORM\Column(name="id_tax_group", type="integer", nullable=false)
     */
    private $idTaxGroup;

    /**
     * @var int
     *
     * @ORM\Column(name="quantity", type="integer", nullable=false)
     */
    private $quantity = '0';

    /**
     * @var int
     *
     * @ORM\Column(name="low_stock_alert", type="integer", nullable=false, options={"default"="1"})
     */
    private $lowStockAlert = '1';

    /**
     * @var int
     *
     * @ORM\Column(name="min_quantity", type="integer", nullable=false, options={"default"="1"})
     */
    private $minQuantity = '1';

    /**
     * @var float|null
     *
     * @ORM\Column(name="weight", type="float", precision=10, scale=0, nullable=true)
     */
    private $weight;

    /**
     * @var float|null
     *
     * @ORM\Column(name="width", type="float", precision=10, scale=0, nullable=true)
     */
    private $width;

    /**
     * @var float|null
     *
     * @ORM\Column(name="height", type="float", precision=10, scale=0, nullable=true)
     */
    private $height;

    /**
     * @var float|null
     *
     * @ORM\Column(name="depth", type="float", precision=10, scale=0, nullable=true)
     */
    private $depth;

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_parent", referencedColumnName="id")
     * })
     */
    private $idParent;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdDefaultCategory(): ?int
    {
        return $this->idDefaultCategory;
    }

    public function setIdDefaultCategory(int $idDefaultCategory): self
    {
        $this->idDefaultCategory = $idDefaultCategory;

        return $this;
    }

    public function getIdSeller(): ?int
    {
        return $this->idSeller;
    }

    public function setIdSeller(int $idSeller): self
    {
        $this->idSeller = $idSeller;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(?string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    public function setEan13(?string $ean13): self
    {
        $this->ean13 = $ean13;

        return $this;
    }

    public function getOnSale(): ?int
    {
        return $this->onSale;
    }

    public function setOnSale(int $onSale): self
    {
        $this->onSale = $onSale;

        return $this;
    }

    public function getActive(): ?int
    {
        return $this->active;
    }

    public function setActive(int $active): self
    {
        $this->active = $active;

        return $this;
    }

    public function getIdTaxGroup(): ?int
    {
        return $this->idTaxGroup;
    }

    public function setIdTaxGroup(int $idTaxGroup): self
    {
        $this->idTaxGroup = $idTaxGroup;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getLowStockAlert(): ?int
    {
        return $this->lowStockAlert;
    }

    public function setLowStockAlert(int $lowStockAlert): self
    {
        $this->lowStockAlert = $lowStockAlert;

        return $this;
    }

    public function getMinQuantity(): ?int
    {
        return $this->minQuantity;
    }

    public function setMinQuantity(int $minQuantity): self
    {
        $this->minQuantity = $minQuantity;

        return $this;
    }

    public function getWeight(): ?float
    {
        return $this->weight;
    }

    public function setWeight(?float $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getWidth(): ?float
    {
        return $this->width;
    }

    public function setWidth(?float $width): self
    {
        $this->width = $width;

        return $this;
    }

    public function getHeight(): ?float
    {
        return $this->height;
    }

    public function setHeight(?float $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getDepth(): ?float
    {
        return $this->depth;
    }

    public function setDepth(?float $depth): self
    {
        $this->depth = $depth;

        return $this;
    }

    public function getIdParent(): ?self
    {
        return $this->idParent;
    }

    public function setIdParent(?self $idParent): self
    {
        $this->idParent = $idParent;

        return $this;
    }


}
