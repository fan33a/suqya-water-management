@extends('layouts.app')

@section('title', 'إدارة المندوبين')

@section('styles')
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/stationsDashboard.css') }}" />
    <style>
        .delegates-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .delegates-header h1 {
            margin: 0;
            color: #333;
            font-size: 1.8em;
        }
        
        .add-delegate-btn {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: background 0.3s;
        }
        
        .add-delegate-btn:hover {
            background: #0056b3;
        }
        
        .delegates-table-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            overflow: hidden;
        }
        
        .delegates-table {
            width: 100%;
            border-collapse: collapse;
        }
        
        .delegates-table th {
            background: #f8f9fa;
            padding: 15px;
            text-align: right;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #dee2e6;
        }
        
        .delegates-table td {
            padding: 15px;
            border-bottom: 1px solid #dee2e6;
            text-align: right;
        }
        
        .delegates-table tr:hover {
            background: #f8f9fa;
        }
        
        .status {
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 0.85em;
            font-weight: 500;
        }
        
        .status.active {
            background: #d4edda;
            color: #155724;
        }
        
        .status.inactive {
            background: #f8d7da;
            color: #721c24;
        }
        
        .actions {
            display: flex;
            gap: 5px;
            justify-content: center;
        }
        
        .action-btn {
            border: none;
            background: none;
            padding: 6px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1em;
            transition: background 0.2s;
        }
        
        .view-btn {
            color: #007bff;
        }
        
        .view-btn:hover {
            background: #e3f2fd;
        }
        
        .edit-btn {
            color: #28a745;
        }
        
        .edit-btn:hover {
            background: #e8f5e8;
        }
        
        .disable-btn {
            color: #ffc107;
        }
        
        .disable-btn:hover {
            background: #fff8e1;
        }
        
        .delete-btn {
            color: #dc3545;
        }
        
        .delete-btn:hover {
            background: #ffebee;
        }
        
        .stats-cell {
            text-align: center;
            font-weight: 600;
        }
        
        .last-activity {
            color: #6c757d;
            font-size: 0.9em;
        }
        
        .no-delegates {
            text-align: center;
            padding: 40px;
            color: #6c757d;
        }
        
        .no-delegates i {
            font-size: 3em;
            margin-bottom: 15px;
            opacity: 0.5;
        }
    </style>
@endsection

@section('content')
<div class="container-full flex">
    <div class="overlay"></div>
    <!-- Sidebar -->
    @include('organization.components.sidebar')
    <!-- Main content -->
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
                            <span class="user-role">صاحب المؤسسة</span>
                        </div>
                    </div>
                    <div class="mobile-menu-toggle">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="delegates-dashboard">
            <div class="delegates-header">
                <h1><i class="fas fa-users"></i> إدارة المندوبين</h1>
                <button id="showDelegateFormBtn" class="add-delegate-btn" type="button">
                    <i class="fas fa-plus"></i>
                    إضافة مندوب جديد
                </button>
            </div>
            
            <div class="delegates-table-container">
                @if($delegates->count() > 0)
                <table class="delegates-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>الاسم الكامل</th>
                            <th>الجوال</th>
                            <th>المدينة</th>
                            <th>عدد المحطات</th>
                            <th>عدد الطلبات</th>
                            <th>آخر نشاط</th>
                            <th>الحالة</th>
                            <th>إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($delegates as $index => $delegate)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $delegate->name }}</td>
                            <td>{{ $delegate->phone ?? '-' }}</td>
                            <td>{{ $delegate->city ?? '-' }}</td>
                            <td class="stats-cell">{{ $delegate->stations_count ?? 0 }}</td>
                            <td class="stats-cell">{{ $delegate->orders_count ?? 0 }}</td>
                            <td class="last-activity">{{ $delegate->last_activity ?? 'غير محدد' }}</td>
                            <td>
                                <span class="status {{ $delegate->status ?? 'active' }}">
                                    @if(($delegate->status ?? 'active') === 'active')
                                        نشط ✅
                                    @else
                                        غير نشط ❌
                                    @endif
                                </span>
                            </td>
                            <td>
                                <div class="actions">
                                    <button class="action-btn view-btn" title="عرض" onclick="viewDelegate({{ $delegate->id }})">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="action-btn edit-btn" title="تعديل" onclick="editDelegate({{ $delegate->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    @if(($delegate->status ?? 'active') === 'active')
                                        <button class="action-btn disable-btn" title="تعطيل" onclick="toggleDelegateStatus({{ $delegate->id }}, 'inactive')">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    @else
                                        <button class="action-btn disable-btn" title="تفعيل" onclick="toggleDelegateStatus({{ $delegate->id }}, 'active')">
                                            <i class="fas fa-check"></i>
                                        </button>
                                    @endif
                                    <button class="action-btn delete-btn" title="حذف" onclick="deleteDelegate({{ $delegate->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="no-delegates">
                    <i class="fas fa-users"></i>
                    <h3>لا يوجد مندوبون حالياً</h3>
                    <p>قم بإضافة مندوب جديد للبدء في إدارة المندوبين</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener("DOMContentLoaded", function() {
    // View delegate details
    window.viewDelegate = function(delegateId) {
        // Implement view functionality
        alert('عرض تفاصيل المندوب رقم: ' + delegateId);
    };
    
    // Edit delegate
    window.editDelegate = function(delegateId) {
        // Implement edit functionality
        alert('تعديل المندوب رقم: ' + delegateId);
    };
    
    // Toggle delegate status
    window.toggleDelegateStatus = function(delegateId, status) {
        if (confirm('هل أنت متأكد من تغيير حالة المندوب؟')) {
            // Implement status toggle functionality
            alert('تغيير حالة المندوب رقم: ' + delegateId + ' إلى: ' + status);
        }
    };
    
    // Delete delegate
    window.deleteDelegate = function(delegateId) {
        if (confirm('هل أنت متأكد من حذف المندوب؟ هذا الإجراء لا يمكن التراجع عنه.')) {
            // Implement delete functionality
            alert('حذف المندوب رقم: ' + delegateId);
        }
    };
    
    // Add delegate form button
    const showFormBtn = document.getElementById("showDelegateFormBtn");
    if (showFormBtn) {
        showFormBtn.addEventListener("click", function() {
            // Implement add delegate form
            alert('إضافة مندوب جديد');
        });
    }
});
</script>
@endsection 