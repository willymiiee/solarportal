<aside class="main-sidebar">
  <section class="sidebar">
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ auth()->user()->avatar_url }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->user()['name'] }}</p>
        <small>
          Participant
        </small>
      </div>
    </div>
    <ul class="sidebar-menu">
      <li class="header">Menu Utama</li>

      <li class="@if(@$active_page == 'dashboard') active @endif">
        <a href="{{ route('participant.dashboard') }}">
          <i class="fa fa-pie-chart"></i> <span>Dasbor</span>
        </a>
      </li>
      <li class="@if(@$active_page == 'company') active @endif">
        <a href="{{ route('participant.company.index') }}">
          <i class="fa fa-briefcase"></i> <span>Perusahaan/Institusi</span>
        </a>
      </li>
      <li class="@if(@$active_page == 'participant_project') active @endif">
        <a href="{{ route('participant.project.index') }}">
          <i class="fa fa-file"></i> Rooftop PV Installation
        </a>
      </li>
      <li class="@if(@$active_page == 'participant_invite') active @endif">
        <a href="{{ route('participant.company.invite') }}">
          <i class="fa fa-user-plus"></i> Invite Teams
        </a>
      </li>
      {{-- <li class="@if(@$active_page == 'verify') active @endif">
        <a href="{{ route('participant.verify.index') }}">
          <i class="fa fa-check"></i> <span>Verifikasi</span>
        </a>
      </li> --}}
      <li class="@if(@$active_page == 'quotes') active @endif">
        <a href="{{ route('participant.quote.index') }}">
          <i class="fa fa-calculator"></i> <span>Kalkulator Surya</span>
        </a>
      </li>
    </ul>
  </section>
</aside>
