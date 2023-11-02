<?php

namespace App\Tests;

use App\Controller\HomePageController;
use App\Entity\Courses;
use App\Entity\Users;
use App\Repository\CoursesRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HomePageControllerIntegrationTest extends KernelTestCase
{
    private $container;

    public function setUp(): void
    {
        self::bootKernel();
        $this->container = static::getContainer();
    }

    public function testHomePage(): void
    {
        $user = new Users();
        $user->setUsername('testusername');
        $user->setPassword('123456');
        $user->setRoles(['ROLE_INSTRUCTOR']);
        $user->setEmail('test@email.com');
        $user->setIsVerified(1);

        $courses = [];
        for ($i = 1; $i < 5; $i++) {
            $course = new Courses();
            $course->setId($i);
            $course->setTitle('title' . $i);
            $course->setDescription('description' . $i);
            $course->setHours(rand(1, 10));
            $course->setMinutes(rand(1, 60));
            $course->setInstructor($user);
            $courses[] = $course;
        }

        $controller = new HomePageController();
        $controller->setContainer($this->container);

        $coursesRepositoryMock = $this->getMockBuilder(CoursesRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $coursesRepositoryMock->expects($this->any())
            ->method('findAll')
            ->willReturn($courses);

        $this->assertStringContainsString('title4', $controller->index($coursesRepositoryMock)->getContent());
    }
}
