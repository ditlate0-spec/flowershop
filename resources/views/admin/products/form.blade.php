@extends('admin.layout')

@php
  $isEdit = $product->exists;
@endphp

@section('title', $isEdit ? 'Редактирование' : 'Новый товар')
@section('content')

<div class="page-head">
  <h1>{{ $isEdit ? 'Редактировать: ' . $product->name : 'Новый товар' }}</h1>
  <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">← К списку</a>
</div>

<div class="card">
  <form action="{{ $isEdit ? route('admin.products.update', $product) : route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data">
    @csrf
    @if($isEdit)
      @method('PUT')
    @endif

    <div class="form-row">
      <div class="form-group">
        <label>Название *</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" required>
        @error('name') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Бейдж</label>
        <input type="text" name="badge" value="{{ old('badge', $product->badge) }}" placeholder="Хит / Новинка">
        @error('badge') <div class="error">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="form-group">
      <label>Описание</label>
      <textarea name="description" rows="3">{{ old('description', $product->description) }}</textarea>
      @error('description') <div class="error">{{ $message }}</div> @enderror
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>Цена, ₽ *</label>
        <input type="number" name="price" value="{{ old('price', $product->price) }}" min="0" required>
        @error('price') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Старая цена, ₽</label>
        <input type="number" name="old_price" value="{{ old('old_price', $product->old_price) }}" min="0">
        @error('old_price') <div class="error">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="form-row">
      <div class="form-group">
        <label>Размер</label>
        <input type="text" name="size" value="{{ old('size', $product->size) }}" placeholder="Средний, 45 см">
        @error('size') <div class="error">{{ $message }}</div> @enderror
      </div>

      <div class="form-group">
        <label>Стойкость</label>
        <input type="text" name="life" value="{{ old('life', $product->life) }}" placeholder="14 дней">
        @error('life') <div class="error">{{ $message }}</div> @enderror
      </div>
    </div>

    <div class="form-group">
      <label>Фото товара</label>
      <input type="file" name="image_file" accept="image/*">
      <div class="help">PNG / JPG, до 4 МБ. Если не загружать — фото не изменится.</div>
      @error('image_file') <div class="error">{{ $message }}</div> @enderror

      @if($product->image)
        <div class="preview">
          <img src="{{ $product->image_url }}" alt="">
          <span class="help">Текущее фото:<br><code>{{ $product->image }}</code></span>
        </div>
      @endif
    </div>

    <div class="form-actions">
      <button type="submit" class="btn btn-primary">
        {{ $isEdit ? 'Сохранить изменения' : 'Создать товар' }}
      </button>
      <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Отмена</a>
    </div>
  </form>
</div>

@endsection
