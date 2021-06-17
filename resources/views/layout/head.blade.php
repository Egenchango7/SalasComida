<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $titlePage }}</title>
    <link href="http://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons|Material+Icons+Round" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/modal.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/plato.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/detalle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/client/WhatsApp.css') }}" rel="stylesheet " href="WhatsApp.css">