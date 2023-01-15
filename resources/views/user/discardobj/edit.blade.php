{{-- common.blade.php の継承 --}}
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')

{{-- サイドバー呼び出し --}}
@include('user.parts.sidebardiscard')

@section('content')
   <!-- component -->
<div class="container mx-auto">
  <div class="flex justify-center px-6 my-12">
    <!-- Row -->
    <div class="w-full xl:w-3/4 lg:w-11/12 flex">
      <!-- Col -->
      <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"></div>
      <!-- Col -->
      <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
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
        <h3 class="pt-4 text-2xl text-center">捨てるか悩んでいる物を書いていこう！</h3>
        <form action="{{ route('discard.update', ['id' => $huyoubutu->id]) }}" method="POST" class="px-8 pt-8 pb-8 mb-4 bg-white rounded">
          @csrf
          <div class="mb-4">
            <div class="mb-4 md:mr-2 md:mb-0">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="item">
                アイテム名
              </label>
              <input
                class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="item"
                name="item"
                type="text"
                placeholder=""
                value="{{ $huyoubutu->item }}"
              />
            </div>
          </div>
          <div class="mb-4">
            <label class="block mb-2 text-sm font-bold text-gray-700" for="favorite">
              お気に入り度
            </label>
            <input name="favorite" type="range" min="1" max="5" value="{{ $huyoubutu->favorite }}" class="range w-full" step="1" />
            <div class="w-full flex justify-between text-xs px-2">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>5</span>
            </div>
          </div>
          <div class="mb-4">
            <div class="mb-4 md:mr-2 md:mb-0">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="kachi_option">
                そのアイテムはどの価値観と合っていないですか？
              </label>
              <select name="kachi_option" class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                <option value="">選択してください</option>
                @foreach($kachis as $kachi)
                <option value="{{ $kachi->id }}" @if($huyoubutu->kachi_id == $kachi->id) selected @endif>{{ $kachi->kachi}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="mb-4">
            <div class="mb-4 md:mr-2 md:mb-0">
              <label class="block mb-2 text-sm font-bold text-gray-700" for="memo">
                メモ
              </label>
              <textarea
                class="w-full h-32 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                id="memo"
                name="memo">
              </textarea>
            </div>
          </div>
          <div class="mb-6 text-center">
            <button
              class="w-full px-4 py-2 font-bold text-white bg-blue-500 rounded-full hover:bg-blue-700 focus:outline-none focus:shadow-outline"
              type="submit"
            >
              更新する
            </button>
          </div>
        </form>
        <div class="mb-6 text-center">
          <form id="delete_{{ $huyoubutu->id }}" method="post" action="{{ route('discard.destroy', ['id'=> $huyoubutu->id]) }}">
          @csrf
              <p class="text-gray-900 whitespace-no-wrap">
                  <button class="text-red-400" type="submit" onclick="return confirm('本当に削除してもいいですか？')">削除する</button>
              </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection