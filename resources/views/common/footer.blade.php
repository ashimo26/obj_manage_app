@section('footer')
<footer class="text-gray-600 body-font">
  <div class="px-5 py-8 mx-auto flex items-center sm:flex-row flex-col">
    <a href="{{ route('user.index') }}" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="cat" class="w-12 h-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
          <path fill="currentColor" d="M290.59 192c-20.18 0-106.82 1.98-162.59 85.95V192c0-52.94-43.06-96-96-96-17.67 0-32 14.33-32 32s14.33 32 32 32c17.64 0 32 14.36 32 32v256c0 35.3 28.7 64 64 64h176c8.84 0 16-7.16 16-16v-16c0-17.67-14.33-32-32-32h-32l128-96v144c0 8.84 7.16 16 16 16h32c8.84 0 16-7.16 16-16V289.86c-10.29 2.67-20.89 4.54-32 4.54-61.81 0-113.52-44.05-125.41-102.4zM448 96h-64l-64-64v134.4c0 53.02 42.98 96 96 96s96-42.98 96-96V32l-64 64zm-72 80c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16zm80 0c-8.84 0-16-7.16-16-16s7.16-16 16-16 16 7.16 16 16-7.16 16-16 16z"></path>
        </svg>
        <span class="ml-3 text-2xl">simonople</span>
    </a>
  </div>
</footer>
@endsection