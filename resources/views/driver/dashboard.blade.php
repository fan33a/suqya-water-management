@extends('layouts.app')

@section('title', 'لوحة تحكم السائق')

@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('css/delegateDashboard.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/truck_ownerDashboard.css') }}" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
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
      <h2>لوحة تحكم السائق</h2>
    </div>
    <ul class="nav-menu flex flex-column">
      <li class="active flex">
        <img src="{{ asset('images/dashbordIcons/cottage.png') }}" alt="cottage" /><a href="#">الرئيسية</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/local_shipping.png') }}" alt="local_shipping" />
        <a href="#">مهام التوصيل</a>
        <span class="notification-box flex justify-content-center">3</span>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/assignment.png') }}" alt="assignment" /><a href="#">سجل التعبئة</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/draft.png') }}" alt="draft" /><a href="#">الجدول الزمني</a>
      </li>
      <li class="flex">
        <img src="{{ asset('images/dashbordIcons/diversity_3.png') }}" alt="diversity_3" /><a href="#">ملاحظة</a>
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
              <span class="user-role">سائق الشاحنة المياه</span>
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
      <h2>لوحة التحكم - السائق</h2>
      <!-- driver information -->
      <div class="shelter">
        <table>
          <caption>
            <h3>معلومات الشاحنة</h3>
          </caption>
          <tr>
            <th>رقم الشاحنة الشاحنة</th>
            <th>المحطة التابعة</th>
            <th>سعة الخزان</th>
            <th>المحافظة</th>
            <th>آخر صيانة</th>
            <th>المسافة المقطوعة</th>
            <th>حالة المركز</th>
          </tr>
          <tbody>
            <tr>
              <td>#TRK-7890</td>
              <td>محطة التحلية الشمالية</td>
              <td>10:30 صباحًا</td>
              <td>8,000 لتر</td>
              <td>15/06/2023</td>
              <td>1,250 كم</td>
              <td class="active"><span>نشطة</span></td>
            </tr>
            <tr>
              <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
            <tr class="border-bt-0">
              <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
            </tr>
          </tbody>
        </table>
      </div>
      <!--truck info -->
      <div class="flex  truck-info">
        <div class="water-info flex flex-column">
          <div class="flex title-info">
            <a href="#"><i class="fa-solid fa-charging-station"></i></a>
            <h2>جدول التعبئة</h2>
          </div>
          <div class="content-info flex flex-wrap">
                <div class="flex">
                    <div class="flex space-between">
                        <a  href="#"><i class="fa-solid fa-water"></i></a>
                        <div class="flex space-between">
                          <div class="flex flex-wrap">
                            <span>تعبئة الخزان</span>
                            <span>محطة التحلية الشمالية</span>
                        </div>
                        <div class="distance-ability flex space-between">
                            <span>1,250 كم</span>
                            <span class="ready">جاهز للعمل</span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex space-between">
                        <a  href="#"><i class="fa-solid fa-water"></i></a>
                        <div class="flex space-between">
                          <div class="flex flex-wrap">
                            <span>تعبئة الخزان</span>
                            <span>محطة التحلية الشمالية</span>
                        </div>
                        <div class="distance-ability flex space-between">
                            <span>1,250 كم</span>
                            <span class="ready">جاهز للعمل</span>
                        </div>
                        </div>
                    </div>
                </div>
          </div>
        </div>
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