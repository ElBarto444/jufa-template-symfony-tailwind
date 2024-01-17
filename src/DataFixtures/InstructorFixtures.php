<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Instructor;
use Faker\Factory;

class InstructorFixtures extends Fixture
{
    public const INSTRUCTORS = 7;
    public const URLMEN = '/build/men';
    public const URLWOMEN = '/build/women';
    public const PATTERN = "/wo/";

    public const PROFESSIONS = [
        "Development Teacher",
        "PHP Developer",
        "Banking Teacher",
        "UX / UI Teacher",
        "PHP Teacher",
    ];

    public function starsFromRating(int $rating): int {
        switch ($rating) {
            case ($rating < 200):
                return 3;
            case ($rating < 300):
                return 4;
            case ($rating >= 300):
                return 5;
        }
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('en_EN');

        for ($i = 0; $i <= self::INSTRUCTORS; $i++) {
            $instructor = new Instructor();
            $gender = [
                self::URLMEN . "/instructors-" . rand(1, 5) . ".jpg",
                self::URLWOMEN . "/instructors-" . rand(1, 3) . ".jpg"
            ];

            $instructor->setName(strtoupper($faker->lastName()));
            $instructor->setPicture($gender[rand(0, 1)]);
            $instructor->setFirstname(
                preg_match(
                    self::PATTERN,
                    $instructor->getPicture()
                ) === 1
                    ? $faker->firstName("female")
                    : $faker->firstName("male")
            );
            $instructor->setAddress($faker->address() . ", " . $faker->city() . " " . $faker->postcode());
            $instructor->setPresentation($faker->text(250));
            $instructor->setDateOfBirth($faker->dateTimeBetween('01-0-1970', '01-01-1990'));
            $instructor->setRating($faker->numberBetween(50, 500));
            foreach (self::PROFESSIONS as $profession) {
                $instructor->setProfession($profession);
            }
            $instructor->setNbStars($this->starsFromRating($instructor->getRating()));

            $manager->persist($instructor);
            $manager->flush();

            $this->addReference('instructor_' . $i, $instructor);
        }
    }
}
