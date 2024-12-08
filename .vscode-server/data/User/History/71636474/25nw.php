@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- 用户侧边栏 -->
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                        <a href="{{ route('profile') }}" class="btn btn-primary">View Profile</a>
                    </div>
                </div>
            </div>

            <!-- 主内容区 -->
            <div class="col-md-9">
                @if(Auth::user()->role === 'admin')
                    <div class="card">
                        <div class="card-header">
                            <h4>Admin Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Welcome Admin! Here are your controls:</p>
                            <ul>
                                <li><a href="{{ route('admin.users') }}">Manage Users</a></li>
                                <li><a href="{{ route('admin.settings') }}">Settings</a></li>
                                <li><a href="{{ route('admin.reports') }}">Reports</a></li>
                            </ul>
                        </div>
                    </div>
                @elseif(Auth::user()->role === 'florist')
                    <div class="card">
                        <div class="card-header">
                            <h4>Florist Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Welcome Florist! Here are your controls:</p>
                            <ul>
                                <li><a href="{{ route('florist.orders') }}">View Orders</a></li>
                                <li><a href="{{ route('florist.inventory') }}">Manage Inventory</a></li>
                                <li><a href="{{ route('florist.promotions') }}">Promotions</a></li>
                            </ul>
                        </div>
                    </div>
                @elseif(Auth::user()->role === 'user')
                    <div class="card">
                        <div class="card-header">
                            <h4>User Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Welcome User! Here are your controls:</p>
                            <ul>
                                <li><a href="{{ route('user.orders') }}">Your Orders</a></li>
                                <li><a href="{{ route('user.wishlist') }}">Your Wishlist</a></li>
                                <li><a href="{{ route('user.account') }}">Account Settings</a></li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header">
                            <h4>Default Dashboard</h4>
                        </div>
                        <div class="card-body">
                            <p>Welcome to your default dashboard! Here is some general information.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
