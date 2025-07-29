<<aside class="aside aside-fixed">
  <div class="aside-header">
    {{-- <a href="{{url('admin/dashboard')}}" class="aside-logo"><img src="{{asset('admin_theme/images/logo.png')}}" width="80" alt="Logo"></a> --}}
    <a href="{{url('admin/dashboard')}}" class="aside-logo"><img class="img-fluid" src="{{asset('/assets/img/goaly-logo.png')}}" width="100" alt="Gemezz"></a>
    <a href="" class="aside-menu-link">
      <i data-feather="menu"></i>
      <i data-feather="x"></i>
    </a>
  </div>
  <div class="aside-body">

<style>
  .nav-item a.nav-link:hover {
      background-color: skyblue;
      color: white;
      border-radius: 5px;
      transition: background-color 0.3s ease;
  }

  .nav-item a.nav-link {
      display: flex;
      align-items: center;
      padding: 10px 15px;
  }

  .nav-item a.nav-link i {
      margin-right: 10px;
      font-size: 16px;
  }
</style>

<ul class="nav nav-aside">
  <li class="nav-label">Main Menu</li>
  <li class="nav-item {{'admin/dashboard' == request()->path() ? 'active' : ''}}">
    <a href="{{url('admin/dashboard')}}" class="nav-link">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span>
    </a>
  </li>

  <li class="nav-item {{'admin/prediction' == request()->path() ? 'active' : ''}}">
    <a href="{{url('admin/prediction')}}" class="nav-link">
      <i class="fas fa-chart-line"></i>
      <span>Prediction Matches</span>
    </a>
  </li>

  <li class="nav-item {{'admin/matches' == request()->path() ? 'active' : ''}}">
    <a href="{{route('allmatches')}}" class="nav-link">
      <i class="fas fa-futbol"></i>
      <span>All Matches</span>
    </a>
  </li>

  <li class="nav-item {{'admin/banner' == request()->path() ? 'active' : ''}}">
    <a href="{{route('banner')}}" class="nav-link">
      <i class="fas fa-image"></i>
      <span>Banner</span>
    </a>
  </li>

  <li class="nav-item {{'admin/predictionquestion' == request()->path() ? 'active' : ''}}">
    <a href="{{route('predictionquestion')}}" class="nav-link">
      <i class="fas fa-question-circle"></i>
      <span>Prediction Question</span>
    </a>
  </li>
  <li class="nav-item {{'admin/Quizquestion' == request()->path() ? 'active' : ''}}">
      <a href="{{route('quiz.question')}}" class="nav-link">
          <i class="fas fa-clipboard-list"></i> 
          <span>Qustion Bank</span>
      </a>
  </li>

  <li class="nav-item {{'admin/reward/list' == request()->path() ? 'active' : ''}}">
    <a href="{{route('rewardList')}}" class="nav-link">
      <i class="fas fa-gift"></i>
      <span>Reward</span>
    </a>
  </li>

  <li class="nav-item {{'admin/userreward' == request()->path() ? 'active' : ''}}">
    <a href="{{route('userreward')}}" class="nav-link">
      <i class="fas fa-exchange-alt"></i>
      <span>Reward Exchange</span>
    </a>
  </li>

  <li class="nav-item {{'admin/winnerList' == request()->path() ? 'active' : ''}}">
    <a href="{{route('winnerlist')}}" class="nav-link">
      <i class="fas fa-trophy"></i>
      <span>Winner List</span>
    </a>
  </li>

  <li class="nav-item {{'admin/notifications' == request()->path() ? 'active' : ''}}">
    <a href="{{ route('notificationss') }}" class="nav-link">
      <i class="fas fa-bell"></i>
      <span>Notifications</span>
    </a>
  </li>

  <li class="nav-item {{'admin/faq' == request()->path() ? 'active' : ''}}">
    <a href="{{ route('faq') }}" class="nav-link">
      <i class="fas fa-info-circle"></i>
      <span>Faq Settings</span>
    </a>
  </li>

  <li class="nav-item {{'admin/termservices' == request()->path() ? 'active' : ''}}">
    <a href="{{route('termservices')}}" class="nav-link">
      <i class="fas fa-file-alt"></i>
      <span>Terms Of Service</span>
    </a>
  </li>

  <li class="nav-item {{'admin/winnermanagment' == request()->path() ? 'active' : ''}}">
    <a href="{{route('name')}}" class="nav-link">
      <i class="fas fa-tasks"></i>
      <span>Winner Management</span>
    </a>
  </li>

  <li class="nav-item {{'admin/newsmanagement' == request()->path() ? 'active' : ''}}">
    <a href="{{route('news')}}" class="nav-link">
      <i class="fas fa-newspaper"></i>
      <span>News Management</span>
    </a>
  </li>
</ul>

  </div>
  </aside>