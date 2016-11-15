@extends('dashboard::layouts.dashboard')


@section('title','Roles Page')




@section('content')


    <!-- main header -->
    <header class="bg-light lter b-b wrapper-md">
        <div class="row">
            <div class="col-sm-6 col-xs-12">
                <h1 class="m-n font-thin h3 text-black">Roles</h1>
                <small class="text-muted">Разграничение прав доступа</small>
            </div>
        </div>
    </header>
    <!-- / main header -->


    <!-- main content -->
    <section class="bg-white-only b-l bg-auto no-border-xs">


        @if($roles->count() > 0)


            <div class="panel-body row">

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>{{trans('dashboard::common.Manage')}}</th>
                            <th>Имя</th>
                            <th>Ссылка</th>
                            <th>{{trans('dashboard::common.Last edit')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                        <a href="{{ route('dashboard.systems.roles.edit',$role->slug) }}"
                                           class="btn btn-default"><span class="fa fa-edit"></span> </a>
                                        <a href="#" data-toggle="modal" data-target="#Modal-{{$role->slug}}"
                                           class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->slug }}</td>
                                <td>{{ $role->updated_at or $role->created_at }}</td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

            <footer class="panel-footer">
                <div class="row">
                    <div class="col-sm-8">
                        <small class="text-muted inline m-t-sm m-b-sm">{{trans('dashboard::common.show')}} {{$roles->total()}}
                            -{{$roles->perPage()}} {{trans('dashboard::common.of')}} {!! $roles->count() !!} {{trans('dashboard::common.elements')}}</small>
                    </div>
                    <div class="col-sm-4 text-right text-center-xs">
                        {!! $roles->render() !!}
                    </div>
                </div>
            </footer>

        @else

            <div class="jumbotron text-center">
                <h3 class="font-thin">Вы ещё не создали ни одной роли</h3>

                <a href="{{ route('dashboard.systems.roles.create')}}" class="btn btn-link">Создать</a>
            </div>

        @endif


    </section>
    <!-- / main content -->


@stop




