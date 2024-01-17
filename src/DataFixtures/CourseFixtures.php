<?php

namespace App\DataFixtures;

use App\Entity\Course;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CourseFixtures extends Fixture implements DependentFixtureInterface
{
    public const IMAGE_PATH = '/build/courses';

    public function load(ObjectManager $objectManager): void
    {
        $faker = Factory::create('en_EN');

        for ($i = 0; $i <= 15; $i++) {
            $course = new Course();
            $course->setTitle($faker->sentence(3));
            $course->setDescription($faker->text(250));
            $course->setPrice($faker->randomFloat(2, 0, 100));
            $course->setDuration($faker->randomElement(['2h', '5h', '10h']));
            $course->setPresentationVideo($faker->url());
            $course->setInstructor($this->getReference('instructor_' . rand(0, 7)));
            $course->setCoursePicture(self::IMAGE_PATH . '/courses-' . rand(11, 16) . '.jpg');
            $objectManager->persist($course);
        }

        $objectManager->flush();
    }

    public function getDependencies()
    {
        return [
            InstructorFixtures::class
        ];
    }
}