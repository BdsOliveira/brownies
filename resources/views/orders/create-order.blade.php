@extends('layouts.layout')

@section('title', 'Registrar Venda')

@section('content')
    <div class="mx-auto max-w-2xl">
        {{-- Breadcrumb / back --}}
        <a href="/" class="mb-6 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 hover:text-slate-700">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Voltar ao início
        </a>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Registrar nova venda</h1>
                <p class="mt-1 text-sm text-slate-500">Informe o vendedor, a quantidade e a data da venda.</p>
            </div>

            <form action="/order/create" method="POST" class="space-y-5 px-6 py-6">
                @csrf
                <div>
                    <label for="id_seller" class="mb-1.5 block text-sm font-semibold text-slate-700">
                        Vendedor <span class="text-red-500">*</span>
                    </label>
                    <select name="id_seller" id="id_seller" required
                        class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        @foreach ($sellers as $seller)
                            <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="quantitySold" class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Quantidade vendida <span class="text-red-500">*</span>
                        </label>
                        <input type="number" name="quantitySold" id="quantitySold" min="1" inputmode="numeric" required
                            placeholder="0"
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        <p class="mt-1.5 text-xs text-slate-400">Cada brownie equivale a R$ 5,00.</p>
                    </div>

                    <div>
                        <label for="dateSell" class="mb-1.5 block text-sm font-semibold text-slate-700">
                            Data da venda <span class="text-red-500">*</span>
                        </label>
                        <input type="date" name="dateSell" id="dateSell" required
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                    <a href="/"
                        class="inline-flex h-11 items-center justify-center rounded-xl border border-slate-300 px-5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M20 6 9 17l-5-5" />
                        </svg>
                        Cadastrar venda
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
