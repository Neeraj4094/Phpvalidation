<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../dist/output.css">
  <title>Document</title>
</head>

<body>
  
  <main class="h-screen w-full flex flex-col justify-center items-center bg-slate-900">
    <h1 class="text-9xl font-bold text-white tracking-widest">404</h1>
    <div class="bg-rose-400 px-2 text-sm rounded rotate-12 absolute">
      Page Not Found
    </div>
    <button class="mt-5">
      <a href="/phpprogramms/task7/home_page"
        class="relative inline-block text-sm font-medium text-[rose-400 group active:text-orange-500 focus:outline-none focus:ring">
        <span
          class="absolute inset-0 transition-transform translate-x-0.5 translate-y-0.5 bg-[#FF6A3D] group-hover:translate-y-0 group-hover:translate-x-0"></span>

        <span class="relative block px-8 py-3 bg-[#1A2238] text-white border border-current">
          <router-link to="">Go Home</router-link>
        </span>
      </a>
    </button>
  </main>
</body>

</html>