{{-- common.blade.php の継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')

{{-- sidebarの中に@section('sidebar')があるため、親のどこに代入するか決まっている --}}
@include('user.parts.sidebardiscard')
@section('content')
<div class="container max-w-3xl px-4 mx-auto sm:px-8">
  <div class="mt-8 rounded-xl bg-gray-100 bg-opacity-30 px-16 py-1 shadow-lg backdrop-blur-md max-sm:px-8">  
    <p class="py-8 text-3xl font-bold text-center text-white dark:text-white">
      捨てた物
    </p>
    <p class="text-sm font-bold text-center text-blue dark:text-white">
        * 今まで捨てた物を確認することができます *
    </p>

  </div>
  <div class="">
      <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
          <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
              <table class="min-w-full leading-normal">
                  <thead>
                      <tr>
                          <th scope="col" class="px-5 text-sm font-normal text-right text-gray-800 uppercase bg-stone-200 ">
                              No.
                          </th>
                          <th scope="col" class="px-5 text-sm font-normal text-left text-gray-800 uppercase bg-stone-200">
                              アイテム名
                          </th>
                          <th scope="col" class="px-5 text-sm font-normal text-right text-gray-800 uppercase bg-stone-200">
                              捨てた日
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php $i =1 + (request()->page) * 5; ?>
                  @foreach($huyoubutus as $huyoubutu)
                      <tr>
                          <td class="px-5 py-5 text-sm text-right bg-stone-200 border-b border-gray-200">
                              <p class="text-gray-900 whitespace-no-wrap">
                                {{ $i }}
                              </p>
                          </td>
                          <td class="px-5 py-5 text-sm bg-stone-200 border-b border-gray-200">
                              <p class="text-gray-900 whitespace-no-wrap">
                                {{ $huyoubutu->item }}
                              </p>
                          </td>
                          
                          <td class="px-5 py-5 text-sm text-right bg-stone-200 border-b border-gray-200">
                              <p class="text-gray-900 whitespace-no-wrap">
                                {{ $huyoubutu->updated_at }}
                              </p>
                          </td>
                      </tr>
                      <?php $i++; ?>
                  @endforeach
                  </tbody>
              </table>
          </div>
      {{ $huyoubutus->links() }}
      </div>
  </div>
</div>
@endsection