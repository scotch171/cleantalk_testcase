<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Database\Eloquent\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            's_name' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'job_title' => $this->faker->jobTitle(),
            'notes' => $this->faker->text(300),
            'boss_id' => $this->faker->randomElement(User::all())
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (User $user) {
            $users = User::all();
            if ($users->count() > 1) {
                $user->boss_id = $this->getRandomParent($user, $users)?->id;
                $user->save();
            }
        });
    }

    private function getRandomParent(User $user, Collection $users): ?User
    {
        for($i = 1; $i < 5; $i++) {
            $boss = $users->random(1)->first();
            if ($this->canBeBoss($boss, $user)) {
                return $boss;
            }
        }

        return null;
    }

    private function canBeBoss(User $boss, User $user): bool
    {
        if ($boss->id === $user->id) {
            return false;
        }

        if ($boss->boss_id === null) {
            return true;
        }

        return $this->canBeBoss($boss->boss, $user);
    }
}
