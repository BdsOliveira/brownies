@extends('layouts.layout')

@section('title', 'Editar Venda')

@section('content')
    <div class="mx-auto max-w-2xl">
        <a href="/report" class="mb-6 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 hover:text-slate-700">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Voltar aos relatórios
        </a>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-100 px-6 py-5">
                <div>
                    <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Editar venda</h1>
                    <p class="mt-1 text-sm text-slate-500">Atualize os dados da venda registrada.</p>
                </div>
                <span class="rounded-lg bg-slate-100 px-2.5 py-1 text-xs font-bold text-slate-500">#{{ $order->id }}</span>
            </div>

            <form action="/order/update/{{ $order->id }}" method="POST" class="space-y-5 px-6 py-6">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                    <div>
                        <label for="id_seller" class="mb-1.5 block text-sm font-semibold text-slate-700">Vendedor</label>
                        <select name="id_seller" id="id_seller"
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            <option value="{{ $seller->id }}">{{ $seller->nameSeller }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="companySeller" class="mb-1.5 block text-sm font-semibold text-slate-700">Empresa</label>
                        <select name="companySeller" id="companySeller"
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                            <option value="{{ $company->id }}">{{ $company->companyName }}</option>
                        </select>
                    </div>

                    <div>
                        <label for="quantitySold" class="mb-1.5 block text-sm font-semibold text-slate-700">Quantidade vendida</label>
                        <input type="number" name="quantitySold" id="quantitySold" min="1" inputmode="numeric"
                            value="{{ $order->quantitySold }}"
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    </div>

                    <div>
                        <label for="dateSell" class="mb-1.5 block text-sm font-semibold text-slate-700">Data da venda</label>
                        <input type="date" name="dateSell" id="dateSell" value="{{ $order->dateSell }}"
                            class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                    </div>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                    <a href="/report"
                        class="inline-flex h-11 items-center justify-center rounded-xl border border-slate-300 px-5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                        Salvar alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
