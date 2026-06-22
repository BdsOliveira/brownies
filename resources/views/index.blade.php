@extends('layouts.layout')

@section('title', 'Início')

@section('content')
    @php
        $orders = $payload['orders'] ?? collect();
        $brownies = $orders->sum('quantitySold');
        $revenue = $brownies * 5;
        $sellersActive = $orders->pluck('id_seller')->unique()->count();
    @endphp

    {{-- Page header --}}
    <div class="mb-8">
        <p class="text-sm font-semibold text-brand-600">Painel</p>
        <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Visão geral</h1>
        <p class="mt-1 text-sm text-slate-500">Desempenho de vendas dos últimos 30 dias.</p>
    </div>

    {{-- KPI cards --}}
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">Faturamento</p>
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-brand-50 text-brand-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <line x1="12" y1="1" x2="12" y2="23" />
                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold tabular-nums tracking-tight text-slate-900">
                R$ {{ number_format($payload['faturamento'] ?? 0, 2, ',', '.') }}
            </p>
            <p class="mt-1 text-xs text-slate-400">Últimos 30 dias</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">Brownies vendidos</p>
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-amber-50 text-amber-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <rect x="3" y="8" width="18" height="12" rx="2" />
                        <path d="M3 12h18M9 8V6a3 3 0 0 1 6 0v2" />
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold tabular-nums tracking-tight text-slate-900">
                {{ number_format($brownies, 0, ',', '.') }}
            </p>
            <p class="mt-1 text-xs text-slate-400">Unidades no período</p>
        </div>

        <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="flex items-center justify-between">
                <p class="text-sm font-semibold text-slate-500">Vendedores ativos</p>
                <span class="grid h-9 w-9 place-items-center rounded-lg bg-sky-50 text-sky-600">
                    <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                </span>
            </div>
            <p class="mt-3 text-3xl font-extrabold tabular-nums tracking-tight text-slate-900">
                {{ $sellersActive }}
            </p>
            <p class="mt-1 text-xs text-slate-400">Com vendas no período</p>
        </div>
    </div>

    {{-- Quick actions --}}
    <h2 class="mt-10 mb-4 text-lg font-bold text-slate-900">Ações rápidas</h2>
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <a href="/orders/create"
            class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-brand-300 hover:shadow-md">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-brand-600 text-white transition group-hover:scale-105">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
            </span>
            <p class="mt-4 font-bold text-slate-900">Cadastrar venda</p>
            <p class="mt-1 text-sm text-slate-500">Registre uma nova venda de brownies.</p>
        </a>

        <a href="/report"
            class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-brand-300 hover:shadow-md">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-slate-900 text-white transition group-hover:scale-105">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M3 3v18h18" />
                    <path d="M18 17V9M13 17V5M8 17v-3" />
                </svg>
            </span>
            <p class="mt-4 font-bold text-slate-900">Relatórios</p>
            <p class="mt-1 text-sm text-slate-500">Consulte faturamento e comissões.</p>
        </a>

        <a href="/management"
            class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-5 shadow-sm transition hover:border-brand-300 hover:shadow-md">
            <span class="grid h-11 w-11 place-items-center rounded-xl bg-amber-500 text-white transition group-hover:scale-105">
                <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                    <circle cx="12" cy="12" r="3" />
                </svg>
            </span>
            <p class="mt-4 font-bold text-slate-900">Gerenciar</p>
            <p class="mt-1 text-sm text-slate-500">Vendedores e empresas cadastrados.</p>
        </a>
    </div>
@endsection
