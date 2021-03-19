@extends('admin.layout')

@section('admin-title') Create Opponent @endsection

@section('admin-content')
{!! breadcrumbs(['Admin Panel' => 'admin', 'Create '.($isMyo ? 'MYO Slot' : 'Character') => 'admin/masterlist/create-'.($isMyo ? 'myo' : 'character')]) !!}
