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
        {{ $list_name }}
    </p>
    <p class="text-sm font-bold text-center text-blue dark:text-white">
        * 部屋ごとに捨てるか悩んでいる物を追加しましょう *
    </p>

  </div>
    <div class="">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 text-sm font-normal text-right text-gray-800 uppercase bg-stone-200 ">
                                
                            </th>
                            <th scope="col" class="px-5 text-sm font-normal text-left text-gray-800 uppercase bg-stone-200">
                                
                            </th>
                            <th scope="col" class="px-5 text-sm font-normal text-right text-gray-800 uppercase bg-stone-200">
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i =1; ?>
                    @foreach($huyoubutus as $item)
                        <tr>
                            <td class="px-5 py-5 text-sm text-right bg-stone-200 border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  {{ $item->item }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-stone-200 border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                  <a class="text-blue-400" href="{{ route('discard_list.show', ['id' => $item->id]) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                    </svg>
                                  </a>
                                </p>
                            </td>
                            
                            <td class="px-5 py-5 text-sm text-right bg-stone-200 border-b border-gray-200">
                                <form id="" method="post" action="{{ route('discard_list.destroy', ['id'=> $item->id]) }}">
                                @csrf
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <button class="text-red-400" type="submit" onclick="return confirm('リストの中身まで削除されます。本当に削除してもいいですか？')">削除する</button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center py-4">
                    <button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-500 rounded-lg hover:bg-green-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <a href="{{ route('discard_list.create') }}">新規リスト作成</a>
                    </button>
                </div>
            </div>
        </div>
    </div>
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