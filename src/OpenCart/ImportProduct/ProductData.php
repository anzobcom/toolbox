<?php

declare(strict_types=1);

namespace Anzob\Toolbox\OpenCart\ImportProduct;

final class ProductData
{
    public function __construct(
        private string $title,
        private string $description
    ) {
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
