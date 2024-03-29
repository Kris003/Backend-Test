<?php

namespace App\Entity;

use App\Repository\JobsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobsRepository::class)]
#[ORM\Table(name: 'job')] // specify the table name
class Jobs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', options: ["default" => null])]
    private ?int $id = null;

    #[ORM\Column(type: 'string', name: 'name', length: 255, options: ["default" => null])]
    private ?string $name = null;

    #[ORM\Column(type: 'string', name: 'date', options: ["default" => null])]
    private ?string $date = null;

    #[ORM\Column(type: 'boolean', name: 'status', options: ["default" => null])]
    private ?bool $status = null;

    #[ORM\Column(type: 'string', name: 'assesment', options: ["default" => null])]
    private ?string $assesment = null;

    #[ORM\Column(type: 'string', name: 'utc', options: ["default" => null])]
    private ?string $utc = null;

    public function getId(): ?int
    {
        return $this->id;
    }



    // Add getters and setters for the new properties here

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getAssesment()
    {
        return $this->assesment;
    }

    public function setAssesment($assesment)
    {
        $this->assesment = $assesment;
        return $this;
    }

    public function getutc()
    {
        return $this->utc;
    }

    public function setutc($utc)
    {
        $this->utc = $utc;
        return $this;
    }

    public function __construct()
{
    $this->setTs(new \DateTime());
}

public function setTs($ts)
{
    $this->ts = $ts;

    return $this;
}

}
