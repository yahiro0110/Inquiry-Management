@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact__alert">
        @if (session('message'))
            <div class="contact__alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <div class="contact__content">
        <div class="contact__heading">
            <h2>管理システム</h2>
        </div>
        @include('admin.search')
        {{-- 一覧表示エリア --}}
        @if ($contacts->isEmpty())
            <div class="alert alert-danger">
                検索キーワードに一致する記事が見つかりません
            </div>
        @else
            <div class="contact__page">
                <div class="contact__page-range">
                    全{{ $contacts->total() }}件中
                    {{ $contacts->firstItem() }}〜{{ $contacts->lastItem() }} 件
                </div>
                <div class="contact__page-nav">
                    {{ $contacts->links('vendor.pagination.custom') }}
                </div>
            </div>
            <div class="contact__table">
                <table class="contact__table-container">
                    <tr>
                        <th class="contact__table-id">ID</th>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>ご意見</th>
                        <th></th>
                    </tr>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="contact__table-id">{{ $contact->id }}</td>
                            <td class="contact__table-name">{{ $contact->fullname }}</td>
                            @if ($contact->gender === 1)
                                <td>男性</td>
                            @else
                                <td>女性</td>
                            @endif
                            <td class="contact__table-email">{{ $contact->email }}</td>
                            <td class="contact__table-opinion">{{ $contact->opinion }}</td>
                            <td>
                                <form action="{{ route('contact.destroy', ['id' => $contact->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="contact__table-btn">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
    <script src="{{ asset('js/textEllipsis.js') }}"></script>
@endsection
