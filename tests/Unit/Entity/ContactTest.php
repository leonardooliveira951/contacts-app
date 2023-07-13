<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Contact;
use PHPUnit\Framework\TestCase;

class ContactTest extends TestCase
{
    /**
     * @dataProvider contactMockData
     */
    public function testShouldCreateContact($data): void
    {
        $entity = new Contact();

        $entity->setName($data['name']);
        $entity->setEmail($data['email']);
        $entity->setMainPhone($data['main_phone']);

        $this->assertEquals($entity->getName(), $data['name']);
        $this->assertEquals($entity->getEmail(), $data['email']);
        $this->assertEquals($entity->getMainPhone(), $data['main_phone']);
    }

    public function contactMockData(): array
    {
        return [
            [
                [
                    'name' => 'test',
                    'email' => 'test@email.com',
                    'main_phone' => '555 123 456 789'
                ],
                [
                    'name' => 'test robert',
                    'email' => 'testing@email.com',
                    'main_phone' => '+55 11 12345-6789'
                ],
            ]
        ];
    }
}