<?php

class Offer
{
    private $user_email;
    private $province;
    private $city;
    private $number_of_people;
    private $time;
    private $img;

    public function __construct($user_email, $province, $city, $number_of_people, $time, $img)
    {
        $this->user_email = $user_email;
        $this->province = $province;
        $this->city = $city;
        $this->number_of_people = $number_of_people;
        $this->time = $time;
        $this->img = $img;
    }

    public function getUserEmail()
    {
        return $this->user_email;
    }

    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    public function getProvince()
    {
        return $this->province;
    }

    public function setProvince($province)
    {
        $this->province = $province;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getNumberOfPeople(): int
    {
        return $this->number_of_people;
    }

    public function setNumberOfPeople(int $number_of_people): void
    {
        $this->number_of_people = $number_of_people;
    }

    public function getTime(): int
    {
        return $this->time;
    }

    public function setTime(int $time): void
    {
        $this->time = $time;
    }

    public function getImage()
    {
        return $this->img;
    }

    public function setImage($img)
    {
        $this->img = $img;
    }
}