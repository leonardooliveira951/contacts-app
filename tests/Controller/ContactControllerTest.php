<?php

namespace App\Tests\Controller;

use App\Entity\Contact;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactControllerTest extends WebTestCase
{

    public function testIndex(): void
    {
        $client = static::createClient();
        $client->followRedirects();        

        $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contact list');
    }

    public function testNew(): void
    {
        $client = static::createClient();
        $client->followRedirects();

        $client->request('GET', '/contact/new');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Create New Contact');
    }

    public function testShow(): void
    {
        $client = static::createClient();
        $client->followRedirects();

        $entityManager = $client->getContainer()->get('doctrine')->getManager();

        $contact = new Contact();
        $contact->setName('John Doe');
        $contact->setEmail('test@email.com');
        $contact->setMainPhone('1234567890');

        $entityManager->persist($contact);
        $entityManager->flush();

        $contactId = $contact->getId();

        $client->request('GET', "/contact/$contactId");

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Contact');
    }


    public function testEdit(): void
    {
        $client = static::createClient();
        $client->followRedirects();

        $entityManager = $client->getContainer()->get('doctrine')->getManager();

        $contact = new Contact();
        $contact->setName('John Doe');
        $contact->setEmail('test@email.com');
        $contact->setMainPhone('1234567890');

        $entityManager->persist($contact);
        $entityManager->flush();

        $contactId = $contact->getId();

        $client->request('POST', "/contact/$contactId/edit", [
            'contact' => [
                'name' => 'Updated Name',
                'email' => 'updated@example.com',
                'main_phone' => '9876543210',
            ],
        ]);

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Edit contact');
        $updatedContact = $entityManager->getRepository(Contact::class)->find($contactId);

        $this->assertEquals('Updated Name', $updatedContact->getName());
    }
}
