<?php

abstract class Personne
{
    protected int $id;
    protected string $nom;
    protected string $prenom;
    protected string $email;
    protected string $telephone;

    public function getFullName(): string
    {
        return $this->prenom . ' ' . $this->nom;
    }
}
