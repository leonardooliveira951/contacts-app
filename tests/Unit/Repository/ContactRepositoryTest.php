<?php

namespace App\Tests\Unit\Repository;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    public function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testShouldCreateNewContact(): void
    {
        $contactMock = (new Contact())
            ->setName('test')
            ->setEmail('test@email.com')
            ->setMainPhone('11111111111');

        $contactRepository = $this->entityManager
            ->getRepository(Contact::class);

        $contactRepository->add($contactMock);

        $result = $contactRepository->findOneBy(['email' => 'test@email.com']);

        $this->assertEquals($contactMock->getName(), $result->getName());
        $this->assertEquals($contactMock->getEmail(), $result->getEmail());
        $this->assertEquals($contactMock->getMainPhone(), $result->getMainPhone());
    }

    public function testShouldListAllContacts(): void
    {
        $contactMock1 = (new Contact())
            ->setName('test1')
            ->setEmail('test1@email.com')
            ->setMainPhone('11111111111');

        $contactMock2 = (new Contact())
            ->setName('test2')
            ->setEmail('test2@email.com')
            ->setMainPhone('22222222222');

        $contactMock3 = (new Contact())
            ->setName('test3')
            ->setEmail('test3@email.com')
            ->setMainPhone('33333333333');

        $contactRepository = $this->entityManager
            ->getRepository(Contact::class);

        $contactRepository->add($contactMock1);
        $contactRepository->add($contactMock2);
        $contactRepository->add($contactMock3);

        $result = $contactRepository->findAll();

        $this->assertInstanceOf(Contact::class, $result[0]);
        $this->assertInstanceOf(Contact::class, $result[1]);
        $this->assertInstanceOf(Contact::class, $result[2]);
    }

    public function testShouldDeleteContact(): void
    {
        $contactMock = (new Contact())
            ->setName('test')
            ->setEmail('deleteTest@email.com')
            ->setMainPhone('44444444444');

        $contactRepository = $this->entityManager
            ->getRepository(Contact::class);

        $contactRepository->add($contactMock);

        $contactRepository->remove($contactMock);

        $result = $contactRepository->findOneBy(['email' => 'deleteTest@example.com']);

        $this->assertNull($result);
    }
}