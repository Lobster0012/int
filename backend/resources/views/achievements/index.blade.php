@extends('layouts.app')
@section('content')
    <h2>Список ачивок</h2>

    {{-- Прокручиваемый контейнер --}}
    {{--Создаёт контейнер фиксированной высоты, в котором появляется вертикальный скролл, если контента больше, чем помещается--}}
    <div style="max-height: 400px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
        @foreach ($achievements as $achievement)
            <div style="border-bottom: 1px solid #eee; padding: 10px 0;">
                <strong>{{ $achievement->title }}</strong>
                <p>{{ $achievement->description }}</p>
                <small>Награда: {{ $achievement->coins }} Интекскоинов</small>

                @if ($user->achievements->contains($achievement->id))
                    <span style="color: green;">✅ Получено</span>
                @else
                    <span style="color: red;">🔒 Не получено</span>
                @endif
            </div>
        @endforeach
    </div>
@endsection