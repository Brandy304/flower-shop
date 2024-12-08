<x-guest-layout>
   <form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div>
        <label for="name">Name</label>
        <input id="name" type="text" name="name" required autofocus>
    </div>

    <!-- Email Address -->
    <div>
        <label for="email">Email</label>
        <input id="email" type="email" name="email" required>
    </div>

    <!-- Password -->
    <div>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" required>
    </div>

    <!-- Confirm Password -->
    <div>
        <label for="password_confirmation">Confirm Password</label>
        <input id="password_confirmation" type="password" name="password_confirmation" required>
    </div>

    <!-- Role Selection -->
    <div>
        <label for="role">Role</label>
        <select name="role" id="role" required>
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="florist">Florist</option>
        </select>
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

</x-guest-layout>

