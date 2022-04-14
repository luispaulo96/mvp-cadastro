<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('home') }}">Carros</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-car"
      aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-car">
      <div class="navbar-nav">
        <a class="nav-link active" href="{{ route('home') }}">Home</a>
      </div>
      <div class="navbar-nav ms-auto">
        <a class="nav-link" href="{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();">
          Sair
        </a>
        <form method="POST" action={{ route('logout') }} id="logout-form" hidden>
          @csrf
        </form>
      </div>
    </div>
  </div>
</nav>
