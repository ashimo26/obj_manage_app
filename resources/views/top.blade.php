{{-- layouts.common.blade.phpのレイアウト継承 --}}
<!-- 書き方としては　フォルダ名.ファイル名 -->
@extends('layouts.common')

{{-- ヘッダー呼び出し --}}
@include('common.header')

{{-- サイドバー呼び出し --}}
{{-- @include('common.sidebar') --}}

{{-- メイン部分作成 --}}
@section('content')
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:flex-grow md:w-full lg:pl-24 md:pl-16 flex flex-col items-center text-center">
      <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">シンプルな生活を</h1>
      <p class="mb-8 leading-relaxed text-stone-900">自分の価値観を明確にし、あなたが本当に必要だと感じている物だけに囲まれた生活をしてみませんか。物と向き合い対話することをお手伝いできるアプリケーションです。</p>
      <div class="flex justify-center">
        <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-2 px-4 mx-2 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
            <a href="{{ route('register') }}">新規登録</a>
        </button>
        <button class="inline-flex text-white items-center bg-emerald-500 border-0 py-2 px-4 mx-2 focus:outline-none hover:bg-emerald-400 rounded text-base mt-4 md:mt-0">
            <a href="{{ route('login') }}">ログイン</a>
        </button>
      </div>
    </div>
  </div>
</section>
@endsection

{{-- フッター呼び出し --}}
@include('common.footer')
