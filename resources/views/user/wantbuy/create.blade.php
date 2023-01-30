{{-- common.blade.php の継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')
@section('content')
    <form action="{{ route('buy_list.store') }}" method="POST" class="p-5">
    @csrf
    @if ($errors->any())
      <div class="flex shadow-lg rounded-sm">
          <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20" height="20">
                  <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
              </svg>
          </div>
          <div class="px-4 py-6 bg-red-50 rounded-r-lg justify-between items-center w-full border border-l-transparent border-red-50">
              <div class="text-red-600 text-md font-bold">エラー！</div>
              <ul>
                  @foreach ($errors->all() as $error)
                      <li  class="text-sm text-red-500">{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      </div>
    @endif
    @if (!empty($name_error))
      <div class="flex shadow-lg rounded-sm">
          <div class="bg-red-600 py-4 px-6 rounded-l-lg flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" class="fill-current text-white" width="20" height="20">
                  <path fill-rule="evenodd" d="M8.22 1.754a.25.25 0 00-.44 0L1.698 13.132a.25.25 0 00.22.368h12.164a.25.25 0 00.22-.368L8.22 1.754zm-1.763-.707c.659-1.234 2.427-1.234 3.086 0l6.082 11.378A1.75 1.75 0 0114.082 15H1.918a1.75 1.75 0 01-1.543-2.575L6.457 1.047zM9 11a1 1 0 11-2 0 1 1 0 012 0zm-.25-5.25a.75.75 0 00-1.5 0v2.5a.75.75 0 001.5 0v-2.5z"></path>
              </svg>
          </div>
          <div class="px-4 py-6 bg-red-50 rounded-r-lg justify-between items-center w-full border border-l-transparent border-red-50">
              <div class="text-red-600 text-md font-bold">エラー！</div>
              <ul>
                      <li  class="text-sm text-red-500">{{ $name_error }}</li>
              </ul>
          </div>
      </div>
    @endif
      <div class="w-screen flex flex-col justify-center items-center">
        <div class="w-3/4 mt-8 rounded-xl bg-gray-100 bg-opacity-30 px-16 py-1 shadow-lg backdrop-blur-md max-sm:px-8">  
          <p class="py-8 text-xl font-bold text-center text-white dark:text-white">
              部屋名を入力してください
          </p>
        </div>
        <div class="w-3/4 mt-4">
        <input type="text" name="list_name" class="block w-full h-16 px-4 py-2 border-none resize-none text-gray-700 bg-white border rounded-md focus:outline-none focus:ring" placeholder="ex. リビング">
        </div>
      
        <button type="submit" class="flex items-center mt-4 px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-500 rounded-lg hover:bg-green-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <p class="pl-1">作成</p>
        </button>
      </div>
    </form>
@endsection