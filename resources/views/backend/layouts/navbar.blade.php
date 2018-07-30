<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <b><a class="navbar-brand" href="#">Read.</a></b>
  <button 
    class="navbar-toggler" 
    type="button" 
    data-toggle="collapse" 
    data-target="#navbarColor01" 
    aria-controls="navbarColor01" 
    aria-expanded="false" 
    aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div 
    class="collapse navbar-collapse" 
    id="navbarColor01">
    <ul 
      class="navbar-nav mr-auto">
      <li 
        class="nav-item active">
        <a 
          class="nav-link" 
          href="#">
          Dashboard <span class="sr-only">(current)</span>
        </a>
      </li>
      <li 
        class="nav-item">
        <a 
          class="nav-link" 
          href="#">Posts
        </a>
      </li>
    </ul>
    <ul 
      class="navbar-nav ml-auto">
        <li 
          class="nav-item dropdown">
            <a 
              class="nav-link dropdown-toggle" 
              data-toggle="dropdown" 
              href="#" 
              role="button" 
              aria-haspopup="true" 
              aria-expanded="false">
                <i class="fa fa-user"></i> {{ Auth::User()->name }}
            </a>
            <div 
              class="dropdown-menu dropdown-style" 
              x-placement="bottom-start">
                <a 
                  class="dropdown-item" 
                  href="#"><i class="fa fa-gear"></i> Settings Account
                </a>
              <div class="dropdown-divider"></div>
                <a 
                  class="dropdown-item" 
                  href="/auth/logout"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off"></i> Logout 
                </a>
                <form 
                  id="logout-form" 
                  action="/auth/logout" 
                  method="POST" 
                  style="display: none;"
                >
                    @csrf
                </form>
            </div>
        </li>
    </ul>
  </div>
</nav>
