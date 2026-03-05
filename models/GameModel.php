<?php

namespace App\Models;

use App\Config\Database;
use App\Models\UserModel;
use PDO;

class Game extends Database {

    private ?int $id;
    private string $title;
    private string $description;
    private string $image;
    private float $price;
    private int $release_year;
    private int $note;
    private int $duration;
    private bool $favorite;
    private string $status;
    private string $studio;
    private int $id_user;

    public function __construct(string $title, string $description, string $image, float $price, int $release_year, int $note , int $duration, bool $favorite, string $status, string $studio, int $id_user, ?int $id = null){
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->price = $price;
        $this->release_year = $release_year;
        $this->note = $note;
        $this->duration = $duration;
        $this->favorite = $favorite;
        $this->status = $status;
        $this->studio = $studio;
        $this->id_user = $id_user;
        
    }

    // -------------------------------------- Getters ------------------------------------

    public function getId(): ?int {
        return $this->id;
    }

    public function getTitle(): string {
        return $this->title;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getImage(): string {
        return $this->image;
    }

    public function getPrice(): float {
        return $this->price;
    }

    public function getReleaseYear(): int {
        return $this->release_year;
    }

    public function getNote(): int {
        return $this->note;
    }

    public function getDuration(): int {
        return $this->duration;
    }

    public function getFavorite(): bool {
        return $this->favorite;
    }

    public function getStatus(): string {
        return $this->image;
    }

    public function getStudio(): string {
        return $this->image;
    }

    public function getIdUser(): int {
        return $this->id_user;
    }

    // -------------------------------------- Setters ------------------------------------

    public function setTitle(string $NewTitle): void {
        $this->title = $NewTitle;
    }

    public function setDescription(string $NewDescription): void {
        $this->description = $NewDescription;
    }

    public function setImage(string $NewImage): void {
        $this->image = $NewImage;
    }

    public function setPrice(float $NewPrice): void {
        $this->price = $NewPrice;
    }

    public function setReleaseYear(int $NewYear): void {
        $this->release_year = $NewYear;
    }

    public function setNote(int $NewNote): void {
        $this->note = $NewNote;
    }

    public function setDuration(int $NewDuration): void {
        $this->duration = $NewDuration;
    }

    public function setStatus(string $NewStatus): void {
        $this->status = $NewStatus;
    }

    public function setStudio(string $NewStudio): void {
        $this->studio = $NewStudio;
    }

}


?>