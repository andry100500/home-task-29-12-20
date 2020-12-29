<?php

//Написать класс для управления автомобилем, умеющий "двигаться" и "менять свою скорость"
//Требования.
//1. Класс должен реализовать интерфейс MovableInterface.
//2. При изменении скорости должно выводиться сообщение с какой скоростью в данный момент движется автомобиль.
//    Другие методы интерфейса предлагается сделать на свое усмотрение.
//3. Предусмотреть в своем классе тот факт, что у автомобиля есть максимальная скорость, которую он не способен превысить.
//4. Можно также расширить интерфейс и добавить свои методы. Для этого нужно написать свой интерфейс и расширить существующий (Интерфейсы можно наследовать друг от друга также как и классы)

interface ToDoInterface
{
    public function move();    // Управляет движением

}

interface MovableInterface extends ToDoInterface
{
    public function start();   // Включает зажигание

    public function stop();    // Выключает зажигание

    public function up();      // Увеличивает скорость движения

    public function down();    // Уменьшает скорость движения
}

interface LightableInterface
{
    public function turnOnLight();   // Включает фары

    public function turnOfLight();    // Выключает фары

}

class Car implements MovableInterface, LightableInterface
{
    public $currentSpeed = 0;
    public $maxSpeed = 20;


    public function turnOnLight(){
        echo '<b>Включаю свет.</b><br>';
    }

    public function turnOfLight(){
        echo '<b>Выключаю свет.</b><br>';
    }

    public function start()
    {
        echo '<b>Жи-Жи ЖИИИННЬ! (завели)</b><br>';
    }

    public function stop()
    {
        echo '<b>УУУууууу...  (заглушили)</b><br>';
    }

    public function up()
    {
        $this->currentSpeed = 1;

        echo '<b>Трогаемся и поехали!</b><br>';
        for ($i = $this->currentSpeed; $i <= $this->maxSpeed; $i++) {
            $this->currentSpeed = $i;
            echo 'Топим ' . $this->currentSpeed . ' км/ч<br>';
        }

    }

    public function down()
    {
        echo '<b>Пора тормозить!</b><br>';
        for ($i = $this->currentSpeed; $i >= 0; $i--) {
            $this->currentSpeed = $i;
            if ($this->currentSpeed > 0) {
                echo 'Топим ' . $this->currentSpeed . ' км/ч<br>';
            }
        }
        echo '<b>Остановились и припарковались.</b><br>';
    }

    public function move()
    {
        $this->start();
        $this->turnOnLight();
        $this->up();
        $this->down();
        $this->turnOfLight();
        $this->stop();
    }

}

$car = new Car();

echo '<pre>';
print_r($car);
echo '</pre>';

echo '<hr>';

$car->move();

echo '<hr>';

echo '<pre>';
print_r($car);
echo '</pre>';

