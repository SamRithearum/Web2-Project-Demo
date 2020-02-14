@extends('layouts.app')

@section('content')
<section class="p-t-20">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">Admin Panel Dicussion</h3>
                    <hr/>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $item)
                                <tr class="tr-shadow">
                                    <td style="width: 20%;">
                                        <li class="nav-item">
                                            <div class="image">
                                                <img src="/images/user.png" style="height:40px;" alt="" />
                                                <span class="block-email">{{ $item->username }}</span>
                                            </div>
                                        </li>
                                    </td>
                                    <td>{{ $item->comment }}</td>
                                    <td>
                                </tr>
                                <tr class="spacer"></tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-wrapper"> {!! $comments->appends(['search' => Request::get('search')])->render() !!} </div>
                </div><br />
                <form method="POST" action="{{ url('/comment') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                                <div class="row">
                                    <div class="col-md-11"><input class="form-control border-right-0 border-top-0 border-left-0 shadow-none" style="background-color: rgba(0, 0, 0, 0);" name="comment" type="text" placeholder="Write your comments here ........." required></div>
                                    <div class="col-md-1"><button type="submit" class="btn btn-sm btn-success">Comment</button></div>
                                </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</section>

@endsection