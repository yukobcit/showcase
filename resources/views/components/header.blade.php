<header class="flex items-center justify-between p-4">
  <nav>
    <ul class="flex">
      <li><a href="/" class="font-bold text-lg">Home</a></li>
      
  
      <li><a href="/projects" class="font-bold text-lg ml-10">Projects</a></li>
  
      <li><a href="/about" class="font-bold text-lg ml-10">About</a></li>
    </ul>
  </nav>
  <nav>
    <ul class="flex">
    @auth
      <li>  <span class="font-bold text-lg ml-10"> {{ auth()->user()->name }} </span></li>
        @if (auth()->user()->isAdmin())
      <li> <a href="/admin" class="font-bold text-lg ml-10">Admin</a><li>
              @endif
      <li>  <a href="/logout" class="font-bold text-lg ml-10">Logout</a> </li>
    @else
      <li><a href="/login" class="font-bold text-lg ml-10">Log In</a></li>
    @endauth
    </ul>

  </nav>

</header>