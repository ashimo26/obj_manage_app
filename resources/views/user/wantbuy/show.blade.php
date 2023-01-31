{{-- common.blade.php の継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')

{{-- sidebarの中に@section('sidebar')があるため、親のどこに代入するか決まっている --}}
@include('user.parts.sidebarwantbuy')
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
                <div class="flex justify-center py-4">
                    <button class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-green-500 rounded-lg hover:bg-green-400 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <a href="{{ route('discard.create', ['listname'=>$list_name]) }}">捨てる物を作成</a>
                    </button>
                </div>
                <form method="POST" action="{{ route('discard.discard') }}" >
                @csrf
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-4 text-sm font-normal text-left text-gray-800 uppercase bg-stone-200 ">
                                アイテム名
                            </th>
                            <th scope="col" class="px-5 py-4 text-sm font-normal text-left text-gray-800 uppercase bg-stone-200">
                                お気に入り度
                            </th>
                            <th scope="col" class="px-5 py-4 text-sm font-normal text-left text-gray-800 uppercase bg-stone-200">
                                価値観
                            </th>
                            <th scope="col" class="px-5 py-4 text-sm font-normal text-right text-gray-800 uppercase bg-stone-200">
                                編集
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($wantbuys as $item)
                    @if($item->delete_status === 0)
                        <tr>
                            <td class="px-5 py-5 text-sm text-left bg-stone-200 border-b border-gray-200">
                                <input id="{{ $item->id }}" type="checkbox" name="discard[]" value="{{ $item->id }}" 
                                class="chk w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="{{ $item->id }}" class="w-full py-4 ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $item->item }}</label>
                            </td>
                            <td class="px-5 py-5 text-sm bg-stone-200 border-b border-gray-200">
                                {{ $item->favorite }}
                            </td>
                            <td class="px-5 py-5 text-sm bg-stone-200 border-b border-gray-200">
                                {{ $item->kachi->kachi }}
                            </td>
                            <td class="px-5 py-5 text-sm text-right bg-stone-200 border-b border-gray-200">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <a class="text-blue-400" href="{{ route('discard.edit', ['id' => $item->id]) }}">編集する</a>
                                    </p>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                    </tbody>
                </table>
                <div class="flex justify-center py-4">
                    <input type="hidden" name="list_name" id="list_name" value="{{ $list_name }}">
                    <button type="submit" id="btn1" class="flex items-center px-4 py-2 font-medium tracking-wide text-white capitalize duration-300 transform bg-zinc-400 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <p>捨てます</p>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- 確認メッセージ -->
<script>
    $(function(){
        // 初期状態のボタンは無効
        $("#btn1").prop("disabled", true);
        // チェックボックスの状態が変わったら（クリックされたら）
        $("input[type='checkbox']").on('change', function () {
        // チェックされているチェックボックスの数
        if ($(".chk:checked").length > 0) {
          // ボタン有効
          $("#btn1").prop("disabled", false);
          $("#btn1").css({ "background-color": "#fb8a00",});
          if ($('#btn1').hover(
            function(){
                $('#btn1').css('background-color', "#fba300")
            },
            function(){
                $('#btn1').css('background-color', "#fb8a00")
            }));
        } else {
          // ボタン無効
          $("#btn1").prop("disabled", true);
          $("#btn1").css({ "background-color": "#a1a1aa" });
        }
    });
});
</script>
@endsection