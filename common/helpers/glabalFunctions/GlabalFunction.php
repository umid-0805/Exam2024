<?php

function setFlash($key, $message): void
{
    \Yii::$app->session->setFlash($key, $message);
}

function getUserId(): int
{
   return \yii::$app->user->identity->getId();
}

function stringToInt(string $string): int
{
   return preg_replace("/[^0-9]/", "", $string);
}