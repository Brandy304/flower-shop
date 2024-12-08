@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <!-- 主内容区 -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Welcome to Your Default Dashboard</h4>
                    </div>
                    <div class="card-body">
                        @auth
                            <p>Welcome, {{ Auth::user()->name }}! Here are some options:</p>

                            @if (Auth::user()->role === 'admin')
                                <p>Welcome Admin! You can manage users, settings, and reports.</p>
                            @elseif (Auth::user()->role === 'florist')
                                <p>Welcome Florist! You can view orders, manage inventory, and promote items.</p>
                            @elseif (Auth::user()->role === 'user')
                                <p>Welcome User! You can view your orders and wishlist.</p>
                            @else
                                <p>Welcome! Please check back for more options.</p>
                            @endif
                            
                            <<a href="{{ route('profile.edit') }}" class="btn btn-primary">View Profile</a>

                        @else
                            <p>Please <a href="{{ route('login') }}">log in</a> to access your profile and dashboard.</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
