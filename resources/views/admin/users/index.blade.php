@extends('admin.layouts.app')

@section('title', 'Users Management')

@section('breadcrumb')
    <li>
        <div class="flex items-center">
            <i class="fas fa-chevron-right text-gray-400 mx-2"></i>
            <span class="text-sm font-medium text-gray-500">Users Management</span>
        </div>
    </li>
@endsection

@section('page-header')
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6">
        <div>
            <h1 class="text-2xl md:text-3xl font-bold text-gray-900">Users Management</h1>
            <p class="text-gray-600 mt-1">Manage all users, sellers, and administrators</p>
        </div>
        <div class="mt-4 md:mt-0">
            <a href="{{ route('admin.users.create') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white font-medium rounded-lg hover:bg-green-700 transition-colors duration-200">
                <i class="fas fa-user-plus mr-2"></i>
                Add New User
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <!-- Users Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            User
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Role
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Joined
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($users as $user)
                        <tr class="hover:bg-gray-50 transition-colors duration-150">
                            <!-- User Info -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="flex-shrink-0 w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-gray-600 font-medium">
                                            {{ strtoupper(substr($user->name, 0, 2)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-500">{{ $user->email }}</p>
                                        @if ($user->business_name)
                                            <p class="text-xs text-gray-400">{{ $user->business_name }}</p>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <!-- Role -->
                            <td class="px-6 py-4">
                                @if ($user->isAdmin())
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        <i class="fas fa-shield-alt mr-1"></i>
                                        Admin
                                    </span>
                                @elseif($user->isSeller())
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <i class="fas fa-store mr-1"></i>
                                        Seller
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-user mr-1"></i>
                                        Customer
                                    </span>
                                @endif
                            </td>

                            <!-- Status -->
                            <td class="px-6 py-4">
                                @if ($user->is_active)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Active
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        <i class="fas fa-times-circle mr-1"></i>
                                        Inactive
                                    </span>
                                @endif
                            </td>

                            <!-- Joined Date -->
                            <td class="px-6 py-4">
                                <p class="text-sm text-gray-900">{{ $user->created_at->format('M d, Y') }}</p>
                                <p class="text-xs text-gray-500">{{ $user->created_at->diffForHumans() }}</p>
                            </td>

                            <!-- Actions -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <a href="{{ route('admin.users.edit', $user) }}"
                                        class="text-blue-600 hover:text-blue-800 transition-colors duration-200"
                                        title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    <button onclick="toggleUserStatus({{ $user->id }})"
                                        class="text-{{ $user->is_active ? 'yellow' : 'green' }}-600 hover:text-{{ $user->is_active ? 'yellow' : 'green' }}-800 transition-colors duration-200"
                                        title="{{ $user->is_active ? 'Deactivate' : 'Activate' }}">
                                        <i class="fas fa-{{ $user->is_active ? 'eye-slash' : 'eye' }}"></i>
                                    </button>

                                    @if (!$user->isAdmin())
                                        <button onclick="confirmDelete({{ $user->id }})"
                                            class="text-red-600 hover:text-red-800 transition-colors duration-200"
                                            title="Delete">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if ($users->hasPages())
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $users->links() }}
            </div>
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        function toggleUserStatus(userId) {
            if (confirm('Are you sure you want to change this user\'s status?')) {
                fetch(`/admin/users/${userId}/toggle-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }

        function confirmDelete(userId) {
            if (confirm('Are you sure you want to delete this user? This action cannot be undone.')) {
                fetch(`/admin/users/${userId}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        }
    </script>
@endpush
