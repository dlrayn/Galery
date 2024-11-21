<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
      .hover-zoom:hover {
        transform: scale(1.03);
        transition: transform 0.3s ease;
      }
      ::-webkit-scrollbar {
        width: 8px;
      }
      ::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.2);
        border-radius: 8px;
      }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 via-white to-indigo-50 min-h-screen">

  <!-- Sidebar -->
  <div class="flex">
    <aside class="w-64 bg-gradient-to-t from-indigo-300 to-indigo-200 text-gray-900 p-6 fixed top-0 left-0 h-screen shadow-lg">
      <h2 class="text-3xl font-extrabold tracking-wide mb-12 text-gray-800">Dashboard</h2>
      <nav class="space-y-6">
      <a href="{{ route('dashboard.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 6h18M3 14h18M3 18h18"/>
        </svg>
        <span class="font-medium">Dashboard</span>
      </a>
      <a href="{{ route('profile.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
        <svg width="24" height="24" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg"><path d="M256 112c-48.6 0-88 39.4-88 88C168 248.6 207.4 288 256 288s88-39.4 88-88C344 151.4 304.6 112 256 112zM256 240c-22.06 0-40-17.95-40-40C216 177.9 233.9 160 256 160s40 17.94 40 40C296 222.1 278.1 240 256 240zM256 0C114.6 0 0 114.6 0 256s114.6 256 256 256s256-114.6 256-256S397.4 0 256 0zM256 464c-46.73 0-89.76-15.68-124.5-41.79C148.8 389 182.4 368 220.2 368h71.69c37.75 0 71.31 21.01 88.68 54.21C345.8 448.3 302.7 464 256 464zM416.2 388.5C389.2 346.3 343.2 320 291.8 320H220.2c-51.36 0-97.35 26.25-124.4 68.48C65.96 352.5 48 306.3 48 256c0-114.7 93.31-208 208-208s208 93.31 208 208C464 306.3 446 352.5 416.2 388.5z"/></svg>
          <span class="font-medium">Profile</span>
        </a>
        <a href="{{ route('petugas.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
          <svg height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title/><g id="sitemap"><path d="M22,16H21V13a1,1,0,0,0-1-1H13V10h2a1,1,0,0,0,1-1V2a1,1,0,0,0-1-1H9A1,1,0,0,0,8,2V9a1,1,0,0,0,1,1h2v2H4a1,1,0,0,0-1,1v3H2a1,1,0,0,0-1,1v5a1,1,0,0,0,1,1H6a1,1,0,0,0,1-1V17a1,1,0,0,0-1-1H5V14h6v2H10a1,1,0,0,0-1,1v5a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V17a1,1,0,0,0-1-1H13V14h6v2H18a1,1,0,0,0-1,1v5a1,1,0,0,0,1,1h4a1,1,0,0,0,1-1V17A1,1,0,0,0,22,16ZM10,3h4V8H10ZM5,21H3V18H5Zm8,0H11V18h2Zm8,0H19V18h2Z"/></g></svg>
          <span class="font-medium">Manajemen Admin</span>
        </a>
        <a href="{{ route('kategori.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
        <svg class="feather feather-copy" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><rect height="13" rx="2" ry="2" width="13" x="9" y="9"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
          <span class="font-medium">Kategori</span>
        </a>
        <a href="{{ route('posts.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
          <svg class="feather feather-upload" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
          <span class="font-medium">Post</span>
        </a>
        <a href="{{ route('galery.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
          <svg height="24" id="svg8" version="1.1" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"><defs id="defs2"/><g id="g2376" style="display:inline" transform="translate(0,-290.64998)"><path d="m 6,292.64998 c -2.1987,0 -4,1.8013 -4,4 v 12 c 0,2.1987 1.8013,4 4,4 h 12 c 2.1987,0 4,-1.8013 4,-4 v -12 c 0,-2.1987 -1.8013,-4 -4,-4 z m 0,2 h 12 c 1.1253,0 2,0.8747 2,2 v 6.04883 L 18.62109,301.3199 C 18.17776,300.87658 17.58864,300.65584 17,300.65584 c -0.58864,0 -1.17776,0.22073 -1.62109,0.66406 l -3.17188,3.17383 c -0.17962,0.17962 -0.44438,0.20015 -0.64844,0.0488 l -1.79297,-1.33008 c -0.98477,-0.73012 -2.36825,-0.64626 -3.25781,0.19727 L 4,305.78865 v -9.13867 c 0,-1.1253 0.8747,-2 2,-2 z M 17.20703,302.73592 20,305.52889 v 3.12109 c 0,1.1253 -0.8747,2 -2,2 H 6 c -1.07446,0 -2,-0.98795 -2,-2.10742 l 3.88281,-3.68164 c 0.19462,-0.18455 0.47596,-0.20077 0.69141,-0.041 l 1.79297,1.32812 c 0.98849,0.73288 2.38378,0.62989 3.2539,-0.24023 l 3.17188,-3.17188 c 0.13039,-0.13039 0.33995,-0.0741 0.41406,1e-5 z" id="rect2317" style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-variant-east-asian:normal;font-feature-settings:normal;font-variation-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;shape-margin:0;inline-size:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#000000;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate;stop-color:#000000;stop-opacity:1"/><path d="M 9,298.13022 A 1.5197747,1.5197747 0 0 1 7.48023,299.64999 1.5197747,1.5197747 0 0 1 5.96045,298.13022 1.5197747,1.5197747 0 0 1 7.48023,296.61044 1.5197747,1.5197747 0 0 1 9,298.13022 Z" id="path2356" style="fill:#000000;fill-opacity:1;stroke:none;stroke-width:1.99999;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1;opacity:1"/></g></svg>
          <span class="font-medium">Galery</span>
        </a>
        <a href="{{ route('foto.index') }}" class="flex items-center space-x-4 hover:bg-indigo-400/30 p-3 rounded-lg transition">
        <svg class="feather feather-camera" fill="none" height="24" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2h4l2-2h6l2 2h4a2 2 0 0 1 2 2z"/>
          <circle cx="12" cy="13" r="4"/>
        </svg>
        <span class="font-medium">Foto</span>
      </a>
      </nav>
    </aside>

      <!-- Content -->
      <main class="ml-64 p-10 w-full space-y-12">
        @yield('content')  <!-- Tempat untuk konten dinamis -->
      </main>
    </div>

</body>
</html>
