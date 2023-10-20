@extends('layouts.main')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-list__content">
        <div class="contact-list__heading">
            <h2>管理システム</h2>
        </div>
        {{-- 一覧表示エリア --}}
        @if ($contacts->isEmpty())
            <div class="alert alert-danger">
                検索キーワードに一致する記事が見つかりません
            </div>
        @else
            <div class="table-container">
                <table class="contact-table">
                    <tr>
                        <th class="contact-table__id">ID</th>
                        <th>お名前</th>
                        <th>性別</th>
                        <th>メールアドレス</th>
                        <th>ご意見</th>
                        <th></th>
                    </tr>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td class="contact-table__id">{{ $contact->id }}</td>
                            <td>{{ $contact->fullname }}</td>
                            @if ($contact->gender === 1)
                                <td>男性</td>
                            @else
                                <td>女性</td>
                            @endif
                            <td>{{ $contact->email }}</td>
                            <td class="contact-table__opnion">{{ $contact->opinion }}</td>
                            <td>
                                <a href="{{ route('contact.create', ['id' => $contact->id]) }}"
                                    class="btn btn-outline-primary">削除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @endif
    </div>
@endsection
