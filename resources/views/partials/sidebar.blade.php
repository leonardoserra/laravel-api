<div class="col-2">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary">
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Crea Nuovo
                  Project</a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                  <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link @if (Route::currentRouteName() == 'welcome') active @endif"
                              aria-current="page">
                              <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#home"></use>
                              </svg>
                              Home
                        </a>
                  </li>
                  <li>
                        <a href="{{ route('admin.dashboard') }}"
                              class="nav-link @if (Route::currentRouteName() == 'admin.dashboard') active @endif">
                              <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                              </svg>
                              Dashboard
                        </a>
                  </li>
                  <li>
                        <a href="{{ route('admin.projects.index') }}"
                              class="nav-link @if (Route::currentRouteName() == 'admin.projects.index') active @endif link-body-emphasis">
                              <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                              </svg>
                              Projects
                        </a>

                  </li>
                  <li>
                        <a href="{{ route('admin.types.index') }}"
                              class="nav-link @if (Route::currentRouteName() == 'admin.types.index') active @endif link-body-emphasis">
                              <svg class="bi pe-none me-2" width="16" height="16">
                                    <use xlink:href="#speedometer2"></use>
                              </svg>
                              Interfaccia Tipologie
                        </a>

                  </li>

            </ul>
            <hr>
            <div class="dropdown">
                  <a href="#"
                        class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <strong>{{ Auth::user()->name }}</strong>
                  </a>
                  <ul class="dropdown-menu text-small shadow">
                        <li><a class="dropdown-item" href="{{ route('admin.projects.create') }}">Nuovo Project</a></li>
                        <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>

                  </ul>
            </div>
      </div>

</div>
