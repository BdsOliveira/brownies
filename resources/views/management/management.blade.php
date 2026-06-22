@extends('layouts.layout')

@section('title', 'Gerenciar')

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold text-brand-600">Gerenciar</p>
        <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Cadastros</h1>
        <p class="mt-1 text-sm text-slate-500">Gerencie vendedores e empresas do sistema.</p>
    </div>

    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
        <a href="/management/sellers"
            class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:border-brand-300 hover:shadow-md">
            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-600 text-white transition group-hover:scale-105">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </span>
            <div>
                <p class="font-bold text-slate-900">Vendedores</p>
                <p class="mt-1 text-sm text-slate-500">Cadastrar, editar e remover vendedores.</p>
            </div>
        </a>

        <a href="/management/companies"
            class="group flex items-start gap-4 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:border-brand-300 hover:shadow-md">
            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-amber-500 text-white transition group-hover:scale-105">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 21h18M5 21V7l8-4v18M19 21V11l-6-4" />
                    <path d="M9 9v.01M9 12v.01M9 15v.01M9 18v.01" />
                </svg>
            </span>
            <div>
                <p class="font-bold text-slate-900">Empresas</p>
                <p class="mt-1 text-sm text-slate-500">Cadastrar, editar e remover empresas.</p>
            </div>
        </a>
    </div>
@endsection
