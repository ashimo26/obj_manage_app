{{-- common.blade.php の継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')

{{-- sidebarの中に@section('sidebar')があるため、親のどこに代入するか決まっている --}}
@include('user.parts.sidebar')
@section('content')

<div class="container max-w-3xl px-4 mx-auto sm:px-8">
  <div class="mt-8 rounded-xl bg-gray-100 bg-opacity-30 px-16 py-1 shadow-lg backdrop-blur-md max-sm:px-8">  
    <p class="py-8 text-3xl font-bold text-center text-white dark:text-white">
        MY IDEAL
    </p>

  </div>
    <div class="">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                No.
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                自分の価値観
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                編集・削除
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i =1; ?>
                    @foreach($kachis as $kachi)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $i }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  {{ $kachi->kachi }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  <a class="text-blue-400" href="{{ route('mypage.edit', ['id' => $kachi->id]) }}">編集する</a>
                                </p>
                                <form id="delete_{{ $kachi->id }}" method="post" action="{{ route('mypage.destroy', ['id'=> $kachi->id]) }}">
                                @csrf
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <button class="text-red-400" type="submit" onclick="return confirm('本当に削除してもいいですか？')">削除する</button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    * 最大10個まで作成可能
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  
                                </p>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>

    @if($kachis->count() < 10)
    <div class="flex justify-center">
        <button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-500 rounded-lg hover:bg-green-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>

            <a href="{{ route('mypage.create') }}">作成</a>
        </button>
    </div>
    @endif
</div>

<!-- 確認メッセージ -->
<!-- <script>
    function deletePost(e){
        'use strict'
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit()
        }
    }
</script> -->
@endsection