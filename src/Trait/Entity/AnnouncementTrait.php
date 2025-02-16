<?php 
namespace OSW3\UX\Trait\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait AnnouncementTrait
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(name: "`message`", type: Types::STRING, length: 255, nullable: false)]
    private ?string $message = null;

    #[ORM\Column(name: "`order`", type: Types::INTEGER, nullable: true, options:["unsigned" => true] )]
    private ?int $order = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getOrderBy(): ?int
    {
        return $this->orderBy;
    }

    public function setOrderBy(?int $orderBy): static
    {
        $this->orderBy = $orderBy;

        return $this;
    }
}