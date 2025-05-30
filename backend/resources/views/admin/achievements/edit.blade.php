@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Редактировать ачивку</h2>

        <form action="{{ route('admin.achievements.update', $achievement->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $achievement->title) }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Описание</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $achievement->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($achievement->image)
                    <img src="{{ asset('storage/' . $achievement->image) }}" width="100" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label for="coins" class="form-label">Количество коинов</label>
                <input type="number" name="coins" id="coins" class="form-control" value="{{ old('coins', $achievement->coins) }}" min="1" required>
            </div>

            <div class="mb-3">
                <label for="condition_type" class="form-label">Тип условия</label>
                <input type="text" name="condition_type" id="condition_type" class="form-control" value="{{ old('condition_type', $achievement->condition_type) }}" required>
            </div>

            <div class="mb-3">
                <label for="condition_value" class="form-label">Значение условия</label>
                <input type="number" name="condition_value" id="condition_value" class="form-control" value="{{ old('condition_value', $achievement->condition_value) }}" min="1" required>
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection