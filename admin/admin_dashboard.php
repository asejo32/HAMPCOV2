<?php
require_once "components/header.php";

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="mobile-fix.css">
 
</head>
<body class="hampco-admin-sidebar-layout">

  <main>
    <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admin Dashboard</h1>
                        <i class="fa-solid fa-cart-plus"></i>
                        <!-- Notification Bell Icon -->
                    <button class="relative focus:outline-none" title="Notifications">
                        <svg class="w-8 h-8 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <!-- Example: Notification dot -->
                        <span class="absolute top-0 right-0 block h-2 w-2 rounded-full ring-2 ring-white bg-red-500"></span>
                    </button>
                    </div>

                    <!-- Notification Modal -->
                    <div id="notificationModal" style="display: none; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 50;">
                        <div style="position: fixed; top: 60px; right: 20px; width: 100%; max-width: 400px; background-color: white; border-radius: 8px; box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1); display: flex; flex-direction: column; max-height: 500px;">
                            <!-- Modal Header -->
                            <div style="display: flex; justify-content: space-between; align-items: center; padding: 16px; border-bottom: 1px solid #e5e7eb;">
                                <h3 style="font-size: 18px; font-weight: 600; color: #1f2937;">Notifications</h3>
                                <button id="closeNotificationModal" style="background: none; border: none; cursor: pointer; color: #6b7280; padding: 0;">
                                    <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div style="flex: 1; overflow-y: auto; padding: 16px;">
                                <!-- Unverified Members Section -->
                                <div style="margin-bottom: 24px;">
                                    <h4 style="font-weight: 600; color: #1f2937; margin-bottom: 8px; font-size: 14px;">Pending Verifications</h4>
                                    <ul id="unverifiedMembersList" style="list-style: none; padding: 0; margin: 0;">
                                        <li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">Loading...</li>
                                    </ul>
                                </div>

                                <!-- Order Notifications Section -->
                                <div>
                                    <h4 style="font-weight: 600; color: #1f2937; margin-bottom: 8px; font-size: 14px;">Order Notifications</h4>
                                    <ul id="orderNotificationsList" style="list-style: none; padding: 0; margin: 0;">
                                        <li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">Loading...</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Modal Footer -->
                            <div style="padding: 16px; border-top: 1px solid #e5e7eb;">
                                <button id="markAllRead" style="width: 100%; background-color: #2563eb; color: white; font-weight: 600; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; transition: background-color 0.3s;">
                                    Mark All as Read
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total Customers</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php require_once "backend/count_customer.php";?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Total Members</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php require_once "backend/count_member.php";?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">Production Items
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0</div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-uppercase mb-1">
                                                Active Tasks</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4" style="height: 415px; display: flex; flex-direction: column;">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">Current Task Details & Status</h6>
                                </div>
                                <div style="flex: 1; display: flex; flex-direction: column; overflow: hidden;">
                                    <div class="table-responsive" style="flex: 1; overflow-y: auto; overflow-x: auto;">
                                    <table class="table table-sm mb-0" id="recentTasksTable">
                                        <thead class="sticky-top bg-light">
                                        <tr>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Production ID</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Product</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Member</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Role</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Status</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Deadline</th>
                                            <th scope="col" style="font-size: 11px; white-space: nowrap;">Updated</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-3">Loading task data...</td>
                                        </tr>
                                        </tbody>
                                    </table>
                        </div>

                                </div>
                            </div>
                        </div>
                        

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">Member Distributions</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Weavers
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Knotters
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Warpers
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-success">
                                    <h6 class="m-0 font-weight-bold text-light">Projects</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold">Server Migration <span
                                            class="float-right">20%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Sales Tracking <span
                                            class="float-right">40%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Customer Database <span
                                            class="float-right">60%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: 60%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Payout Details <span
                                            class="float-right">80%</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <h4 class="small font-weight-bold">Account Setup <span
                                            class="float-right">Complete!</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Color System -->


                        </div>

                        
                    </div>

                </div>
    

  </main>


<!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard script loaded');

            function updateNotifications() {
                console.log('Updating notifications...');
                
                // Show loading state
                const unverifiedList = document.getElementById('unverifiedMembersList');
                const ordersList = document.getElementById('orderNotificationsList');
                if (unverifiedList) unverifiedList.innerHTML = '<li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">Loading...</li>';
                if (ordersList) ordersList.innerHTML = '<li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">Loading...</li>';
                
                Promise.all([
                    fetch('backend/end-points/get_unverified_members.php')
                        .then(r => {
                            console.log('Get unverified members response status:', r.status);
                            return r.json();
                        })
                        .catch(e => {
                            console.error('Error fetching unverified members:', e);
                            return [];
                        }),
                    fetch('backend/end-points/notifications.php?action=get')
                        .then(r => {
                            console.log('Get notifications response status:', r.status);
                            return r.json();
                        })
                        .catch(e => {
                            console.error('Error fetching notifications:', e);
                            return { notifications: [] };
                        })
                ])
                .then(([memberData, notifData]) => {
                    console.log('Notification data:', memberData, notifData);
                    
                    const notificationBell = document.querySelector('button[title="Notifications"]');
                    if (!notificationBell) {
                        console.error('Notification bell not found!');
                        return;
                    }
                    
                    const notificationDot = notificationBell.querySelector('span');
                    const unverifiedList = document.getElementById('unverifiedMembersList');
                    const ordersList = document.getElementById('orderNotificationsList');
                    
                    // Check if we have notifications
                    const memberCount = Array.isArray(memberData) ? memberData.length : 0;
                    const notificationCount = (notifData && notifData.notifications) ? notifData.notifications.length : 0;
                    const hasNotifications = memberCount > 0 || notificationCount > 0;
                    
                    console.log('Has notifications:', hasNotifications, '(members:', memberCount, 'orders:', notificationCount, ')');
                    
                    // Update notification dot visibility
                    if (notificationDot) {
                        notificationDot.style.display = hasNotifications ? 'block' : 'none';
                    }
                    
                    // Update member verification notifications
                    if (unverifiedList) {
                        if (Array.isArray(memberData) && memberData.length > 0) {
                            unverifiedList.innerHTML = memberData.map(member => `
                                <li style="padding: 12px; background-color: #fffbeb; border-radius: 6px; border: 1px solid #fef3c7; margin-bottom: 8px;">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h4 style="font-weight: 600; color: #1f2937; margin: 0; font-size: 14px;">${member.member_fullname}</h4>
                                            <p style="font-size: 12px; color: #6b7280; margin: 4px 0 0 0;">Role: ${member.member_role}</p>
                                            <p style="font-size: 12px; color: #6b7280; margin: 4px 0 0 0;">Contact: ${member.member_phone}</p>
                                        </div>
                                        <span style="padding: 4px 8px; background-color: #fcd34d; color: #92400e; border-radius: 9999px; font-size: 12px; white-space: nowrap;">Pending</span>
                                    </div>
                                </li>
                            `).join('');
                        } else {
                            unverifiedList.innerHTML = '<li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">No pending verifications</li>';
                        }
                    }

                    // Update order notifications
                    if (ordersList) {
                        if (notifData && notifData.notifications && notifData.notifications.length > 0) {
                            ordersList.innerHTML = notifData.notifications.map(notif => `
                                <li style="padding: 12px; background-color: ${notif.is_read ? '#f3f4f6' : '#eff6ff'}; border-radius: 6px; border: 1px solid ${notif.is_read ? '#e5e7eb' : '#dbeafe'}; margin-bottom: 8px;" data-id="${notif.id}">
                                    <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                                        <div>
                                            <h4 style="font-weight: 600; color: #1f2937; margin: 0; font-size: 14px;">${notif.message}</h4>
                                            <p style="font-size: 12px; color: #6b7280; margin: 4px 0 0 0;">${new Date(notif.created_at).toLocaleString()}</p>
                                        </div>
                                        ${!notif.is_read ? `
                                            <button onclick="markNotificationRead(${notif.id})" style="padding: 4px 8px; font-size: 12px; color: #2563eb; background: none; border: none; cursor: pointer;">
                                                Mark read
                                            </button>
                                        ` : ''}
                                    </div>
                                </li>
                            `).join('');
                        } else {
                            ordersList.innerHTML = '<li style="padding: 12px; color: #9ca3af; text-align: center; font-size: 14px;">No new order notifications</li>';
                        }
                    }
                })
                .catch(error => {
                    console.error('Error updating notifications:', error);
                    if (unverifiedList) {
                        unverifiedList.innerHTML = '<li style="padding: 12px; color: #dc2626; text-align: center; font-size: 14px;">Error loading notifications</li>';
                    }
                });
            }

            // Initial check for notifications
            setTimeout(() => {
                updateNotifications();
            }, 500);

            // Check for new notifications every 30 seconds
            setInterval(updateNotifications, 30000);

            const notificationBell = document.querySelector('button[title="Notifications"]');
            if (notificationBell) {
                notificationBell.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const modal = document.getElementById('notificationModal');
                    if (modal) {
                        const currentDisplay = modal.style.display;
                        const isHidden = currentDisplay === 'none' || currentDisplay === '';
                        modal.style.display = isHidden ? 'block' : 'none';
                        if (isHidden) {
                            updateNotifications(); // Refresh notifications when opening modal
                        }
                    }
                });
            } else {
                console.error('Notification bell button not found!');
            }

            const closeBtn = document.getElementById('closeNotificationModal');
            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const modal = document.getElementById('notificationModal');
                    if (modal) {
                        modal.style.display = 'none';
                    }
                });
            }

            // Close modal when clicking outside of it
            const modal = document.getElementById('notificationModal');
            if (modal) {
                modal.addEventListener('click', function(e) {
                    if (e.target === this) {
                        this.style.display = 'none';
                    }
                });
            }

            // Function to mark a single notification as read
            window.markNotificationRead = function(notificationId) {
                console.log('Marking notification as read:', notificationId);
                fetch('backend/end-points/notifications.php?action=mark-read', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ notification_id: notificationId })
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Mark read response:', data);
                    if (data.success) {
                        updateNotifications();
                    }
                })
                .catch(error => console.error('Error marking notification as read:', error));
            };

            // Handle mark all as read button
            const markAllReadBtn = document.getElementById('markAllRead');
            if (markAllReadBtn) {
                markAllReadBtn.addEventListener('click', function() {
                    console.log('Marking all notifications as read');
                    fetch('backend/end-points/notifications.php?action=mark-read', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Mark all read response:', data);
                        if (data.success) {
                            updateNotifications();
                            if (typeof alertify !== 'undefined') {
                                alertify.success('All notifications marked as read');
                            }
                        }
                    })
                    .catch(error => console.error('Error marking all notifications as read:', error));
                });
            }
        });
    </script>

    <!-- Recent Tasks Data Loading Script -->
    <script>
    // Load recent tasks data
    function loadRecentTasks() {
        fetch('backend/end-points/get_current_task_status.php')
            .then(response => response.json())
            .then(data => {
                if (data.success && data.tasks && data.tasks.length > 0) {
                    const tableBody = document.querySelector('#recentTasksTable tbody');
                    
                    // Limit to 8 most recent tasks
                    const recentTasks = data.tasks.slice(0, 8);
                    
                    tableBody.innerHTML = recentTasks.map(task => {
                        const statusBadgeClass = task.status.badge === 'success' ? 'badge-success' :
                                                task.status.badge === 'warning' ? 'badge-warning' :
                                                task.status.badge === 'info' ? 'badge-info' :
                                                'badge-secondary';
                        
                        const daysRemaining = task.dates.days_remaining;
                        const deadlineClass = daysRemaining < 0 ? 'text-danger font-weight-bold' :
                                            daysRemaining <= 1 ? 'text-warning font-weight-bold' :
                                            'text-muted';
                        
                        const deadlineText = daysRemaining < 0 ? `Overdue by ${Math.abs(daysRemaining)}d` :
                                           daysRemaining === 0 ? 'Due Today' :
                                           daysRemaining === 1 ? 'Due Tomorrow' :
                                           `${daysRemaining}d`;
                        
                        return `
                            <tr style="height: 35px; vertical-align: middle;">
                                <td style="font-size: 11px; font-weight: 500; padding: 4px 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;">${task.production_id}</td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 90px;">${task.product_name}</td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 80px;" title="${task.member.name}">${task.member.name}</td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap; text-capitalize;" class="text-center">${task.member.role.substring(0, 3).toUpperCase()}</td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap;">
                                    <span class="badge badge-sm ${statusBadgeClass}" style="display: inline-block;">${task.status.label}</span>
                                </td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap;" class="${deadlineClass}">
                                    ${deadlineText}
                                </td>
                                <td style="font-size: 11px; padding: 4px 8px; white-space: nowrap; color: #999;">
                                    ${formatTimeAgo(task.dates.task_updated)}
                                </td>
                            </tr>
                        `;
                    }).join('');
                } else {
                    const tableBody = document.querySelector('#recentTasksTable tbody');
                    tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-muted py-3">No active tasks</td></tr>';
                }
            })
            .catch(error => {
                console.error('Error loading recent tasks:', error);
                const tableBody = document.querySelector('#recentTasksTable tbody');
                tableBody.innerHTML = '<tr><td colspan="7" class="text-center text-danger py-3">Error loading tasks</td></tr>';
            });
    }

    // Helper function to format time ago
    function formatTimeAgo(dateString) {
        const date = new Date(dateString);
        const now = new Date();
        const diff = now - date;
        const minutes = Math.floor(diff / 60000);
        const hours = Math.floor(diff / 3600000);
        const days = Math.floor(diff / 86400000);

        if (minutes < 1) return 'Now';
        if (minutes < 60) return `${minutes}m`;
        if (hours < 24) return `${hours}h`;
        if (days < 7) return `${days}d`;
        
        return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric' });
    }

    // Load tasks on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadRecentTasks();
        // Refresh every 30 seconds
        setInterval(loadRecentTasks, 30000);
    });
    </script>

</body>
</html>