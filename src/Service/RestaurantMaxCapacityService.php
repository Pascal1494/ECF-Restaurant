<?php

namespace App\Service;

use App\Repository\RestaurantRepository;

class RestaurantMaxCapacityService
{
    private $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    public function findMaxCapacityByRestaurant($restaurantCode): ?int
    {
        $restaurant = $this->restaurantRepository->findOneBy(['restoCode' => $restaurantCode]);

        if (!$restaurant) {
            throw new \Exception('Le restaurant est inconnu !');
        }

        return $restaurant->getMaxCapacity();
    }
}
