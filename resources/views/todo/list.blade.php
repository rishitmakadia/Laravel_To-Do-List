@extends('layout')
@section('title', "To-Do Page")
@section('content')
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                    <div class="card">
                        <div id="addListContainer" style="display: none;">
                            @include('todo.addList')
                        </div>
{{--                        @include('todo.addList') //Everytime it displays when this view('list') is called--}}
                        <div class="card-body p-5">
                            <form class="d-flex justify-content-right align-items-center mb-4">
                                <button type="submit" class="btn btn-info ms-2" id="addList">
                                    Add List
                                </button>
                            </form>
                            <!-- Tabs navs -->
                            <ul class="nav nav-tabs mb-4 pb-2" id="ex1" role="tablist">
                                {{--                                <li>Hello</li>--}}
                            </ul>
                            <!-- Tabs navs -->

                            <!-- Tabs content -->
                            <div class="tab-content" id="ex1-content">
                                @include('todo.allList')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function () {
            $('#addList').click(function (e) {
                e.preventDefault();
                $('#addListContainer').show();
                $('#newList')[0].showModal();
            });
            function openEditDialog(){

            }
        });

    </script>
@endsection
