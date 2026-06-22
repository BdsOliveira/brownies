@extends('layouts.layout')

@section('title', 'Relatórios')

@section('content')
    <div class="mb-8">
        <p class="text-sm font-semibold text-brand-600">Relatórios</p>
        <h1 class="mt-1 text-2xl font-extrabold tracking-tight text-slate-900 sm:text-3xl">Faturamento &amp; comissões</h1>
        <p class="mt-1 text-sm text-slate-500">Consulte o desempenho de vendas por período.</p>
    </div>

    {{-- Faturamento highlight --}}
    <div class="mb-6 flex items-center justify-between gap-4 rounded-2xl bg-slate-900 px-6 py-5 text-white shadow-sm">
        <div>
            <p class="text-sm font-semibold text-slate-300">Faturamento — últimos 7 dias</p>
            <p class="mt-1 text-3xl font-extrabold tabular-nums tracking-tight">
                R$ <span id="cash">{{ number_format($payload['faturamento'], 2, ',', '.') }}</span>
            </p>
        </div>
        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-brand-600/20 text-brand-400">
            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="12" y1="1" x2="12" y2="23" />
                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6" />
            </svg>
        </span>
    </div>

    {{-- Filter --}}
    <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-6">
        <form action="/report" method="POST" class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4 lg:items-end">
            @csrf
            <div>
                <label for="beginDate" class="mb-1.5 block text-sm font-semibold text-slate-700">Data inicial</label>
                <input type="date" id="beginDate" name="beginDate" required
                    class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
            </div>
            <div>
                <label for="endDate" class="mb-1.5 block text-sm font-semibold text-slate-700">Data final</label>
                <input type="date" id="endDate" name="endDate" required
                    class="block w-full rounded-xl border-slate-300 text-slate-900 shadow-sm focus:border-brand-500 focus:ring-brand-500">
            </div>
            <button type="submit"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl bg-brand-600 px-5 text-sm font-bold text-white shadow-sm transition hover:bg-brand-700 focus:outline-none focus:ring-2 focus:ring-brand-500 focus:ring-offset-2">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                Consultar
            </button>
            <button type="submit" formaction="/pdfReport"
                class="inline-flex h-11 items-center justify-center gap-2 rounded-xl border border-slate-300 px-5 text-sm font-bold text-slate-700 transition hover:bg-slate-50 focus:outline-none focus:ring-2 focus:ring-slate-400 focus:ring-offset-2">
                <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                    stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                    <polyline points="14 2 14 8 20 8" />
                    <line x1="12" y1="18" x2="12" y2="12" />
                    <polyline points="9 15 12 18 15 15" />
                </svg>
                Gerar PDF
            </button>
        </form>
    </div>

    {{-- Period label --}}
    <div class="mb-4 inline-flex items-center gap-2 rounded-lg bg-slate-100 px-3 py-1.5 text-sm font-semibold text-slate-600">
        <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
            <line x1="16" y1="2" x2="16" y2="6" />
            <line x1="8" y1="2" x2="8" y2="6" />
            <line x1="3" y1="10" x2="21" y2="10" />
        </svg>
        Período: {{ $payload['beginDate']->format('d/m/Y') }} até {{ $payload['endDate']->format('d/m/Y') }}
    </div>

    {{-- Summary table --}}
    <section class="mb-8">
        <h2 class="mb-3 text-lg font-bold text-slate-900">Resumo por vendedor</h2>
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-bold">Vendedor</th>
                            <th scope="col" class="px-6 py-3 text-right font-bold">Comissão</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php $totalComissions = 0; ?>
                        @forelse ($payload['ordersGroups'] as $result)
                            <?php $comission = $result->reduce(function ($acumulado, $item) {
                                return $acumulado + $item->quantitySold;
                            }, 0); ?>
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-6 py-4 font-semibold text-slate-900">
                                    {{ $result->first() ? $result->first()->seller->nameSeller : '- - -' }}
                                </td>
                                <td class="px-6 py-4 text-right font-semibold tabular-nums text-slate-900">
                                    R$ {{ number_format($comission, 2, ',', '.') }}
                                </td>
                            </tr>
                            <?php $totalComissions += $comission; ?>
                        @empty
                            <tr>
                                <td colspan="2" class="px-6 py-10 text-center text-sm text-slate-500">
                                    Não há dados para o período selecionado. Tente outra data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="border-t-2 border-slate-200 bg-slate-50 text-sm">
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600">Total de comissões</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-slate-900">
                                R$ {{ number_format($totalComissions, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600">Total vendido</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-slate-900">
                                R$ {{ number_format($totalComissions * 5, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600">Comissão do sistema</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-brand-700">
                                R$ {{ number_format($totalComissions * 0.2, 2, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>

    {{-- Detailed table --}}
    <section>
        <h2 class="mb-3 text-lg font-bold text-slate-900">Detalhamento das vendas</h2>
        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-bold">Vendedor</th>
                            <th scope="col" class="px-6 py-3 text-right font-bold">Total vendido</th>
                            <th scope="col" class="px-6 py-3 font-bold">Data</th>
                            <th scope="col" class="px-6 py-3 text-right font-bold">Comissão</th>
                            <th scope="col" class="px-6 py-3 text-right font-bold">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        <?php
                        $totalSells = 0;
                        $totalComissionsDet = 0;
                        ?>
                        @forelse ($payload['orders'] as $result)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-6 py-4 font-semibold text-slate-900">{{ $result->seller->nameSeller ?? '----' }}</td>
                                <td class="px-6 py-4 text-right tabular-nums text-slate-700">R$ {{ number_format($result->quantitySold * 5, 2, ',', '.') }}</td>
                                <td class="px-6 py-4 text-slate-600">{{ \Carbon\Carbon::parse($result->dateSell)->format('d/m/Y') }}</td>
                                <td class="px-6 py-4 text-right tabular-nums text-slate-700">R$ {{ number_format($result->quantitySold, 2, ',', '.') }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="/order/edit/{{ $result->id }}"
                                            class="inline-flex h-9 items-center gap-1.5 rounded-lg border border-slate-300 px-3 text-xs font-bold text-slate-700 transition hover:bg-slate-100">
                                            <svg class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                <path d="M18.5 2.5a2.12 2.12 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                            </svg>
                                            Editar
                                        </a>
                                        <form action="/order/{{ $result->id }}" method="POST"
                                            onsubmit="return confirm('Excluir esta venda? Esta ação não pode ser desfeita.');">
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
                            <?php
                            $totalSells += $result->quantitySold * 5;
                            $totalComissionsDet += $result->quantitySold;
                            ?>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-10 text-center text-sm text-slate-500">
                                    Não há dados para o período selecionado. Tente outra data.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot class="border-t-2 border-slate-200 bg-slate-50 text-sm">
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600" colspan="3">Total vendido</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-slate-900" colspan="2">
                                R$ {{ number_format($totalSells, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600" colspan="3">Total de comissões</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-slate-900" colspan="2">
                                R$ {{ number_format($totalComissionsDet, 2, ',', '.') }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-3 font-semibold text-slate-600" colspan="3">Comissão do sistema</td>
                            <td class="px-6 py-3 text-right font-extrabold tabular-nums text-brand-700" colspan="2">
                                R$ {{ number_format($totalComissionsDet * 0.2, 2, ',', '.') }}
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
@endsection
