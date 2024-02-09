<?php

declare(strict_types=1);
namespace common\helpers\person;

use common\models\Person;

class personFactory
{
    public function personCreateAndSave(?int $userId, string $lastName, string $firstNAme, string $phone): Person|null
    {

        $person = new Person;
        $person->user_id = $userId;
        $person->lastName = $lastName;
        $person->firstName = $firstNAme;
        $person->phone = $phone;

        return $person;
    }


    public function personUpdate(Person $person, ?int $userId, string $lastName, string $firstNAme, string $phone): void
    {
        $person->user_id = $userId;
        $person->lastName = $lastName;
        $person->firstName = $firstNAme;
        $person->phone = $phone;
    }


}