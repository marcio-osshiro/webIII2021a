<?php

namespace Database\Factories;

use App\Models\Noticia;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;

class NoticiaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Noticia::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $caminho = storage_path().'/app/public/';
        return [
          'resumo' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
          'descricao' => $this->faker->paragraph($nbSentences = 3, $variableNbSentences = true),
          'data' => $this->faker->date,
          'autor' => $this->faker->name ,
          'categoria_id' => Categoria::orderbyRaw('RANDOM()')->take(1)->first()->id,
          'imagem' => $this->faker->image($caminho, 640, 480, null, false, false),            //
        ];
    }
}
