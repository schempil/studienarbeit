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
    <table>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
            </tr>
        @endforeach
    </table>
@endsection
