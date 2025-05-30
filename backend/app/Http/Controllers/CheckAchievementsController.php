<?php

namespace App\Http\Controllers;

use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAchievementsController extends Controller
{
    // Получаем текущего пользователя
    private function getCurrentUser()
    {
        return Auth::user();
    }

    // Проверяем, получил ли пользователь эту ачивку раньше
    private function hasUserAchievement($user, $achievement): bool
    {
        return UserAchievement::where('user_id', $user->id)
                                ->where('achievement_id', $achievement->id)
                                ->exists();
    }

    // Ачивка: "Давно тебя не было в уличных гонках"
    public function checkLongAbsence()
    {
        // Получаем пользователя
        $user = $this->getCurrentUser();

        // Если пользователь не авторизован — выходим
        if (!$user) {
            return false;
        }

        // Находим нужную ачивку
        $achievement = Achievement::where('name', 'Давно тебя не было в уличных гонках')->first();

        // Если ачивка не найдена или уже получена — выходим
        if (!$achievement || $this->hasUserAchievement($user, $achievement)) {
            return false;
        }

        // Проверяем, прошло ли больше 2 дней с последнего посещения
        if ($user->last_visit && now()->diffInDays($user->last_visit) >= 2) {

            // Выдаём ачивку
            UserAchievement::create([
                'user_id' => $user->id,
                'achievement_id' => $achievement->id,
            ]);

            return true;
        }

        return false;
    }


    // Ачивка "В отрыве от реальности"
    public function checkTotalTimeSpent()
    {
        $user = $this->getCurrentUser();

        if (!$user) {
            return false;
        }

        $achievement = Achievement::where('name', 'В отрыве от реальности')->first();

        if (!$achievement || $this->hasUserAchievement($user, $achievement)) {
            return false;
        }

        $hoursSpent = floor($user->total_time_spent / 60);
        if ($hoursSpent >= $achievement->require_count) {
            UserAchievement::create([
                'user_id' => $user->id,
                'achievment_id' => $achievement->id,
            ]);

            return true;
        }

        return false;
    }


}