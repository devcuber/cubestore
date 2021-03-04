
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{route('home')}}">Inframundohn</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
        <a class="nav-item nav-link" href="{{route('order.index')}}"> Ventas </a>
        <a class="nav-item nav-link" href="{{route('catalogue')}}"> Catálogo </a>
        <a class="nav-item nav-link" href="{{route('product.index')}}"> Inventario </a>
        <a class="nav-item nav-link" href="{{route('client.index')}}"> Clientes </a>
    </div>
  </div>
</nav>