<?php

abstract class AMonster implements IMonster {
    protected string $name;
    protected int $health;
    protected int $damage;
    protected int $goldReward;

    // Constructeur pour initialiser les propriétés du monstre
    public function __construct(string $name, int $health, int $damage, int $goldReward){
        $this->name = $name; // Nom du monstre
        $this->health = $health; // Points de vie actuels du monstre
        $this->damage = $damage; // Dégâts que le monstre inflige lors des attaques
        $this->goldReward = $goldReward; // Quantité d'or que le héros reçoit en récompense après avoir vaincu le monstre
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    // Permet au monstre de subir des dégâts, ce qui peut réduire ses points de vie
    public function takeDamage(int $damage): void
    {
        $this->health -= $damage;

        if ($this->health < 0) {
            $this->health = 0;
        }
    }

    /**
     * Retourne les dégâts infligés au héros
     */
    public function attack(IHero $hero): int
    {
        $hero->takeDamage($this->damage);
        return $this->damage;
    }

    public function isDead(): bool
    {
        return $this->health <= 0;
    }

    public function getGoldReward(): int
    {
        return $this->goldReward;
    }
}