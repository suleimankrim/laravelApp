<?php 
namespace Database\Factories\helper;
/**
 * 
 */
class RandomId
{
    public static function getRandomModelId(string $model)
    {
        $count = $model::query()->count();
        if ($count === 0) {
            return $model::factory()->create()->id;
        } else {
            return round(1, $count);
        }
    }
}
