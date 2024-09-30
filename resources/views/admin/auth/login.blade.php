<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Document</title>
</head>
<body class="h-full bg-gray-900">
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-20 w-auto cursor-pointer" src="{{ asset('assets/front/media/f-logo.svg') }}" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Sign in to your account</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form action="{{ route('admin.auth.login.submit') }}" class="space-y-6" action="#" method="POST">
            @csrf
            @if(@session('error'))
            <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ session('error') }}</p> 
        @endif
            <div>
              <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
              <div class="mt-2">
                <input id="email" name="email" type="email" autocomplete="email" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                @if($errors->has('email'))
            <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('email') }}</p> 
        @endif
              </div>
            </div>
      
            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                @if($errors->has('password'))
                <p class="p-2 text-sm font-bold text-red-800 rounded-lg  dark:text-red-400" role="alert">{{ $errors->first('password') }}</p> 
            @endif
                <div class="text-sm">
                  <a href="#" class="font-semibold text-indigo-600 hover:text-indigo-500">Forgot password?</a>
                </div>
              </div>
              <div class="mt-2">
                <input id="password" name="password" type="password" autocomplete="current-password" required class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
              </div>
            </div>
      
            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Sign in</button>
            </div>
          </form>
      
         
        </div>
      </div>
</body>
</html>