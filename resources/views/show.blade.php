<!DOCTYPE html>
<html>
<head>
  <title>User {{ $user->id }}</title>
</head>
<body>
  <h1>User name {{ $user->name }}</h1>
  <ul>
    <li>Admin: {{$user->admin}}</li>
    <li>Email: {{$user->email}}</li>
    <li>Password: {{$user->password}}</li>
  </ul>
</body>
</html>
