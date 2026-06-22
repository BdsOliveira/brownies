@extends('layouts.layout')

@section('title', 'Vendedores')

@section('content')
    <a href="/management" class="mb-6 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 hover:text-slate-700">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12" />
            <polyline points="12 19 5 12 12 5" />
        </svg>
        Voltar a gerenciar
    </a>

    <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <h1 class="text-2xl font-extrabold tracking-tight text-slate-900">Vendedores</h1>
            <p class="mt-1 text-sm text-slate-500">{{ count($sellers) }} vendedor(es) cadastrado(s).</p>
        </div>
        <a href="/management/seller/create"
            class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
            <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Novo vendedor
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        @if (count($sellers))
            <table class="w-full text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-bold">Nome do vendedor</th>
                        <th scope="col" class="px-6 py-3 text-right font-bold">Ações</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach ($sellers as $seller)
                        <tr class="transition hover:bg-slate-50">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $seller->nameSeller }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end gap-2">
                                    <a href="/management/seller/edit/{{ $seller->id }}"
                                        class="inline-flex h-9 items-center gap-1.5 rounded-lg border border-slate-300 px-3 text-xs font-bold text-slate-700 transition hover:bg-slate-100">
                                        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                            <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                        Editar
                                    </a>
                                    <form action="/management/seller/{{ $seller->id }}" method="POST"
                                        onsubmit="return confirm('Excluir o vendedor {{ $seller->nameSeller }}? Esta ação não pode ser desfeita.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex h-9 items-center gap-1.5 rounded-lg border border-red-200 px-3 text-xs font-bold text-red-600 transition hover:bg-red-50">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <polyline points="3 6 5 6 21 6" />
                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            </svg>
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="flex flex-col items-center justify-center px-6 py-16 text-center">
                <span class="grid h-14 w-14 place-items-center rounded-2xl bg-slate-100 text-slate-400">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                    </svg>
                </span>
                <p class="mt-4 font-bold text-slate-900">Nenhum vendedor cadastrado</p>
                <p class="mt-1 text-sm text-slate-500">Comece adicionando seu primeiro vendedor.</p>
                <a href="/management/seller/create"
                    class="mt-5 inline-flex h-11 items-center gap-2 rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700">
                    Cadastrar vendedor
                </a>
            </div>
        @endif
    </div>
@endsection
