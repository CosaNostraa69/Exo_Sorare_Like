<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\CardRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CardRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(
            normalizationContext: ['groups' => ['cards_read']]
        ),
        new Get(
            normalizationContext: ['groups' => ['card_read']]
        )
    ],
)]
class Card
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['cards_read', 'card_read'])]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    #[Groups(['card_read'])]
    private ?User $owner = null;

    #[ORM\ManyToOne(inversedBy: 'cards')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['cards_read', 'card_read'])]
    private ?Player $player = null;

    #[ORM\Column(length: 255)]
    #[Groups(['card_read'])]
    private ?string $scarcity = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }

    public function getPlayer(): ?Player
    {
        return $this->player;
    }

    public function setPlayer(?Player $player): static
    {
        $this->player = $player;

        return $this;
    }

    public function getScarcity(): ?string
    {
        return $this->scarcity;
    }

    public function setScarcity(string $scarcity): static
    {
        $this->scarcity = $scarcity;

        return $this;
    }
}
