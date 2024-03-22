<?php

namespace Database\Factories;

use App\Enums\ObjetoType;
use App\Models\Blob;
use App\Models\Objeto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Objeto>
 */
class ObjetoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(ObjetoType::cases());
        return [
            'parent_id' => fake()->randomElement([null, null, Objeto::inRandomOrder()->first()?->id]),
            'name' =>  $type == ObjetoType::Report ? ('Reporte ' . fake()->firstName()) : ('Carpeta ' . fake()->domainName()),
            'type' => $type,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Objeto $model) {

            // Si es objeto..
            if ($model->type == ObjetoType::Report) {
                // Cambiar reporte
                $blob = new Blob();
                $blob->content = '4ab86b6f-59f2-48e0-8dd5-c16a792c312b'; // Técnica-CO
                $blob->save();

                $model->blob_id = $blob->id;
                $model->save();
            }
        });
    }
}
