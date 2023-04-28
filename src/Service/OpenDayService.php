<?php

namespace App\Service;

use App\Repository\OpenDayRepository;

class OpenDayService
{
    private $openDayRepository;

    public function __construct(OpenDayRepository $openDayRepository)
    {
        $this->openDayRepository = $openDayRepository;
    }

    public function getAllOpenDays()
    {
        return $this->openDayRepository->findAll();
    }
}