@extends('layouts.app')

@section('title', 'لوحة تحكم المندوب')

@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/delegateDashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/org_owner_dashbord.css') }}" />
@endsection

@section('content')
<div class="container-full flex">
  <!-- side bar section -->
  <div class="sidebar">
    <div class="header-side">
      <div class="logo">
        <img src="{{ asset('images/logo.png') }}" alt="logo" />
      </div>
      <h2>لوحة تحكم المندوب</h2>
    </div>
    <ul class="nav-menu flex flex-column">
      <li class="active flex">
        <img src="{{ asset('images/dashbordIcons/cottage.png') }}" alt="cottage" /><a href="#">الرئيسية</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/local_shipping.png') }}" alt="local_shipping" />
        <a href="#">الشاحنات الواردة</a>
        <span class="notification-box flex justify-content-center">3</span>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/assignment.png') }}" alt="assignment" /><a href="#">سجل التسليمات</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/draft.png') }}" alt="draft" /><a href="#">التقارير</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/diversity_3.png') }}" alt="diversity_3" /><a href="#">المستفيدون</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/settings.png') }}" alt="settings" /><a href="#">الاعدادات</a>
      </li>
      <li class="flex mt-70">
        <img src="{{ asset('images/dashbordIcons/exit_to_app.png') }}" alt="exit_to_app" /><a href="#">تسجيل الخروج</a>
      </li>
    </ul>
  </div>
  <!-- the main content section -->
  <div class="main-content">
    <div class="dashboard-header">
      <div class="header-content">
        <div class="search-container">
          <input type="text" placeholder="ابحث هنا..." />
          <i class="fas fa-search search-icon"></i>
        </div>
        <div class="header-right">
          <div class="notification-badge">
            <i class="fas fa-bell notification-icon"></i>
            <span class="notification-count">5</span>
          </div>
          <div class="user-profile">
            <img src="{{ asset('images/dashbordIcons/Group 48095965.png') }}" class="profile-image" />
            <div class="user-info">
              <span class="user-name">{{ Auth::user()->name ?? 'اسم المستخدم' }}</span>
              <span class="user-role">مندوب</span>
            </div>
          </div>
          <div class="mobile-menu-toggle">
            <i class="fas fa-bars"></i>
          </div>
        </div>
      </div>
    </div>
    <!-- dashboard content -->
    <div class="dashboard-tables flex flex-column container space-between mt-70">
      <h2>لوحة التحكم - المندوب</h2>
      <!-- Shelter information -->
      <div class="shelter">
        <table>
          <caption>
            <h3>معلومات مركز الإيواء</h3>
          </caption>
          <tr>
            <th>اسم المركز</th>
            <th>عدد المستفيدين</th>
            <th>آخر تحديث</th>
            <th>المحافظة</th>
            <th>الكمية اليومية المطلوبة</th>
            <th>حالة المركز</th>
          </tr>
          <tbody>
            <tr>
              <td>مركز جباليا للإيواء</td>
              <td>250 أسرة</td>
              <td>10:30 صباحًا</td>
              <td>15/06/2023</td>
              <td>8,000 لتر</td>
              <td class="active"><span>نشطة</span></td>
            </tr>
            <tr>
              <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
            <tr class="border-bt-0">
              <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- daily trucks -->
      <div class="daily-trucks">
        <table>
          <thead>
            <caption>
              <span>الشحنات المتوقعة اليوم</span>
            </caption>
            <th>رقم الشحنة</th>
            <th>السائق</th>
            <th>الوقت المتوقع</th>
            <th>الكمية</th>
            <th>الحالة</th>
            <th>الإجراء</th>
          </thead>
          <tbody>
            <tr>
              <td>#WTR-2021-015</td>
              <td>محمد خليل كنباوي</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
            <tr>
              <td>#WTR-2021-015</td>
              <td>خالد كشميـري</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
            <tr>
              <td>#WTR-2021-015</td>
              <td>خضر كرويته</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- history records -->
      <div class="history-records">
        <table>
          <thead>
            <caption class="flex space-between">
              <span>سجل الشحنات الأخيرة</span>
            </caption>
            <th>رقم الشحنة</th>
            <th>السائق</th>
            <th>الوقت</th>
            <th>الكمية</th>
            <th>الحالة</th>
            <th>الإجراء</th>
          </thead>
          <tbody>
            <tr>
              <td>#WTR-2021-015</td>
              <td>محمد خليل كنباوي</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
            <tr>
              <td>#WTR-2021-015</td>
              <td>خالد كشميـري</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
            <tr>
              <td>#WTR-2021-015</td>
              <td>خضر كرويته</td>
              <td>09:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td><span class="status-badge status-active">نشطة</span></td>
              <td><button>تفاصيل</button></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Sidebar toggle
  const toggle = document.querySelector('.mobile-menu-toggle');
  const sidebar = document.querySelector('.sidebar');
  toggle.addEventListener('click', () => {
    sidebar.classList.toggle('active');
  });
});
</script>
@endsection 