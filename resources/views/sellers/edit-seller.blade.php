@extends('layouts.layout')

@section('title', 'Editar Vendedor')

@section('content')
    <div class="mx-auto max-w-xl">
        <a href="/management/sellers"
            class="mb-6 inline-flex items-center gap-1.5 text-sm font-semibold text-slate-500 hover:text-slate-700">
            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="19" y1="12" x2="5" y2="12" />
                <polyline points="12 19 5 12 12 5" />
            </svg>
            Voltar aos vendedores
        </a>

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="border-b border-slate-100 px-6 py-5">
                <h1 class="text-xl font-extrabold tracking-tight text-slate-900">Editar vendedor</h1>
                <p class="mt-1 text-sm text-slate-500">Atualize o nome ou a empresa vinculada.</p>
            </div>

            <form action="/management/seller/update/{{ $seller->id }}" method="POST" class="space-y-5 px-6 py-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $seller->id }}">

                <div>
                    <label for="nameSeller" class="mb-1.5 block text-sm font-semibold text-slate-700">
                        Nome do vendedor <span class="text-red-500">*</span>
                    </label>
                    <input type="text" name="nameSeller" id="nameSeller" value="{{ $seller->nameSeller }}" required
                        autocomplete="name"
                        class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                </div>

                <div>
                    <label for="companySeller" class="mb-1.5 block text-sm font-semibold text-slate-700">
                        Empresa do vendedor <span class="text-red-500">*</span>
                    </label>
                    <select name="companySeller" id="companySeller" required
                        class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}" @if ($company->id === $seller->id_company) selected @endif>
                                {{ $company->companyName }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                    <a href="/management/sellers"
                        class="inline-flex h-11 items-center justify-center rounded-xl border border-slate-300 px-5 text-sm font-semibold text-slate-700 transition hover:bg-slate-50">
                        Cancelar
                    </a>
                    <button type="submit"
                        class="inline-flex h-11 items-center justify-center rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                        Salvar alterações
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
