<?php

namespace App\Http\Controllers;
use App\Models\Achievement;
use App\Models\UserAchievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AchievementController extends Controller
{

    public function index(Request $request)
{
    $achievements = Achievement::all();
    // $user = auth()->user(); или любой другой способ получить пользователя
    // return view('achievements.index', compact('achievements', 'user'));
    return view('admin.achievements.index', compact('achievements'));
    // $query = Achievement::query();
    // // Пагинация для бесконечного скролла
    // $achievements = $query->paginate(10);
    // return response()->json($achievements);
}
public function create()
    {
        return view('admin.achievements.create');
    }
// store() – сохранение новой ачивки
public function store(Request $request)
{
    // Валидация данных
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'intexcoin' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'required_count' => 'required|string'
    ]);

    // Загрузка изображения, если оно есть
    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('achievements', 'public');
    }

    // Создаём ачивку
    Achievement::create($data);

    // Перенаправляем обратно
    return redirect()->route('admin.achievements.index')->with('success', 'Ачивка успешно добавлена!');
}
}
