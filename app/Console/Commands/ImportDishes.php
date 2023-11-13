<?php

namespace App\Console\Commands;

use App\Models\Dish;
use App\Models\Ingredient;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Throwable;

class ImportDishes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-dishes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports dishes from storage/app/data/dishes.json';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $file = Storage::disk('local')->get("data/dishes.json");
        $json = json_decode($file, true);

        $index = 0;
        $total = count($json);

        foreach ($json as $dish) {
            $index++;
            echo "Progress: $index\\$total \r";
            $tmp = Dish::where("name", $dish['name'])->get();
            if($tmp->count() != 1) dump($tmp->count());
            if ($dishModel = Dish::where("name", $dish['name'])->first()) {
                $dishModel->update([
                    "description"        => $dish['description'],
                    "steps"              => $dish['steps'],
                    "cooking_time"       => $dish['cooking_time'],
                    "method_preparation" => $dish['method_preparation'],
                    "energy"             => $this->coeficientPortion($dish['portion_gr']) * $dish['energy']
                ]);
		$dishModel->ingredients()->detach();
//continue;
                   foreach ($dish['ingredients'] as $item) {
                        if (!$ingredient = Ingredient::where("name", $item['name'])->first()) {
                            $ingredient = Ingredient::create(["name" => $item['name']]);
                        }
                        $dishModel->ingredients()->attach($ingredient->id, [
                            "information" => $item['ingredient_info'],
                            "quantity"    => $item['amount']
                        ]);
                    }

            } else {
                try {
                    $image = file_get_contents("https:".$dish['image']);
                    /** @var Dish $dishModel */
                    $dishModel = Dish::create([
                        "name"               => $dish['name'],
                        "description"        => $dish['description'],
                        "steps"              => $dish['steps'],
                        "cooking_time"       => $dish['cooking_time'],
                        "method_preparation" => $dish['method_preparation'],
                        "energy"             => $this->coeficientPortion($dish['portion_gr']) * $dish['energy']
                    ]);

                    $img = Image::make($image)->encode('webp');
                    $filename = md5($image . time()) . '.webp';
                    $path = 'dishes/' . $filename;
                    Storage::disk('public')->put($path, $img->stream());
                    $dishModel->photo = "storage/" . $path;
                    $dishModel->save();

                    foreach ($dish['ingredients'] as $item) {
                        if (!$ingredient = Ingredient::where("name", $item['name'])->first()) {
                            $ingredient = Ingredient::create(["name" => $item['name']]);
                        }
                        $dishModel->ingredients()->attach($ingredient->id, [
                            "information" => $item['ingredient_info'],
                            "quantity"    => $item['amount']
                        ]);
                    }
                } catch (Throwable $e) {
                    echo $e->getMessage();
                }
            }
        }
    }

    public function coeficientPortion( $gr )
    {
        return $gr / 100;
    }
}
