<?php

function setFlash($key, $message): void
{
    \Yii::$app->session->setFlash($key, $message);
}

function getUserId(): int
{
   return \yii::$app->user->identity->getId();
}