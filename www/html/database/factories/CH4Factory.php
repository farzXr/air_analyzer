<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CH4>
 */
class CH4Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = Carbon::create(2025, 1, 1, 0, 0, 0); // Начало диапазона
        $endDate = Carbon::create(2025, 3, 24, 23, 59, 59); // Конец диапазона
        $intervalMinutes = 15; // Интервал в минутах

        // Генерация случайного времени с заданным интервалом
        $randomTimestamp = $this->faker->numberBetween($startDate->timestamp, $endDate->timestamp);
        $randomDateTime = Carbon::createFromTimestamp($randomTimestamp)->startOfMinute();

        // Округляем время по заданному интервалу
        $roundedMinutes = floor($randomDateTime->minute / $intervalMinutes) * $intervalMinutes;
        $randomDateTime->minute($roundedMinutes);

        return [
            'value' => $this->faker->randomFloat(2, 0, 100), // Случайное float число от 0 до 100 с 2 знаками после запятой
            'dateTime' => $randomDateTime, // Рандомная дата-время с округлением до интервала
        ];
    }
}
