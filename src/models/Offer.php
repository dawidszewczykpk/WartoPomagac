<?php

class Offer
{
    private $user_email;
    private $province;
    private $city;
    private $number_of_people;
    private $how_long;
    private $img;

    public function __construct($user_email, $province, $city, $number_of_people, $how_long, $img)
    {
        $this->user_email = $user_email;
        $this->province = $province;
        $this->city = $city;
        $this->number_of_people = $number_of_people;
        $this->how_long = $how_long;
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

    public function getHowLong(): int
    {
        return $this->how_long;
    }

    public function setHowLong(int $time): void
    {
        $this->how_long = $time;
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