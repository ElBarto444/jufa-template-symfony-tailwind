<?php

namespace App\Entity;

use App\Repository\CourseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CourseRepository::class)]
class Course
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column(length: 50)]
    private ?string $duration = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $presentationVideo = null;

    #[ORM\ManyToOne(inversedBy: 'courses')]
    private ?Instructor $instructor = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $coursePicture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getDuration(): ?string
    {
        return $this->duration;
    }

    public function setDuration(string $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function getInstructor(): ?Instructor
    {
        return $this->instructor;
    }

    public function setInstructor(?Instructor $instructor): static
    {
        $this->instructor = $instructor;

        return $this;
    }

    public function getPresentationVideo(): ?string
    {
        return $this->presentationVideo;
    }

    public function setPresentationVideo(?string $presentationVideo): static
    {
        $this->presentationVideo = $presentationVideo;

        return $this;
    }

    public function getCoursePicture(): ?string
    {
        return $this->coursePicture;
    }

    public function setCoursePicture(?string $coursePicture): static
    {
        $this->coursePicture = $coursePicture;

        return $this;
    }
}
