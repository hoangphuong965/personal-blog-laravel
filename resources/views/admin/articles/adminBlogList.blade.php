@extends('front.layout.app')
@section('main_content')
    @include('front.layout.search_add')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Last update</th>
                                        <th>Author</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($articles as $article)
                                        <tr>
                                            <td><a
                                                    href="{{ route('article.edit', ['article' => $article->id]) }}">{{ $article->title }}</a>
                                            </td>
                                            <td>{!! mb_strimwidth($article->content, 0, 50, '...') !!}</td>
                                            @foreach ($article->category as $category)
                                                <td>{{ $category->title }}</td>
                                            @endforeach
                                            @if ($article->status == 1)
                                                <td>public</td>
                                            @else
                                                <td>draft</td>
                                            @endif
                                            <td>{{ $article->created_at }}</td>
                                            <td>{{ $article->user->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Last update</th>
                                        <th>Author</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
