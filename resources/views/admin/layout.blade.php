<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Админка') — FlowerShop</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif; background: #f5f5f4; color: #1a1a1a; }
  a { color: #1a1a1a; text-decoration: none; }
  a:hover { color: #b8926a; }

  .topbar { background: #1a1a1a; color: #fff; padding: 14px 24px; display: flex; align-items: center; justify-content: space-between; }
  .topbar .brand { font-weight: 700; letter-spacing: -.5px; }
  .topbar .brand span { color: #d4b088; }
  .topbar nav a { color: #fff; margin-left: 18px; font-size: 13px; opacity: .85; }
  .topbar nav a:hover { opacity: 1; color: #d4b088; }

  .container { max-width: 1100px; margin: 0 auto; padding: 24px; }

  .page-head { display: flex; align-items: center; justify-content: space-between; margin-bottom: 20px; }
  .page-head h1 { font-size: 22px; letter-spacing: -.5px; }

  .btn { display: inline-flex; align-items: center; gap: 6px; padding: 9px 16px; border-radius: 999px; border: none; cursor: pointer; font-size: 13px; font-weight: 600; font-family: inherit; transition: .2s; }
  .btn-primary { background: #1a1a1a; color: #fff; }
  .btn-primary:hover { background: #b8926a; color: #fff; }
  .btn-secondary { background: #fff; color: #1a1a1a; border: 1px solid #e5e5e5; }
  .btn-secondary:hover { border-color: #b8926a; color: #b8926a; }
  .btn-danger { background: #fee; color: #c33; }
  .btn-danger:hover { background: #c33; color: #fff; }
  .btn-sm { padding: 6px 12px; font-size: 12px; }

  .alert { padding: 12px 16px; border-radius: 10px; margin-bottom: 16px; font-size: 14px; }
  .alert-success { background: #e6f7ec; color: #1a6d3a; border: 1px solid #b6e5c8; }

  table { width: 100%; background: #fff; border-radius: 12px; overflow: hidden; border-collapse: collapse; box-shadow: 0 1px 3px rgba(0,0,0,.05); }
  th, td { padding: 12px 14px; text-align: left; font-size: 13px; border-bottom: 1px solid #f0f0ee; vertical-align: middle; }
  th { background: #fafaf8; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: .4px; color: #666; }
  tr:last-child td { border-bottom: none; }
  tr:hover td { background: #fafaf8; }

  .thumb { width: 50px; height: 50px; object-fit: contain; background: #f5f5f4; border-radius: 8px; padding: 4px; }
  .price { font-weight: 700; }
  .old-price { color: #999; text-decoration: line-through; font-size: 12px; margin-left: 4px; }
  .actions { display: flex; gap: 6px; }

  /* Форма */
  .card { background: #fff; border-radius: 14px; padding: 24px; box-shadow: 0 1px 3px rgba(0,0,0,.05); }
  .form-group { margin-bottom: 16px; }
  .form-group label { display: block; font-size: 12px; font-weight: 600; text-transform: uppercase; letter-spacing: .4px; color: #666; margin-bottom: 6px; }
  .form-group input[type=text], .form-group input[type=number], .form-group textarea {
    width: 100%; padding: 10px 14px; border: 1px solid #e5e5e5; border-radius: 10px;
    font-size: 14px; font-family: inherit; outline: none; transition: border-color .2s; background: #fafaf8;
  }
  .form-group input:focus, .form-group textarea:focus { border-color: #b8926a; background: #fff; }
  .form-group textarea { resize: vertical; min-height: 80px; }
  .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .error { color: #c33; font-size: 12px; margin-top: 4px; }
  .form-actions { display: flex; gap: 10px; margin-top: 24px; padding-top: 20px; border-top: 1px solid #f0f0ee; }
  .preview { margin-top: 8px; display: flex; align-items: center; gap: 12px; }
  .preview img { width: 80px; height: 80px; object-fit: contain; background: #fafaf8; border-radius: 10px; padding: 6px; border: 1px solid #e5e5e5; }
  .help { font-size: 12px; color: #999; margin-top: 4px; }
</style>
</head>
<body>

<header class="topbar">
  <div class="brand">💐 Flower<span>Shop</span> · Админка</div>
  <nav>
  
    <a href="{{ route('home') }}" target="_blank">На сайт →</a>
  </nav>
</header>

<div class="container">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
</div>

</body>
</html>