<?php

namespace common\helpers\user;

class UserModel extends \yii\db\ActiveRecord
{
    // Modelning qolgan qismlari

    // ism va familyadan username generatsiya qilish uchun funktsiya
    public function generateUsername($name, $family)
    {
        // ism va familya qismlarini ajratish
        $namePart = strtolower(substr($name, 0, 3)); // ismni 3 ta harf
        $familyPart = strtolower(substr($family, 0, 3)); // familyani 3 ta harf

        // username generatsiya qilish
        $username = $namePart . '_' . $familyPart . '_' . rand(100, 999); // belgilar va tasodifiy raqam

        return $username;
    }
}