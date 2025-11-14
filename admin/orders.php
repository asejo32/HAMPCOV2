<?php
include "components/header.php";
?>
<body class="hampco-admin-sidebar-layout">
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Order Management</h1>
        <div class="flex gap-2">
            <select id="statusFilter" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="all">All Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
            </select>
            <select id="paymentFilter" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                <option value="all">All Payment Methods</option>
                <option value="cod">Cash on Delivery</option>
                <option value="pickup">Pickup</option>
            </select>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Order ID
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Customer
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Payment Method
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Total Amount
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody id="ordersTableBody" class="bg-white divide-y divide-gray-200">
                    <!-- Orders will be loaded here -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Order Details Modal -->
<div id="orderDetailsModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg p-6 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold" id="modalOrderId">Order Details</h2>
            <button onclick="closeOrderModal()" class="text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        
        <div id="orderDetails" class="space-y-6">
            <!-- Order details will be loaded here -->
        </div>
        
        <div class="mt-6 pt-4 border-t">
            <div class="flex justify-between items-center">
                <div class="space-x-2">
                    <select id="orderStatus" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="completed">Completed</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                    <button onclick="updateOrderStatus()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                        Update Status
                    </button>
                </div>
                <button onclick="printOrder()" class="px-4 py-2 text-blue-600 border border-blue-600 rounded hover:bg-blue-50">
                    Print Order
                </button>
            </div>
        </div>
    </div>
</div>
</body>
<script>
let currentOrderId = null;

function loadOrders() {
    const statusFilter = $('#statusFilter').val();
    const paymentFilter = $('#paymentFilter').val();
    
    $('#ordersTableBody').html(`
        <tr>
            <td colspan="7" class="px-6 py-4 text-center">
                <div class="flex justify-center">
                    <div class="animate-spin rounded-full h-8 w-8 border-t-2 border-b-2 border-blue-500"></div>
                </div>
            </td>
        </tr>
    `);

    $.ajax({
        url: 'backend/get_orders.php',
        type: 'GET',
        data: {
            status: statusFilter,
            payment_method: paymentFilter
        },
        success: function(response) {
            if (response.success) {
                const orders = response.orders;
                $('#ordersTableBody').empty();
                
                if (orders.length === 0) {
                    $('#ordersTableBody').html(`
                        <tr>
                            <td colspan="7" class="px-6 py-4 text-center text-gray-500">
                                No orders found
                            </td>
                        </tr>
                    `);
                    return;
                }
                
                orders.forEach(order => {
                    const statusClass = getStatusClass(order.status);
                    $('#ordersTableBody').append(`
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">#${order.order_id}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">${order.customer_name}</div>
                                <div class="text-sm text-gray-500">${order.email}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm text-gray-900">${order.payment_method === 'cod' ? 'Cash on Delivery' : 'Pickup'}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="text-sm font-medium text-gray-900">₱${parseFloat(order.total_amount).toLocaleString(undefined, { minimumFractionDigits: 2 })}</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full ${statusClass}">
                                    ${order.status.charAt(0).toUpperCase() + order.status.slice(1)}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                ${new Date(order.created_at).toLocaleString()}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <button onclick="viewOrderDetails(${order.order_id})" class="text-blue-600 hover:text-blue-900">
                                    View Details
                                </button>
                            </td>
                        </tr>
                    `);
                });
            }
        },
        error: function() {
            $('#ordersTableBody').html(`
                <tr>
                    <td colspan="7" class="px-6 py-4 text-center text-red-500">
                        Failed to load orders. Please try again.
                    </td>
                </tr>
            `);
        }
    });
}

function getStatusClass(status) {
    const classes = {
        'pending': 'bg-yellow-100 text-yellow-800',
        'processing': 'bg-blue-100 text-blue-800',
        'completed': 'bg-green-100 text-green-800',
        'delivered': 'bg-green-100 text-green-800',
        'cancelled': 'bg-red-100 text-red-800'
    };
    return classes[status.toLowerCase()] || 'bg-gray-100 text-gray-800';
}

function viewOrderDetails(orderId) {
    currentOrderId = orderId;
    
    $.ajax({
        url: 'backend/get_order_details.php',
        type: 'GET',
        data: { order_id: orderId },
        success: function(response) {
            if (response.success) {
                const order = response.order;
                $('#modalOrderId').text(`Order #${order.order_id}`);
                $('#orderStatus').val(order.status);
                
                const items = response.items;
                let itemsHtml = items.map(item => `
                    <div class="flex items-center py-4 border-b last:border-0">
                        <div class="flex-shrink-0 h-16 w-16">
                            <img class="h-16 w-16 rounded object-cover" src="../upload/${item.prod_image}" alt="${item.prod_name}">
                        </div>
                        <div class="ml-4 flex-1">
                            <div class="text-sm font-medium text-gray-900">${item.prod_name}</div>
                            <div class="text-sm text-gray-500">Quantity: ${item.quantity}</div>
                            <div class="text-sm text-gray-500">Price: ₱${parseFloat(item.price).toLocaleString(undefined, { minimumFractionDigits: 2 })}</div>
                        </div>
                        <div class="ml-4">
                            <div class="text-sm font-medium text-gray-900">₱${(parseFloat(item.price) * parseInt(item.quantity)).toLocaleString(undefined, { minimumFractionDigits: 2 })}</div>
                        </div>
                    </div>
                `).join('');

                $('#orderDetails').html(`
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Customer Information</h3>
                            <p class="text-sm text-gray-600">Name: ${order.customer_name}</p>
                            <p class="text-sm text-gray-600">Email: ${order.email}</p>
                            <p class="text-sm text-gray-600">Phone: ${order.contact_number || 'N/A'}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Order Information</h3>
                            <p class="text-sm text-gray-600">Payment Method: ${order.payment_method === 'cod' ? 'Cash on Delivery' : 'Pickup'}</p>
                            ${order.payment_method === 'cod' ? 
                                `<p class="text-sm text-gray-600">Delivery Address: ${order.delivery_address}</p>` :
                                `<p class="text-sm text-gray-600">Pickup Date: ${new Date(order.pickup_date).toLocaleDateString()}</p>`
                            }
                            <p class="text-sm text-gray-600">Order Date: ${new Date(order.created_at).toLocaleString()}</p>
                        </div>
                    </div>
                    
                    <div class="mt-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Order Items</h3>
                        <div class="space-y-4">
                            ${itemsHtml}
                        </div>
                        <div class="mt-4 pt-4 border-t text-right">
                            <span class="text-sm font-medium text-gray-500">Total Amount:</span>
                            <span class="ml-2 text-lg font-bold text-gray-900">₱${parseFloat(order.total_amount).toLocaleString(undefined, { minimumFractionDigits: 2 })}</span>
                        </div>
                    </div>
                `);
                
                $('#orderDetailsModal').removeClass('hidden').css('display', 'flex');
            } else {
                alertify.error('Failed to load order details');
            }
        },
        error: function() {
            alertify.error('Failed to load order details');
        }
    });
}

function updateOrderStatus() {
    if (!currentOrderId) return;
    
    const newStatus = $('#orderStatus').val();
    $.ajax({
        url: 'backend/update_order_status.php',
        type: 'POST',
        data: {
            order_id: currentOrderId,
            status: newStatus
        },
        success: function(response) {
            if (response.success) {
                alertify.success('Order status updated successfully');
                loadOrders();
            } else {
                alertify.error(response.message || 'Failed to update order status');
            }
        },
        error: function() {
            alertify.error('Failed to update order status');
        }
    });
}

function closeOrderModal() {
    $('#orderDetailsModal').addClass('hidden');
    currentOrderId = null;
}

function printOrder() {
    if (!currentOrderId) return;
    
    const printWindow = window.open('', '_blank');
    const orderDetails = $('#orderDetails').html();
    const modalOrderId = $('#modalOrderId').text();
    
    printWindow.document.write(`
        <!DOCTYPE html>
        <html>
        <head>
            <title>${modalOrderId}</title>
            <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
        </head>
        <body class="p-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-2xl font-bold mb-6">${modalOrderId}</h1>
                ${orderDetails}
            </div>
            <script>
                window.onload = function() {
                    window.print();
                    window.onfocus = function() { window.close(); }
                }
            </script>
        </body>
        </html>
    `);
    printWindow.document.close();
}

// Event listeners
$('#statusFilter, #paymentFilter').change(function() {
    loadOrders();
});

// Initial load
$(document).ready(function() {
    loadOrders();
});
</script>

<?php include "components/footer.php"; ?>