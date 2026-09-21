@extends('admin.layout')

@section('title', 'Товары')
@section('content')

<div class="page-head">
  <h1>Товары ({{ $products->total() }})</h1>
  <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Добавить товар</a>
</div>

@if($products->isEmpty())
  <div class="card" style="text-align:center; padding:60px 20px; color:#999;">
    Товаров пока нет. <a href="{{ route('admin.products.create') }}">Добавить первый</a>.
  </div>
@else
  <table>
    <thead>
      <tr>
        <th style="width:70px;">Фото</th>
        <th>Название</th>
        <th style="width:120px;">Цена</th>
        <th style="width:100px;">Бейдж</th>
        <th style="width:180px;">Действия</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
        <tr>
          <td>
            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="thumb">
          </td>
          <td>
            <div style="font-weight:600;">{{ $product->name }}</div>
            <div style="font-size:12px; color:#999;">{{ \Illuminate\Support\Str::limit($product->description, 60) }}</div>
          </td>
          <td>
            <span class="price">{{ number_format($product->price, 0, '.', ' ') }} ₽</span>
            @if($product->old_price)
              <span class="old-price">{{ number_format($product->old_price, 0, '.', ' ') }} ₽</span>
            @endif
          </td>
          <td>
            @if($product->badge)
              <span style="background:#d4b088; color:#fff; font-size:11px; padding:3px 8px; border-radius:999px;">{{ $product->badge }}</span>
            @endif
          </td>
          <td>
            <div class="actions">
              <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-secondary btn-sm">Ред.</a>

              <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                    onsubmit="return confirm('Удалить «{{ $product->name }}»?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <div style="margin-top:20px;">
    {{ $products->links() }}
  </div>
@endif

@endsection