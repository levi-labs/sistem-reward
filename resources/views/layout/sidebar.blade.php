  <nav class="sidebar sidebar-offcanvas d-print-none" id="sidebar">
      <ul class="nav">
          <li class="nav-item nav-profile">
              <a href="#" class="nav-link">

                  @if (auth()->user()->akses_user == 'karyawan')
                      <div class="nav-profile-image">
                          <img src="{{ Avatar::create(auth()->user()->karyawans->nama)->toBase64() }}" alt="profile">
                          <span class="login-status online"></span>
                          <!--change to offline or busy as needed-->
                      </div>
                      <div class="nav-profile-text d-flex flex-column">
                          <span class="font-weight-bold mb-2 text-small">{{ auth()->user()->karyawans->nama }}</span>
                          <span class="text-secondary text-small">{{ auth()->user()->username }}</span>
                      </div>
                      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  @elseif(auth()->user()->akses_user == 'atasan')
                      <div class="nav-profile-image">
                          <img src="{{ Avatar::create(auth()->user()->atasans->nama)->toBase64() }}" alt="profile">
                          <span class="login-status online"></span>

                      </div>
                      <div class="nav-profile-text d-flex flex-column">
                          <span class="font-weight-bold mb-2">{{ auth()->user()->atasans->nama }}</span>
                          <span class="text-secondary text-small">{{ auth()->user()->username }}</span>
                      </div>
                      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  @elseif(auth()->user()->akses_user == 'master')
                      <div class="nav-profile-image">
                          <img src="{{ Avatar::create(auth()->user()->username)->toBase64() }}" alt="profile">
                          <span class="login-status online"></span>

                      </div>
                      <div class="nav-profile-text d-flex flex-column">
                          <span class="font-weight-bold mb-2">{{ auth()->user()->username }}</span>
                          <span class="text-secondary text-small">{{ auth()->user()->username }}</span>
                      </div>
                      <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                  @endif


              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="/dashboard">
                  <span class="menu-title">Dashboard</span>
                  <i class="mdi mdi-home menu-icon"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                  aria-controls="ui-basic">
                  <span class="menu-title">Pengajuan SS</span>
                  <i class="menu-arrow"></i>
                  <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              </a>
              <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                      <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-pengajuan') }}">Daftar
                              Pengajuan</a></li>

                      <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-pengajuan-approved') }}">Daftar
                              Approved</a>
                      </li>
                      <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-pengajuan-rejected') }}">Daftar
                              Rejected</a>
                      </li>


                  </ul>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="{{ url('daftar-karyawan') }}">
                  <span class="menu-title">Daftar Karyawan</span>
                  <i class="mdi mdi-contacts menu-icon"></i>
              </a>
          </li>
          @if (auth()->user()->akses_user == 'atasan')
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('daftar-atasan') }}">
                      <span class="menu-title">Daftar Atasan</span>
                      <i class="mdi mdi-shield-account menu-icon"></i>
                  </a>
              </li>
          @endif

          @if (auth()->user()->akses_user == 'atasan')
              <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false"
                      aria-controls="general-pages">
                      <span class="menu-title">Menu Penilaian</span>
                      <i class="menu-arrow"></i>
                      <i class="mdi mdi-chart-bar menu-icon"></i>
                      {{-- mdi mdi-table-large menu-icon --}}
                  </a>
                  <div class="collapse" id="general-pages">
                      <ul class="nav flex-column sub-menu">
                          <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-kriteria-penilaian') }}">
                                  Kriteria Penilaian </a></li>
                          <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-range-total-reward') }}">
                                  Range Total & Reward </a></li>
                          <li class="nav-item"> <a class="nav-link" href="{{ url('daftar-proses-nilai') }}"> Proses
                                  Penilaian
                              </a>
                          </li>

                          {{-- <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404
                            </a></li>
                        <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500
                            </a></li> --}}
                      </ul>
                  </div>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('report-penilaian') }}">
                      <span class="menu-title">Report Penilaian</span>
                      <i class="mdi mdi-chart-areaspline menu-icon"></i>
                  </a>
              </li>
          @endif


          {{-- <li class="nav-item sidebar-actions">
              <span class="nav-link">
                  <div class="border-bottom">
                      <h6 class="font-weight-normal mb-3">Projects</h6>
                  </div>
                  <button class="btn btn-block btn-lg btn-gradient-primary mt-4">+ Add a project</button>
                  <div class="mt-4">
                      <div class="border-bottom">
                          <p class="text-secondary">Categories</p>
                      </div>
                      <ul class="gradient-bullet-list mt-4">
                          <li>Free</li>
                          <li>Pro</li>
                      </ul>
                  </div>
              </span>
          </li> --}}
      </ul>
  </nav>
