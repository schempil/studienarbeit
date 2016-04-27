@extends('layouts.cp')

@section('title')
    Kategorien verwalten <a href="/admin/category/create" class="btn btn-default"><i class="fa fa-plus"></i></a>
@endsection

@section('breadcrumbs')
    <li>Admin</li>
    <li>Kategorien</li>
    <li>Übersicht</li>
@endsection

@section('content')

    <div class="table-responsive ls-table">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Kategorie</th>
                <th>Beschreibung</th>
                <th class="text-center">Aktion</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        {{ $category->name }}
                    </td>
                    <td>
                        {{ $category->description }}
                    </td>
                    <td class="text-center">
                        <a href="/admin/category/{{ $category->id }}/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
