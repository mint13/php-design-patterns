<?php

interface CarService {

    public function getCost();

    public function getDescripttion();
}

class BasicInspection implements CarService {
    
    public function getCost() {
        return 25;
    }

    public function getDescripttion() {
        return "Basic description";
    }
}

class OilChange implements CarService {

    protected $carService;

    function __construct(CarService $carService) {
        $this->carService = $carService;
    }

    public function getCost() {
        
        return 30 + $this->carService->getCost();
    }

    public function getDescripttion() {
        return $this->carService->getDescripttion() . ', and oil change'; 
    }
}

class TireRotation implements CarService {

    protected $carService;

    function __construct(CarService $carService) {
        $this->carService = $carService;
    }

    public function getCost() {
        
        return 20 + $this->carService->getCost();
    }

    public function getDescripttion() {
        return $this->carService->getDescripttion() . ', and a tire rotation'; 
    }
}

echo (new OilChange(new BasicInspection()))->getCost();